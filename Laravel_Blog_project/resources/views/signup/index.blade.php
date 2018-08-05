@extends('layout')


@section('link')
      <link href="css/blog-home.css" rel="stylesheet">
@endsection

@section('style')

  <style>
 

body {
  //background: gray;
  background-image: url("{{asset('signupWall.png')}}");
  background-repeat: no-repeat;
  /*background: -webkit-linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);

  background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);*/
}
</style>
@endsection

@section('contents')


<div class="col-10  mx-auto">
	  <div class=" card-register mx-auto mt-5">
      <div style="color: white;text-align: center;" class="card-header">
        <img class="rounded-circle" height="40" src="{{asset('blog-icon.png')}}" alt=""><strong>logging</strong>
        <h3>Sign up</h3>
      </div>
      <div class="card-body">

          @if($errors->any())
          <div class="card-body"style="background-color: red;opacity: 0.7;">
            <ul>
              @foreach($errors->all() as $err)
                <li style="color: white">{{$err}}</li>
              @endforeach
            </ul>
          </div>
          @endif

            <form method="post" class="form-signin">
              <div class="form-label-group">
        <!-- <label for="inputUserame">Name</label> -->
                <input style="opacity: 0.8;" type="text" name="name" value="{{old('name')}}" id="inputName" class="form-control" placeholder="Name" required autofocus>
                
              </div>
              <hr>
              <div class="form-label-group">
         <!-- <label for="inputEmail">Email address</label> -->
                <input  style="opacity: 0.8;" type="email" name="email" value="{{old('email')}}" id="inputEmail" class="form-control" placeholder="Email address" required>
               
              </div>
              
              <hr>

              <div class="form-label-group">
               <!-- <label for="inputPassword">Password</label> -->
                <input  style="opacity: 0.8;" type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
         
              </div>
              <hr>
              <div class="form-label-group">
              <!-- <label for="inputConfirmPassword">Confirm password</label> -->
                <input  style="opacity: 0.8;" type="password" name="confirmpassword" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
          
              </div><br/>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Signup</button>
              <a class="d-block text-center mt-2 small" href="{{route('login')}}">Sign In</a>
              <hr class="my-4">
              
            </form>
       
      </div>
    </div>
  </div>


@endsection

