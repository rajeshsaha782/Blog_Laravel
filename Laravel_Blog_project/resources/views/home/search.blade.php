@extends('layout')


@section('contents')
	<div class="col-md-8">
		
		<div>
      <br/>

     <!--  @if(session('user'))
            <h5 class="card-header">What's On Your Mind?</h5>
            <div >
              <form method="post" class="form-signin">
             

              <div class="form-label-group">
                <label for="Title">Title</label>
                <input type="text" name="Title" value="{{old('Title')}}" class="form-control" placeholder="Title" required>
               
              </div>
              
              <hr>

              <div class="form-label-group">
               <label for="Detail">Post Detail</label>
                <textarea name="Detail" value="{{old('Detail')}}" class="form-control" placeholder="Post detail write here..." required rows="5"></textarea>
              </div>
              <br/>

              <button type="submit" class="btn btn-primary">Post</button>
             
            </form>
</div>
      @endif -->

              
            
         </div>
          <hr class="my-4">


@if($posts->count()!=0)
 <h2>Posts</h2>
  <small style="color: gray">Total Post found {{$posts->count()}} </small>
 @else
  <h2>No Post Found!!!</h2>
@endif

<div class="row">
    @foreach($posts as $post)
             

            <div class="row" style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$post->title}}</h2>
                  <p style="text-align:justify;min-width: 700px"class="card-text">{{substr($post->detail,0,200)}}</p>
                  <a href="{{route('post.postdetail',['id' => $post->id])}}" class="btn btn-outline-info">Detail &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  {{$post->posted_date}}

                   @if(session('user'))
                  <a href="{{route('user.viewprofile',['id' => $post->post_by])}}">{{$post->name}}</a>
                
                @else
                  <a href="{{route('login')}}">{{$post->name}}</a>
                @endif
                </div>
                   </div>  
                 </div>
            </div>

      @endforeach        

   

</div>


     </div>



<div class="col-md-4">



  <br/>
 <hr class="my-4">

@if($users->count()!=0)
 <h2>Users</h2>
 <small style="color: gray">Total User found {{$users->count()}} </small>
 @else
  <h2>No User Found!!!</h2>
@endif


 @foreach($users as $user)
  <div class="row">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-2">
                <div class="card-body">

                  <h4 class="card-title"> 
                  <img class="rounded-circle" height="50" src="{{asset('user.png')}}" alt="">
                  
                    @if(session('user'))
                      <a href="{{route('user.viewprofile',['id' => $user->id])}}">{{$user->name}}</a>
                
                    @else
                     <a href="{{route('login')}}">{{$user->name}}</a>
                     @endif

              </h4>
                 
                </div>
                
                   </div>  
                 </div>
            </div>
  @endforeach

</div>    

@endsection
@section('footer')
 <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blogging 2018</p>
      </div>

    </footer> 
@endsection