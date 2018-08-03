<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewprofile($id,Request $request)
    {
        $posts=DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.post_by')
            ->where('users.id',$id)
            ->get();

        $user=DB::table('users')
        	->where('id',$id)
        	->first();

        $follow= DB::table('followers')
        	->where('follower_id',session('user')->id)
        	->where('following_id',$id)
        	->first();

         $Totalfollower= DB::table('followers')
        ->where('following_id',$id)
        ->count();

        return view('user.viewprofile')
        ->with('posts',$posts)
        ->with('user',$user)
        ->with('follow',$follow)
        ->with('Totalfollower',$Totalfollower);
    }

    public function postedit($id,Request $request)
    {
        $post = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.post_by')
                    ->where('posts.id',$id)
                    ->first();

        return view('user.postedit')
                ->with('post',$post);
    }

    public function savepostedit($id,Request $request)
    {
         $data = [
            'title' => $request->Title,
            'detail' => $request->Detail,
            
        ];

         DB::table('posts')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('user.viewprofile',session('user')->id);
    }

    public function postdelete($id,Request $request)
    {

       DB::table('posts')
            ->where('id',$id)
            ->delete();

        return redirect()->route('user.viewprofile',session('user')->id);
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
