<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function commentCreate(Request $request)
    {
    
         $user_id= session('user')->id;

     ///---------------using query builder.....

       //   $data = [
       //      'post_id' => $request->post_id,
       //      'user_id' => $user_id,
       //      'comment' => $request->commentDetail,
            
       //  ];

       // DB::table('comments')
       //      ->insert($data);

     ///---------------ens query builder.....


    ///---------------using model
           Comment::create();

            $cmnt = new Comment();
            $cmnt->post_id=$request->post_id;
            $cmnt->user_id=$user_id;
            $cmnt->comment=$request->commentDetail;
            $cmnt->save();



    ///---------------end model


        return redirect()->route('post.postdetail',$request->post_id);
    }

    public function commentDelete($id,Request $request)
    {

       DB::table('comments')
            ->where('id',$id)
            ->delete();

        return redirect()->route('post.postdetail',session('postid'));
    }
}
