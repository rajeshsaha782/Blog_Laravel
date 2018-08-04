<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="icon" href="{{asset('blog-icon.png')}}" type="image/x-icon" />
    <title>Blogging</title>

    <!-- Bootstrap core CSS -->
     <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">
  <link href="{{asset('css/blog-post.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->




	@yield('link')


  </head>
@yield('style')
  <body >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark fixed-top" >
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"> 
          <img class="rounded-circle" height="30" src="{{asset('blog-icon.png')}}" alt="">logging</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

	<form  action="{{action('HomeController@search')}}">
        <div class="input-group" style="width: 150%;">
              
              <input  style="opacity: 0.8;" type="text" name="key" class="form-control" required placeholder="Search blogger,post...">
                <span class="input-group-btn">
                  <button  type="submit" class="btn btn-secondary" >Search</button>
                </span>
              </div>
  </form>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

         @if(session('user'))
            <li class="nav-item ">
              <a class="nav-link" href="{{route('user.viewprofile',session('user')->id)}}">{{session('user')->name}}
               
              </a>
            </li>
          @endif

            <li class="nav-item ">
              <a class="nav-link" href="{{route('home')}}">Home
               
              </a>
            </li>

            @if(!session('user'))
             <li class="nav-item">
              <a class="nav-link" href="{{route('signup')}}">Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Sign in</a>
            </li>
            @endif
           
           @if(session('user'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
          @endif
          
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

		@yield('contents')

	  

        <!-- Sidebar Widgets Column -->
        

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <br/>
    <br/>
   <!--  <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blogging 2018</p>
      </div>

    </footer> -->

    @yield('footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
