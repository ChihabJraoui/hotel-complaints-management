<?php

namespace App\Http\Controllers;


use App\Mail\NewMessage;
use Mail;
use Illuminate\Http\Request;


class ContactController extends Controller
{

    public function sendEmail(Request $request)
    {
	    $sender_adress = $request->input('email');
	    $sender_name = $request->input('name');
	    $content = $request->input('content');

	    Mail::send(new NewMessage($sender_adress, $sender_name, $content));

		return response()->json([
			'error' => 0
		]);
    }
}
