<?php

namespace App\Http\Controllers;

use App\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewprofile($id,Request $request)
    {
        $posts=DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.post_by')
            ->where('users.id',$id)
            ->orderBy('posted_date','DESC')
            ->get();

        $user=DB::table('users')
        	->where('id',$id)
        	->first();

        $isfollow= DB::table('followers')
        	->where('follower_id',session('user')->id)
        	->where('following_id',$id)
        	->first();

        //  $Totalfollower= DB::table('followers')
        // ->where('following_id',$id)
        // ->count();

         $Totalfollower= Follower::where('following_id',$id)->count();


         // $allfollowers= Follower::where('following_id',$id)->get();
         // $allfollowings= Follower::where('follower_id',$id)->get();

        $allfollowers= DB::table('users')
                        ->join('followers', 'users.id', '=', 'followers.follower_id')
                        ->where('following_id',$id)
                        ->get();
                        
        $allfollowings= DB::table('users')
                        ->join('followers', 'users.id', '=', 'followers.following_id')
                        ->where('follower_id',$id)
                        ->get();

         //dd($allfollowings);
        return view('user.viewprofile')
        ->with('posts',$posts)
        ->with('user',$user)
        ->with('isfollow',$isfollow)
        ->with('Totalfollower',$Totalfollower)
        ->with('allfollowers',$allfollowers)
        ->with('allfollowings',$allfollowings);
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
