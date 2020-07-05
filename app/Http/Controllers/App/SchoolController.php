<?php

namespace App\Http\Controllers\App;

use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{

	public function showSchool()
	{
		$school = Auth::user()->school;

		$data = [
			'school' => $school
		];

		return view('app.school', $data);
	}

	public function showEdit()
	{
		$school = Auth::user()->school->translations()->where('language', 'fr')->first();

		$data = [
			'school' => $school
		];

		return view('app.school.edit', $data);
	}



	/*
	 *  CRUD
	 *  -----------------------------------
	 */

	public function getSchool()
	{
		$school = Auth::user()->school->translations()->where('language', 'fr')->first();

		return response()->json($school);
	}

	public function update(Request $request, $lang)
	{
		//if()
		//{
			$name = $request->input('name');
			$address = $request->input('address');

			$presentation = $request->input('presentation_fr');
			$principale_word = $request->input('principale_word_fr');
			$general_info = $request->input('general_info_fr');

			$trans_fr = Auth::user()->school->translations()->where('language', 'fr')->first();

			if(!empty($name) AND $name != $trans_fr->name)
			{
				$trans_fr->name = $name;
			}

			if(!empty($address) AND $address != $trans_fr->address)
			{
				$trans_fr->name = $name;
			}

			if(!empty($presentation) AND $presentation != $trans_fr->presentation)
			{
				$trans_fr->presentation = $presentation;
			}

			if(!empty($general_info) AND $general_info != $trans_fr->general_info)
			{
				$trans_fr->general_info = $general_info;
			}

			$trans_fr->save();
		//}

		return response()->json([
			'message' => 'informations a été bien modifier'
		]);
	}
}
