<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewprofile($id,Request $request)
    {
        $posts=DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.post_by')
            ->where('users.id',$id)
            ->get();

        $user=DB::table('users')
        	->where('id',$id)
        	->first();

        $follow= DB::table('followers')
        	->where('follower_id',session('user')->id)
        	->where('following_id',$id)
        	->first();

        return view('user.viewprofile')
        ->with('posts',$posts)
        ->with('user',$user)
        ->with('follow',$follow);
    }

    public function setfollower($follower,$following,Request $request)
    {
    	$data = [
           
            'follower_id' => $follower,
            'following_id' => $following,
            
        ];

       DB::table('followers')
            ->insert($data);

    	return redirect()->route('user.viewprofile',$following);
    }

    public function removefollower($id,Request $request)
    {
    	$follow = DB::table('followers')
       				->where('id',$id)
       				->first();

       DB::table('followers')
       		->where('id',$id)
            ->delete();

    	return redirect()->route('user.viewprofile',$follow->following_id);
    }
}
