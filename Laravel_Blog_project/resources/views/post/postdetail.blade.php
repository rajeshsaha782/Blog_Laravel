@extends('layout')



@section('contents')

	<div class="col-lg-8" >
          
          <h1 class="mt-4">{{$post->title}}</h1>

          @if(session('user') && session('user')->id == $post->post_by)
                <a  href="{{route('post.postedit',['id' => $post->id])}}">Edit</a>
          @endif
          <!-- Author -->
          <p class="lead">
            by

            @if(session('user'))
              <a href="{{route('user.viewprofile',['id' => $post->post_by])}}">{{$post->name}}</a>
            
            @else
              <a href="{{route('login')}}">{{$post->name}}</a>
            @endif
            
          </p>

          <hr>

          <!-- Date/Time -->
          <p>{{$post->posted_date}}</p>

          <hr>

          <!-- Preview Image -->
          

          <hr>

          <!-- Post Content -->
      
          <!-- <p  style="text-align:justify;max-width: 50px"class="lead">{{$post->detail}}</p> -->

          <!-- <hr> -->


          <div class="row" style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                 
                  <p style="text-align:justify;"class="card-text">{{$post->detail}}</p>
                  <!-- <pre style="text-align:justify;display: block;"class="card-text">{{$post->detail}}</pre> -->
                </div>
                
                   </div>  
                 </div>
            </div>

          <!-- Comments Form -->
           
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post" action="{{action('CommentController@commentCreate')}}">
                <input type="hidden" name="post_id" value="{{$post->id}}"/>

                <div class="form-group">
                  <textarea name="commentDetail"class="form-control" required rows="3"></textarea>
                </div>
                @if(session('user'))
                   <button type="submit" class="btn btn-primary">Submit</button>
                   @else
                   <a href="{{route('login')}}" class="btn btn-primary">Submit</a>
                @endif
              </form>
            </div>
          </div>
          

{{$comments->count()}} Comments 
 <hr class="my-4">
<div style="max-height: 500px;overflow: scroll;"> 
@foreach($comments as $comment)
          <!-- Single Comment -->
          <div class="media mb-4" >
            <img class="d-flex mr-3 rounded-circle" height="50" src="{{asset('user.png')}}" alt="">
            <div class="media-body">
            <h5 class="mt-0">
              {{$comment->name}} 
              <small style="color: gray">{{$comment->comment_date}}
                @if(session('user') && session('user')->id == $comment->user_id)
                   <a style="color: red" href="{{route('comment.commentDelete',['id' => $comment->id])}}">Delete</a>
                 @endif
              </small>


            </h5>

             

              {{$comment->comment}}
            </div>
          </div>
@endforeach
</div>
          

        </div>

 
@endsection

@section('footer')
 <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blogging 2018</p>
      </div>

    </footer> 
@endsection