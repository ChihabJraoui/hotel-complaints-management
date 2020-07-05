<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class HomeController extends Controller
{

    /*
     *  VIEWS
     */

    public function showHome()
    {
        return view('site.home');
    }

	public function showContact()
	{
		return view('site.contact');
	}

}
