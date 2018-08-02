@extends('layout')

@section('link')
      <link href="css/blog-home.css" rel="stylesheet">
@endsection

@section('style')

	<style >
  :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: gray;

  /*background: -webkit-linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);

  background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);*/
}




</style>

@endsection


@section('contents')

	  <div class="col-7  mx-auto">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Sign In</div>
      <div class="card-body">
            <form method="post"class="form-signin">
              

              <div class="form-label-group">
         <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
               
              </div>
              
              <hr>

              <div class="form-label-group">
               <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
         
              </div>
              
             <br/>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Signin</button>
              <a class="d-block text-center mt-2 small" href="{{route('signup')}}">Sign Up</a>
              <hr class="my-4">
              
            </form>
       
      </div>
    </div>
  </div>

@endsection



	@if(session('message'))
		{{session('message')}}
	@endif

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif
