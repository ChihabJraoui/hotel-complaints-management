<?php

namespace App\Http\Controllers\Admin;

use App\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PricingController extends Controller
{

	public function showPricing()
	{
		return view('admin.pricing');
	}

	public function getPricings()
	{
		$pricings = Pricing::orderBy('created_at', 'desc')->get();

		return response()->json($pricings);
	}

	public function store(Request $request)
	{
		return DB::transaction(function() use($request)
		{
			$from = $request->input('from');
			$to = $request->input('to');
			$description = $request->input('description');
			$price = $request->input('price');
			$is_with_guide = $request->input('is_with_guide');
			$is_with_dinner = $request->input('is_with_dinner');
			$is_half_day = $request->input('is_half_day');
			$is_round_trip = $request->input('is_round_trip');

			Pricing::create([
				'from' => $from,
				'to' => $to,
				'description' => $description,
				'price' => $price,
				'is_with_guide' => $is_with_guide,
				'is_with_dinner' => $is_with_dinner,
				'is_half_day' => $is_half_day,
				'is_round_trip' => $is_round_trip,
			]);

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
			$from = $request->input('from');
			$to = $request->input('to');
			$description = $request->input('description');
			$price = $request->input('price');
			$is_with_guide = $request->input('is_with_guide');
			$is_with_dinner = $request->input('is_with_dinner');
			$is_half_day = $request->input('is_half_day');
			$is_round_trip = $request->input('is_round_trip');

			$pricing = Pricing::find($id);

			if(!empty($from) AND $from != $pricing->from)
			{
				$pricing->from = $from;
			}

			if(!empty($to) AND $to != $pricing->to)
			{
				$pricing->to = $to;
			}

			if(!empty($description) AND $description != $pricing->description)
			{
				$pricing->description = $description;
			}

			if(!empty($price) AND $price != $pricing->price)
			{
				$pricing->price = $price;
			}

			if($is_with_guide != $pricing->is_with_guide)
			{
				$pricing->is_with_guide = $is_with_guide;
			}

			if($is_with_dinner != $pricing->is_with_dinner)
			{
				$pricing->is_with_dinner = $is_with_dinner;
			}

			if($is_half_day != $pricing->is_half_day)
			{
				$pricing->is_half_day = $is_half_day;
			}

			if($is_round_trip != $pricing->is_round_trip)
			{
				$pricing->is_round_trip = $is_round_trip;
			}

			$pricing->save();

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
			Pricing::destroy($id);

			return response()->json([
				'error' => 0,
				'message' => 'deleted successfuly'
			]);
		});
	}

}
