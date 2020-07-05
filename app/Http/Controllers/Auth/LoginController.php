<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    private $user_type;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function attemptLogin(Request $request)
    {
    	$username = $request->input('username');

    	if(User::where('username', $username)->exists())
	    {
	    	$this->user_type = 'user';
	    }
	    elseif (Admin::where('username', $username)->exists())
	    {
	    	$this->user_type = 'admin';
	    }

	    return $this->guard()->attempt($this->credentials($request), $request->filled('remember'));
    }

    protected function authenticated(Request $request, $user)
    {
    	if($this->user_type == 'user')
	    {
			return redirect()->route('app.dashboard');
	    }

	    return redirect()->route('admin.dashboard');
    }

	protected function guard()
    {
    	return $this->user_type == 'user' ? Auth::guard() : Auth::guard('admin');
    }

}
