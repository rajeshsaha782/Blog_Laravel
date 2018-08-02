@extends('layout')


@section('link')
      <link href="css/blog-home.css" rel="stylesheet">
@endsection

@section('style')

  <style>
 

body {
  background: gray;

  /*background: -webkit-linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);

  background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);*/
}
</style>
@endsection

@section('contents')


<div class="col-10  mx-auto">
	  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Sign up</div>
      <div class="card-body">

          @if($errors->any())
          <span style="background-color: red">
            <ul>
              @foreach($errors->all() as $err)
                <li style="color: red">{{$err}}</li>
              @endforeach
            </ul>
          </span>
          @endif

            <form method="post" class="form-signin">
              <div class="form-label-group">
        <label for="inputUserame">Name</label>
                <input type="text" name="name" value="{{old('name')}}" id="inputName" class="form-control" placeholder="Name" required autofocus>
                
              </div>

              <div class="form-label-group">
         <label for="inputEmail">Email address</label>
                <input type="email" name="email" value="{{old('email')}}" id="inputEmail" class="form-control" placeholder="Email address" required>
               
              </div>
              
              <hr>

              <div class="form-label-group">
               <label for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
         
              </div>
              
              <div class="form-label-group">
              <label for="inputConfirmPassword">Confirm password</label>
                <input type="password" name="confirmpassword" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
          
              </div><br/>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Signup</button>
              <a class="d-block text-center mt-2 small" href="Signin.html">Sign In</a>
              <hr class="my-4">
              
            </form>
       
      </div>
    </div>
  </div>


@endsection

