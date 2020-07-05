<?php

namespace App\Http\Controllers\App;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

	use AuthenticatesUsers;


	/**
	 * LoginController constructor.
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'logout']);
	}

	public function showLoginForm()
	{
		return view('app.auth.login');
	}

	protected function authenticated(Request $request, $user)
	{
		return redirect()->route('app.dash');
	}

	public function logout(Request $request)
	{
		$this->guard()->logout();

		$request->session()->invalidate();

		return redirect()->route('app.login');
	}
}
