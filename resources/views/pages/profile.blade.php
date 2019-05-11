@extends('layouts.app')

@section('header')
   <div class="header-image"  style="background-image: url('https://blackrockdigital.github.io/startbootstrap-clean-blog/img/home-bg.jpg');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <a class="h1">Personal Profile</i></a>
                  <span class="subheading">Information about you is displayed here</span>

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
  <div class="container col-md-9 card" >
      <div class="row py-5" style="background-color: #e9ecef;">
        <div class="col-md-6 text-right">
            <img class="img-fluid img-responsive rounded-circle" src="https://www.thewealthrecord.com/wp-content/uploads/2018/10/Tyson-Beckford-Net-Worth.jpg" alt="Profile Image" style="height: 150px; width: 150px;">
        </div>
          
        <div class="col-md-6 text-left">
          <label><a class="h2">John Danny Doe</a></label> <br>
          <label><a class="h5">5151570152</a></label> <br>
          <label><a class="h5">janedannydoe@gmail.com</a></label> <br>
          <label><a class="h5">+233 24 5425 456</a></label> <br>
          <label><a class="h7 text-secondary">Author</a></label> <br>
        </div>
        <div class="col-md-12 text-center">   
          <!-- Edit Profile Modal -->
          <a href="#" class="btn btn-primary btn-sm text-light col-md-3 mr-3" id="editProfile" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Edit Profile</a>
          <!--LOGOUT BUTTON-->
          <a href="#" class="btn btn-danger btn-sm text-light col-md-3"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </div>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header col-md-12">
                  <h4 class="modal-title text-secondary" id="myModalLabel">Edit Profile</h4>
                  <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                      <form action="">
                          <div class="form-label-group mb-4">
                            <input type="text" id="inputUsername" class="form-control registrationInput" placeholder="Username" required autofocus>
                          </div>

                          <div class="form-label-group mb-4 registrationInput">
                            <input type="phone number" id="inputPhone" class="form-control" placeholder="Phone Number (024XXXXXXX)" required autofocus>
                          </div>

                          <div class="form-label-group mb-4 registrationInput">
                            <input type="text" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                          </div>

                          <div class="form-label-group mb-4 registrationInput">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                          </div>

                          <div class="form-label-group mb-4 registrationInput">
                            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
                          </div>
                          <a type="file" class="text-secondary" id="navItem" href="#"><i class="fa fa-image"></i> Change Profile Picture </a>
                    </form>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
@stop