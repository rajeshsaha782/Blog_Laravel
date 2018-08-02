<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup.index');
    }

    public function verify(SignupRequest $request)
    {
    	 $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        DB::table('users')
            ->insert($data);

        return redirect()->route('login');
    }
}
