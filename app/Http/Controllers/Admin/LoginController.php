<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

	public function showLoginForm()
	{
		return view('admin.auth.login');
	}
	protected function authenticated(Request $request, $user)
	{
		return redirect()->intended(route('admin.dash'));
	}

	public function logout(Request $request)
	{
		$this->guard()->logout();

		$request->session()->invalidate();

		return redirect()->route('admin.login');
	}

	public function username()
	{
		return 'username';
	}

	protected function guard()
	{
		return Auth::guard('admin');
	}


}
