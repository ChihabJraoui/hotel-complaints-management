<?php

namespace App\Http\Controllers\App;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

	public function showUsers()
	{
		$users = Auth::user()->school->users()->where('id', '!=', Auth::id())->get();

		$data = [
			'users'	=> $users,
		];

		return view('app.users.index', $data);
	}

	public function showCreate()
	{
		return view('app.users.create');
	}



	/*
	 *  CRUD
	 */

	public function store(Request $request)
	{
		$firstname = $request->input('firstname');
		$lastname = $request->input('lastname');
		$email = $request->input('email');

		$role_id = $request->input('role_id');

		$user = User::create([
			'school_id' => Auth::user()->school->id,
			'role_id' => $role_id,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'activation_token' => str_random(60),
		]);

		return redirect()->route('app.users')->with([
			'message' => 'L\'employée a été bien ajouté'
		]);
	}
}
