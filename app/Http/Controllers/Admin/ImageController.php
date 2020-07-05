<?php

namespace App\Http\Controllers\Admin;


use App;
use DB;
use URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


	/**
	 * Handle Tour Images
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */

	public function handleTourImages(Request $request)
	{
		//$allowed = ['jpg', 'png', 'jpeg'];
		//
		//if($request->has('file') AND $request->file('file')->isValid())
		//{
		//	$Image = $request->file('file');
		//	$name = basename($_FILES["file"]['name']);
		//
		//		if(move_uploaded_file($temp, '../uploads/' . $filename))
		//		{
		//			echo json_encode(['success' => 1]);
		//		}
		//		else
		//		{
		//			echo json_encode(['success' => 0]);
		//		}
		//
		//	header("Content-Type: application/json");
		//	echo json_encode(['success' => 0]);
		//}
	}


	/**
	 * Delete Car Image
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */

	public function delete(Request $request)
	{
		App\Review::destroy($request->review_id);

		return redirect()->route('reviewsView')
			->with('success', 'Succée, Commentaire a été Bien Supprimé !');
	}

}
