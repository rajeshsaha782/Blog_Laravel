<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
	public function postdetail($id,Request $request)
    {
        $post= DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.post_by')
        ->where('posts.id',$id)->first();

        $comments=DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('post_id',$id)
            ->orderBy('comment_date','DESC')
            ->get();

        $request->session()->put('postid', $id);
   

        return view('post.postdetail')->with('post',$post)->with('comments',$comments);
    }
	
    public function postCreate(PostRequest $request)
    {

        ///---------------using query builder.....

       //  $data = [
       //      'title' => $request->Title,
       //      'post_by' => session('user')->id,
       //      'detail' => $request->Detail,
            
       //  ];

       // DB::table('posts')
       //      ->insert($data);

        ///---------------end query builder

        ///---------------using model.....

            Post::create();

            $post = new Post();
            $post->title=$request->Title;
            $post->post_by=session('user')->id;
            $post->detail=$request->Detail;
            $post->save();

         ///---------------end model

        return redirect()->route('home');
    }

    public function postedit($id,Request $request)//get
    {
        $post = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.post_by')
                    ->where('posts.id',$id)
                    ->first();

        return view('post.postedit')
                ->with('post',$post);
    }

    public function savepostedit($id,Request $request)//post
    {
        //  $data = [
        //     'title' => $request->Title,
        //     'detail' => $request->Detail,
            
        // ];

        //  DB::table('posts')
        //     ->where('id', $id)
        //     ->update($data);

        $post=Post::find($id);

        $post->title=$request->Title;
        $post->detail=$request->Detail;

        $post->save();

        return redirect()->route('post.postdetail',$id);
    }

    public function postdelete($id,Request $request)
    {

       DB::table('posts')
            ->where('id',$id)
            ->delete();

        return redirect()->route('user.viewprofile',session('user')->id);
    }
}
