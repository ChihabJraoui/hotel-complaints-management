<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

	public function showProfile()
	{
		return view('admin.profile');
	}


	/*
	 * API
	 */

	public function getUser()
	{
		$user = Auth::user();

		return response()->json($user);
	}

}
