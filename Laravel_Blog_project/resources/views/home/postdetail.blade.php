@extends('layout')



@section('contents')

	<div class="col-lg-8">
          <!-- Title -->
          <h1 class="mt-4">{{$post->title}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="{{route('user.viewprofile',['id' => $post->post_by])}}">{{$post->name}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>{{$post->posted_date}}</p>

          <hr>

          <!-- Preview Image -->
          

          <hr>

          <!-- Post Content -->
          <p  style="text-align:justify"class="lead">{{$post->detail}}</p>

          <hr>

          <!-- Comments Form -->
           @if(session('user'))
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post" action="{{action('HomeController@commentCreate')}}">
                <input type="hidden" name="post_id" value="{{$post->id}}"/>

                <div class="form-group">
                  <textarea name="commentDetail"class="form-control" required rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          @endif


@foreach($comments as $comment)
          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$comment->name}}</h5>
              {{$comment->comment}}
            </div>
          </div>
@endforeach
          <!-- Comment with nested comments -->
          

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

       
         <!--  <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div> -->

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
       

        </div>
@endsection