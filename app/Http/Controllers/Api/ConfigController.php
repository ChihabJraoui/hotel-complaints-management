<?php

namespace App\Http\Controllers\Api;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{

	public function getSettings()
	{
		$settings = Setting::first();

		return response()->json($settings);
	}

}
