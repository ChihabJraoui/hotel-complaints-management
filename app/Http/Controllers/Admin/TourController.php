<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Tour;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use URL;
use App\Http\Controllers\Controller;

class TourController extends Controller
{

	public function getTours()
	{
		$tours = Tour::orderBy('created_at', 'desc')->get();

		foreach ($tours as $tour)
		{
			$tour->cover = $tour->getCover()->getThumbnail(150, 150);
		}

		return response()->json($tours);
	}

	public function store(Request $request)
	{
		return DB::transaction(function() use($request)
		{
			$title = $request->input('title');
			$type = $request->input('type');
			$description_en = $request->input('description_en');
			$description_fr = $request->input('description_fr');
			$duration = $request->input('duration');
			$depart = $request->input('depart');
			$price = $request->input('price');
			$is_air_conditioned = $request->input('is_air_conditioned');
			$is_mule = $request->input('is_mule');
			$is_meals = $request->input('is_meals');
			$is_guide = $request->input('is_guide');
			$is_driver = $request->input('is_driver');

			$tour = Tour::create([
				'title' => $title,
				'type' => $type,
				'description_en' => $description_en,
				'description_fr' => $description_fr,
				'duration' => $duration,
				'depart' => $depart,
				'price' => $price,
				'is_air_conditioned' => $is_air_conditioned,
				'is_mule' => $is_mule,
				'is_meals' => $is_meals,
				'is_guide' => $is_guide,
				'is_driver' => $is_driver,
			]);

			$tour->slug = make_slug($title);
			$tour->save();

			// add cover
			if($request->hasFile('cover') AND $request->file('cover')->isValid())
			{
				$Image = $request->file('cover');
				$filename = md5($Image->getClientOriginalName() . time()) . '.' .
					$Image->getClientOriginalExtension();

				// create new cover
				$tour->cover()->create([
					'filename' => $filename,
					'is_cover' => true,
				]);

				// move cover
				$Image->move(public_path('storage/tours/'), $filename);


				// Make thumbnails

				make_thumbnail(150, 150,
					public_path('storage/tours/' . $filename),
					public_path('storage/tours/150x150/'));

				make_thumbnail(300, 200,
					public_path('storage/tours/' . $filename),
					public_path('storage/tours/300x200/'));

				make_thumbnail(600, 400,
					public_path('storage/tours/' . $filename),
					public_path('storage/tours/600x400/'));
			}

			return response()->json([
				'error' => 0,
				'message' => 'created successfuly'
			]);

		});
	}

	public function update(Request $request, $id)
	{
		return DB::transaction(function() use($request, $id)
		{
			$type = $request->input('type');
			$title = $request->input('title');
			$desc_en = $request->input('description_en');
			$desc_fr = $request->input('description_fr');
			$duration = $request->input('duration');
			$depart = $request->input('depart');
			$price = $request->input('price');
			$is_air_conditioned = $request->input('is_air_conditioned');
			$is_mule = $request->input('is_mule');
			$is_meals = $request->input('is_meals');
			$is_guide = $request->input('is_guide');
			$is_driver = $request->input('is_driver');

			$tour = Tour::find($id);

			if(!empty($title) AND $title != $tour->title)
			{
				$tour->title = $title;
				$tour->slug = make_slug($title);
			}

			if($type != $tour->type)
				$tour->type = $type;

			if(!empty($desc_en) AND $desc_en != $tour->description_en)
				$tour->description_en = $desc_en;

			if(!empty($desc_fr) AND $desc_fr != $tour->description_fr)
				$tour->description_fr = $desc_fr;

			if(!empty($duration) AND $duration != $tour->duration)
				$tour->duration = $duration;

			if(!empty($depart) AND $depart != $tour->depart)
				$tour->depart = $depart;

			if(!empty($price) AND $price != $tour->price)
				$tour->price = $price;

			if($is_air_conditioned != $tour->is_air_conditioned)
				$tour->is_air_conditioned = $is_air_conditioned;

			if($is_meals != $tour->is_meals)
				$tour->is_meals = $is_meals;

			if($is_mule != $tour->is_mule)
				$tour->is_mule = $is_mule;

			if($is_guide != $tour->is_guide)
				$tour->is_guide = $is_guide;

			if($is_driver != $tour->is_driver)
				$tour->is_driver = $is_driver;

			$tour->save();


			// update Cover Image

			if($request->hasFile('cover') AND $request->file('cover')->isValid())
			{
				$Image = $request->file('cover');

				$filename = md5($Image->getClientOriginalName() . time()) . '.' . $Image->getClientOriginalExtension();

				// update the cover
				if($tour->cover != null)
				{
					$cover = $tour->cover;

					// Delete Old Cover
					File::delete($cover->getPath());


					// Delete thumbnails

					File::delete($cover->getThumbnail(150, 150, true));
					File::delete($cover->getThumbnail(300, 200, true));
					File::delete($cover->getThumbnail(600, 400, true));


					// Update Cover

					$cover->filename = $filename;
					$cover->save();
				}
				else
				{
					$tour->cover()->create([
						'filename' => $filename,
						'is_cover' => true
					]);
				}

				// Move New Cover

				$Image->move(public_path('storage/tours/'), $filename);


				// Make thumbnails

				make_thumbnail(150, 150,
					public_path('storage/tours/' . $filename),
					public_path('storage/tours/150x150/'));

				make_thumbnail(300, 200,
					public_path('storage/tours/' . $filename),
					public_path('storage/tours/300x200/'));

				make_thumbnail(600, 400,
					public_path('storage/tours/' . $filename),
					public_path('storage/tours/600x400/'));
			}

			return response()->json([
				'error' => 0,
				'message' => 'updated successfuly'
			]);
		});
	}

	public function delete($id)
	{
		return DB::transaction(function() use($id)
		{
			$tour = Tour::find($id);

			if($tour->cover != null)
			{
				$cover = $tour->cover;

				File::delete($cover->getPath());


				// Delete Thumbnails

				File::delete($cover->getThumbnail(150, 150, true));
				File::delete($cover->getThumbnail(300, 200, true));
				File::delete($cover->getThumbnail(600, 400, true));

				$cover->delete();
			}

			// delete tour
			$tour->delete();

			return response()->json([
				'error' => 0,
				'message' => 'deleted successfuly'
			]);
		});
	}
}
