@extends('layout')

@section('link')
	    <link href="css/blog-home.css" rel="stylesheet">
@endsection

@section('contents')
	<div class="col-md-8">
		
		<div class="col-md-12">
      <br/>

      @if(session('user'))
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

      @endif

              <!-- <form>
                <div class="form-label-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
              </form> -->
            </div>
         </div>
          <hr class="my-4">

<div class="row">
    @foreach($posts as $post)
             

            <div class="row">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$post->title}}</h2>
                  <p style="text-align:justify"class="card-text">{{substr($post->detail,0,200)}}</p>
                  <a href="{{route('home.postdetail',['id' => $post->id])}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  {{$post->posted_date}}
                  <a href="#">{{$post->name}}</a>
                </div>
                   </div>  
                 </div>
            </div>

      @endforeach        

   

</div>


     </div>

@endsection