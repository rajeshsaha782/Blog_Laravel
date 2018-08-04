<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts=DB::table('users')
            ->join('posts', 'posts.post_by', '=', 'users.id')
            ->get();
            //dd($posts);

        return view('home.index')->with('posts',$posts);
    }
	public function postdetail($id,Request $request)
    {
        $post= DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.post_by')
        ->where('posts.id',$id)->first();

        $comments=DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('post_id',$id)
            ->get();

        $request->session()->put('postid', $id);
   

        return view('home.postdetail')->with('post',$post)->with('comments',$comments);
    }
	
    public function postCreate(PostRequest $request)
    {

         $data = [
            'title' => $request->Title,
            'post_by' => session('user')->id,
            'detail' => $request->Detail,
            
        ];

       DB::table('posts')
            ->insert($data);

           

        return redirect()->route('home');
    }

    public function commentCreate(Request $request)
    {
    
         $user_id= session('user')->id;

         $data = [
            'post_id' => $request->post_id,
            'user_id' => $user_id,
            'comment' => $request->commentDetail,
            
        ];

       DB::table('comments')
            ->insert($data);

        return redirect()->route('home.postdetail',$request->post_id);
    }

    public function commentDelete($id,Request $request)
    {

       DB::table('comments')
            ->where('id',$id)
            ->delete();

        return redirect()->route('home.postdetail',session('postid'));
    }

     public function search(Request $request)
    {
        $key='%'.$request->input('key').'%';
        

        $posts= DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.post_by')
        ->where('title', 'like', $key)
        ->get();

        $users= DB::table('users')
        ->where('name', 'like', $key)
        ->get();

        return view('home.search')->with('posts',$posts)->with('users',$users);
    } 
    

	
}
