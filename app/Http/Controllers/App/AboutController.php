<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function showAbout()
    {
    	return view('app.about_us.about_us');
    }
}
