@extends('layout')



@section('contents')
	<div class="col-md-8">
		
    <br/>

		<div class="container-fluid" style="text-align: center;">

     <img style="margin-left: auto; margin-right: auto;"  class="d-flex rounded-circle" height="100" src="{{asset('user.png')}}" alt="">
    <h2>{{$user->name}}</h2>

    <h6>Followed By {{$Totalfollower}} People </h6>
    @if($user->id != session('user')->id)

        @if(!$isfollow)
        <a href="{{route('user.setfollower',['follower' => session('user')->id , 'following' => $user->id])}}" class="btn btn-primary">Follow</a>
        @endif

        @if($isfollow)
          <a href="{{route('user.removefollower',['id' => $isfollow->id])}}" class="btn btn-primary">Unfollow</a>
        @endif

    @endif

    </div>

          <hr class="my-4">

          


<h6>Posts</h6>
<div class="row">
    @foreach($posts as $post)
             

            <div class="row"style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$post->title}}</h2>

                   @if(session('user')->id == $user->id)
                   <a  href="{{route('post.postedit',['id' => $post->id])}}">Edit</a>
                   @endif

                  <p style="text-align:justify;min-width: 700px"class="card-text">{{substr($post->detail,0,200)}}</p>
                  <a href="{{route('post.postdetail',['id' => $post->id])}}" class="btn btn-outline-info">Read More &rarr;</a>
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


     <div class="col-md-4">
       
        <div class="panel-body">
                            <!-- Nav tabs -->
                  <ul class="nav nav-tabs">
                     @if(session('user')->id == $user->id)
                      <li class=" nav-item"><a class="nav-link active" href="#createnewpost" data-toggle="tab">New Post</a>
                      </li>
                        @endif
                      <li class=" nav-item"><a class="nav-link" href="#followers" data-toggle="tab">Followers({{$allfollowers->count()}})</a>
                      </li>
                      <li class=" nav-item"><a class="nav-link"href="#following" data-toggle="tab">Following({{$allfollowings->count()}})</a>
                      </li>
                    
                  </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                       @if(session('user')->id == $user->id)
                                <div class="tab-pane active" id="createnewpost">
                                   
                                      <h5 style="text-align: left" class="card-header">What's On Your Mind?</h5>
                                      <div style="text-align: left">
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
                                      <hr class="my-4">
                              

                                </div>
                            @endif

                        @if(session('user')->id == $user->id)
                                <div class="tab-pane" id="followers">
                        @endif  
                           
                        @if(session('user')->id != $user->id)
                              <div class="tab-pane active" id="followers">
                        @endif    
                        <br/>
                                  @foreach($allfollowers as $follower)
                                    <div class="row" style="text-align: left">  <!-- Blog Post -->
                                      <div class="col-md-12">
                                       <div class="card mb-2">
                                        <div class="card-body">

                                          <h4 class="card-title"> 

                                         <a href="{{route('user.viewprofile',['id' => $follower->follower_id])}}">
                                          <img class="rounded-circle" height="50" src="{{asset('user.png')}}" alt="">
                                          
                                          {{$follower->name}} 

                                          @if($follower->follower_id==session('user')->id)
                                            <small>(you)</small>
                                          @endif

                                          </a>
                                        

                                          </h4>
                                         
                                             </div>
                                        
                                           </div>  
                                         </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="tab-pane fade" id="following">
                                  <br/>
                                  @foreach($allfollowings as $followering)
                                    <div class="row" style="text-align: left">  <!-- Blog Post -->
                                      <div class="col-md-12">
                                       <div class="card mb-2">
                                        <div class="card-body">

                                          <h4 class="card-title"> 

                                       <a href="{{route('user.viewprofile',['id' => $followering->following_id])}}">
                                          <img class="rounded-circle" height="50" src="{{asset('user.png')}}" alt="">
                           
                                        {{$followering->name}}

                                         @if($followering->following_id==session('user')->id)
                                            <small>(you)</small>
                                          @endif


                                      </a>
                                        
                                         

                                          </h4>
                                         
                                             </div>
                                        
                                           </div>  
                                         </div>
                                    </div>
                                     @endforeach
                                </div>
                             
                            </div>
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