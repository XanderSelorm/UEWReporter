@extends('layouts.app')


@section('header')
   <div class="header-image"  style="background-image: url('https://blackrockdigital.github.io/startbootstrap-clean-blog/img/home-bg.jpg');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <a class="h1">Your notifications are displayed here.</i></a>
                  <span class="subheading">Get all your notifications displayed for you here, in one piece.</span>

                  <div class="site-heading-buttons mt-4">
                     @guest
                        <button href="" class="btn btn-primary mr-3">Sign In</button>
                        <button href="" class="btn btn-success">Sign Up</button>
                     @endguest
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
@endsection

@section('content')
<div class="row col">
        <div class="col-md-9 col-sm-12 card" >
            <div class="newsStrip">                    
                <div class="row panel notificationStripItem">
                    <div class="col-md-1">
                        <img class="img-profile rounded-circle align-self-center" src="./assets/img/others/image4.jpg" alt="Card image cap" >
                    </div>
                        
                    <div class="col-md-11">
                        <a href="#" class=""><strong>Username</strong>, there are <strong>2 new notifications from Category</strong></a>
                        <br>
                        <a class="text-muted small"><i class="fa fa-calendar-alt"></i> Jan, 12th 2015 - <i class="fa fa-clock"></i> 14:12 GMT</a>
                    </div>
                </div>
                <hr>
                <div class="row panel notificationStripItem">
                    <div class="col-md-1">
                        <img class="img-profile rounded-circle align-self-center" src="./assets/img/others/image4.jpg" alt="Card image cap" >
                    </div>
                        
                    <div class="col-md-11">
                        <a href="#" class=""><strong>Username</strong>, there are <strong>2 new notifications from Category</strong></a>
                        <br>
                        <a class="text-muted small"><i class="fa fa-calendar-alt"></i> Jan, 12th 2015 - <i class="fa fa-clock"></i> 14:12 GMT</a>
                    </div>
                </div>
                <hr>
                <div class="row panel notificationStripItem">
                    <div class="col-md-1">
                        <img class="img-profile rounded-circle align-self-center" src="./assets/img/others/image4.jpg" alt="Card image cap" >
                    </div>
                        
                    <div class="col-md-11">
                        <a href="#" class=""><strong>Username</strong>, there are <strong>2 new notifications from Category</strong></a>
                        <br>
                        <a class="text-muted small"><i class="fa fa-calendar-alt"></i> Jan, 12th 2015 - <i class="fa fa-clock"></i> 14:12 GMT</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 card">
            @include('inc.sidebar-right')
        </div>
</div>
@stop