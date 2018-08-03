@extends('layout')



@section('contents')
	<div class="col-md-8">
		
    <br/>

		<div>
     <img class="d-flex rounded-circle" height="100" src="http://placehold.it/50x50" alt="">
    <h2>{{$user->name}}</h2>

    @if($user->id != session('user')->id)

        @if(!$follow)
        <a href="{{route('user.setfollower',['follower' => session('user')->id , 'following' => $user->id])}}" class="btn btn-primary">Follow</a>
        @endif

        @if($follow)
          <a href="{{route('user.removefollower',['id' => $follow->id])}}" class="btn btn-primary">Following</a>
        @endif

    @endif

    </div>

          <hr class="my-4">

<div class="row">
    @foreach($posts as $post)
             

            <div class="row">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$post->title}}</h2>
                  <p style="text-align:justify;"class="card-text">{{substr($post->detail,0,200)}}</p>
                  <a href="{{route('home.postdetail',['id' => $post->id])}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  {{$post->posted_date}}
                  <a href="{{route('user.viewprofile',['id' => $post->post_by])}}">{{$post->name}}</a>
                </div>
                   </div>  
                 </div>
            </div>

      @endforeach        

   

</div>


     </div>

    

@endsection