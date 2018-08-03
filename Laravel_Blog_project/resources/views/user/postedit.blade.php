@extends('layout')



@section('contents')

	<div class="col-lg-8" >
          
          <form method="post">
          <br/>
          <h6>Title</h6>
          <h1 class="mt-4"><input type="text" required name="Title" value="{{$post->title}}"></h1>

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

          <p>{{$post->posted_date}}</p>

          <hr>

          <hr>

          <div class="row" style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                 
                 <h6>Detail</h6>
                  <p style="text-align:justify"class="card-text">
                  	<textarea class="form-control" name="Detail" required rows="8">{{$post->detail}}</textarea> 
                  </p>
                  
                </div>
                
                   </div>  
                 </div>
            </div>
 			<button type="submit" class="btn btn-success">Save Changes</button>
 			<a href="{{route('user.postdelete',['id' => $post->id])}}" class="btn btn-danger">Delete Post</a>
 			<a href="{{route('user.viewprofile',['id' => $post->post_by])}}" class="btn btn-warning">Cancel</a>
        </form>


        </div>

     
@endsection
@section('footer')
 <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blogging 2018</p>
      </div>

    </footer> 
@endsection