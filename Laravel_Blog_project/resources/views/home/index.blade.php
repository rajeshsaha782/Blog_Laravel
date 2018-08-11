@extends('layout')



@section('contents')
	<div class="col-md-8">
		
		<div>
      <br/>

      @if(session('user'))
            <h5 class="card-header">What's On Your Mind?</h5>
            <div >
              <form method="post" action="{{action('PostController@postCreate')}}" class="form-signin">
             

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
      @endif

           
         </div>
          <hr class="my-4">

<div class="row">
    @foreach($posts as $post)
             

            <div class="row" style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$post->title}}</h2>
                  <p style="text-align:justify;min-width: 700px"class="card-text">{{substr($post->detail,0,200)}}</p>
                  <a href="{{route('post.postdetail',['id' => $post->id])}}" class="btn btn-outline-info">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  {{$post->posted_date}}

                  By
                  @if(session('user'))

                  <a href="{{route('user.viewprofile',['id' => $post->post_by])}}">{{$post->name}}</a>
                
                @else
                  <a href="{{route('login')}}"> {{$post->name}}</a>
                @endif
                 
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