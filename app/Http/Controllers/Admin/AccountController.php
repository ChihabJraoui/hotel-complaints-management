<?php

namespace App\Http\Controllers\Admin;


use App;
use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


	public function postProfile(Request $request)
	{
		// get input data
		$name = $request->input('name');

		// get user
		$user = App\User::find(Auth::id());
		$user->name = $name;

		// process image
		if($request->hasFile('avatar'))
		{
			$image = $request->file('avatar');

			$avatar_new_name = md5($image->getClientOriginalName() . time()) . '.'
				. $image->getClientOriginalExtension();

			$image->move(public_path('img/users/'), $avatar_new_name);

			//File::delete(public_path('img/user/' . $user->avatar));

			$user->avatar = $avatar_new_name;
		}

		// update user
		$user->save();

		return redirect()->route('profileView')->with('success', 'Profile Bien Enrigstrer');
	}



	public function updatePassword(Request $request)
	{
		$pass = $request->input('pass');

		if(Hash::check($pass, Auth::user()->password))
		{
			$new_pass = $request->input('new_pass');

			$user = App\User::find(Auth::id());
			$user->password = Hash::make($new_pass);
			$user->save();

			return redirect()->route('updatePassword')
				->with('success', 'Mot de passe a été bien modifier.');
		}
		else
		{
			return redirect()->route('updatePassword')->withInput([
				'pass' => 'Mot de passe Actuel est incorrect.'
			]);
		}
	}

}
