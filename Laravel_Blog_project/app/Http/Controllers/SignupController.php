<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\DB;

use Mail;
use App\Mail\ThanksMail;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup.index');
    }

    public function verify(SignupRequest $request)
    {

        ///-----------using query builder.....

    	 // $data = [
      //       'name' => $request->name,
      //       'email' => $request->email,
      //       'password' => $request->password
      //   ];

      //   DB::table('users')
      //       ->insert($data);

      ///---------------end query builder

        ///----------------using model.....
            //User::create();

            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->save();

            Mail::to($user->email)->send(new ThanksMail($user));


        ///------------------end model
        return redirect()->route('login');
    }
}
