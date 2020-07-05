<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use DB;
use URL;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

	/*
	 *  VIEWS
	 */

	public function showGallery()
	{
		$pictures_count = Picture::whereNull('picturable_id')->count();

		return view('admin.gallery', ['count' => $pictures_count]);
	}


	/*
	 *  API
	 */

	public function getPictures()
	{
		$pictures = Picture::whereNull('picturable_id')->orderBy('created_at', 'desc')->get();

		foreach ($pictures as $picture)
		{
			$picture->filename = $picture->getThumbnail(300, 200);
		}

		return response()->json($pictures);
	}

	public function store(Request $request)
	{
		return DB::transaction(function() use($request)
		{
			$pictures = $request->file('pictures');

			foreach ($pictures as $picture)
			{
				$file = md5($picture->getClientOriginalName() . time()). '.'.
					$picture->getClientOriginalExtension();

				Picture::create([
					'picturable_id' => null,
					'picturable_type' => null,
					'filename' => $file,
					'is_cover' => false
				]);

				$picture->move(public_path('storage/gallery/'), $file);

				/*
				 * Make Thumbnails
				 */

				make_thumbnail(150, 150,
					public_path('storage/gallery/' . $file),
					public_path('storage/gallery/150x150/'));

				make_thumbnail(300, 200,
					public_path('storage/gallery/' . $file),
					public_path('storage/gallery/300x200/'));

				make_thumbnail(600, 400,
					public_path('storage/gallery/' . $file),
					public_path('storage/gallery/600x400/'));
			}

			return response()->json([
				'error' => 0,
				'pictures' => count($pictures)
			]);

		});
	}

	public function delete(Request $request, $id)
	{
		return DB::transaction(function() use($request, $id)
		{
			$picture = Picture::find($id);

			File::delete($picture->getPath());

			// Delete Thumbnails
			File::delete($picture->getThumbnail(150, 150, true));
			File::delete($picture->getThumbnail(300, 200, true));
			File::delete($picture->getThumbnail(600, 400, true));

			$picture->delete();

			return response()->json([
				'error' => 0,
				'message' => 'deleted successfuly'
			]);
		});
	}
}
