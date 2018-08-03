@extends('layout')



@section('contents')
	<div class="col-md-8">
		
    <br/>

		<div>
     <img class="d-flex rounded-circle" height="100" src="{{asset('user.png')}}" alt="">
    <h2>{{$user->name}}</h2>

    <h6>Followed By {{$Totalfollower}} People </h6>
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

          @if(session('user')->id == $user->id)
            <h5 class="card-header">What's On Your Mind?</h5>
            <div >
              <form method="post" action="{{action('HomeController@postCreate')}}" class="form-signin">
             

              <div class="form-label-group">
                <label for="Title">Title</label>
                <input type="text" name="Title" value="{{old('Title')}}" class="form-control" placeholder="Title" required>
               
              </div>
              
              <hr>

              <div class="form-label-group">
               <label for="Detail">Post Detail</label>
                <textarea name="Detail" value="{{old('Detail')}}" class="form-control" placeholder="Post detail write here..." required rows="3"></textarea>
              </div>
              <br/>

              <button type="submit" class="btn btn-primary">Post</button>
             
            </form>
   
            </div>
            <hr class="my-4">
      @endif



<h6>Posts</h6>
<div class="row">
    @foreach($posts as $post)
             

            <div class="row"style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$post->title}}</h2>

                   @if(session('user')->id == $user->id)
                   <a  href="{{route('user.postedit',['id' => $post->id])}}">Edit</a>
                   @endif

                  <p style="text-align:justify;min-width: 700px"class="card-text">{{substr($post->detail,0,200)}}</p>
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

@section('footer')
 <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blogging 2018</p>
      </div>

    </footer> 
@endsection