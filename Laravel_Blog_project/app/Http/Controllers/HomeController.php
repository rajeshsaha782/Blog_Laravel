<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts=DB::table('users')
            ->join('posts', 'posts.post_by', '=', 'users.id')
            ->orderBy('posted_date','DESC')
            ->get();
            //dd($posts);

        return view('home.index')->with('posts',$posts);
    }
	
    

     public function search(Request $request)
    {
        $key='%'.$request->input('key').'%';
        

        $posts= DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.post_by')
        ->whereRaw("lower(title) like lower('$key')")
        ->get();

        $users= DB::table('users')
        ->whereRaw("lower(name) like lower('$key')")
        ->get();

        return view('home.search')->with('posts',$posts)->with('users',$users);
    } 
    

	
}
