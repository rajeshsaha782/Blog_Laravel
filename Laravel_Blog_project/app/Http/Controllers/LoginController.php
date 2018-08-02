<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
	
	public function verify(LoginRequest $request)
    {
		
		$user = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();
       
        if(!$user)
        {
			
            $request->session()->flash('message', 'Invalid username or password');
            return redirect()->route('login');
        }
        else
        {
		
        $request->session()->put('user', $user);
            return redirect()->route('home');
		}
	
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
