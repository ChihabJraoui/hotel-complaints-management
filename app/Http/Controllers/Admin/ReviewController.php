<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use DB;
use URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

	/*
	 *  Views
	 */

	public function showReviews()
	{
		return view('admin.reviews');
	}


	/*
	 *  API
	 */

	public function getReviews()
	{
		$reviews_wait = Review::where('status', 0)->orderBy('created_at', 'desc')
			->with(['tour', 'user'])->get();

		$reviews = Review::where('status', 1)->orderBy('created_at', 'desc')
			->with(['tour', 'user'])->get();

		return response()->json([
			'reviewsWait' => $reviews_wait,
			'reviews' => $reviews
		]);
	}

	public function approve(Request $request)
	{
		$review = Review::find($request->review_id);
		$review->status = 1;
		$review->save();

		return redirect()->route('reviewsView')->with('success', 'Succée, Commentaire Accepté');
	}

	public function delete($id)
	{
		Review::destroy($id);

		return response()->json([
			'error' => 0
		]);
	}

}
