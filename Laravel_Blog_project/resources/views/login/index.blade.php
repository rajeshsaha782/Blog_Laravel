@extends('layout')



@section('style')

	<style >
  :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  //background: gray;
  background-image: url("{{asset('wall.png')}}");

}




</style>

@endsection


@section('contents')

	  <div class="col-7  mx-auto">
    <div class="  mx-auto mt-5">
      <div style="color: white" class="card-header">Sign In</div>
      <div class="card-body">
            <form method="post"class="form-signin">
              

              <div class="form-label-group">
                <label style="color: white" for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
               
              </div>
              
              <hr>

              <div class="form-label-group">
               <label style="color: white" for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
         
              </div>
              
             <br/>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Signin</button>
              <a style="color: white"class="d-block text-left mt-2 small"  href="{{route('signup')}}">Not yet a Member? Sign Up</a>
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


