@extends('layouts.app')

@section('header')
   <div class="header-image"  style="background-image: url('/storage/header_images/profile-bg-2.jpg');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <a class="h1">Personal Profile</i></a>
                  <span class="subheading">Information about you is displayed here</span>
                  @include('inc.messages')

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

<div class="container card p-5">
  <div class="row">
    <a class=""></a>
    <a class="btn btn-primary text-light ml-auto" id="btnEdit"><i class="fa fa-edit"></i> Edit</a>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <form method="POST" id="profileForm" action="{{ route('profile.update', $user->id) }}" class="row">
          {{method_field('PUT')}}
          @csrf

          <div class="col-md-3">
              <div class="profile-img">
                <img src="/storage/profile_images/{{$user->profile_picture}}" class="avatar img-thumbnail img-responsive" alt="Profile Image"/>
                <span class="file btn btn-lg btn-primary">
                    <input type="file" class="text-center center-block file-upload" id="inputFile">  
                  Change Photo
                </span>
              </div>
          </div>

          <div class="col-md-9">
            <div class="row">
              <div class="form-group col-md-6">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="Username">
              </div>

              <div class="form-group col-md-6">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" value="{{$user->phone}}" placeholder="enter mobile number" title="enter your mobile number if any.">
              </div>
            </div>  
          
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="you@email.com" title="enter your email.">
            </div>

            <div class="row">

              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="new password" title="enter your password.">
              </div>

              <div class="form-group col-md-6">
                <label for="password2">Verify Password</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="verify password" title="confirm your password.">
              </div>

              <div class="form-group">
                  <label for="role"><strong>Roles:</strong></label><br>
                  <ul>
                      {{ $user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : '' }}
                      @foreach ($user->roles as $role)
                          <li id="role">{{$role->display_name}}  <em> ({{$role->description}})</em></li>
                      @endforeach
                  </ul>                
              </div>
            </div>
            
            <hr>

            <div class="pull-right">
              <button class="btn btn-default border" type="reset" id="btnReset"><i class="fa fa-repeat"></i> Reset Changes</button>
              <button class="btn btn-success" type="submit" id="btnSave"><i class="fa fa-save"></i> Save Changes</button>
            </div>
          </div>

        </div>
        
    </form>
    <hr>
    </div><!--/col-9-->
  </div><!--/row-->
</div>
{{-- <!-- Modal -->
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
</div> --}}


 

@stop

@section('scripts')
<script>
$(document).ready(function() { 

//getting and displaying image
  var readURL = function(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('.avatar').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $(".file-upload").on('change', function(){
      readURL(this);
  });
//end


// var el  = document.getElementById('btnEdit');
//   var frm = document.getElementById('profileForm');

//   for(var i=0; i < frm.length; i++) {
//           frm.elements[i].disabled = true;
//       } 

//   el.addEventListener('click', function(){
//       for(var i=0; i < frm.length; i++) {
//           frm.elements[i].disabled = false;
//       } 
//       frm.elements[0].focus();

//       $('#btnReset').show();
//       $('#btnSave').show();
//   });

//Edit Details
  $('#btnReset').hide();
  $('#btnSave').hide();
  $('.file').hide();
  $('#profileForm :input').prop("disabled", true);

  var el  = $('a#btnEdit');
  var frm = $('form#profileForm');

  // for(var i=0; i < frm.elements[i]; i++) {
  //         frm.elements[i].disabled = true;
  //     } 

  el.on('click', function(){
      
    $('#profileForm :input').prop("disabled", false);
      

      $('#btnReset').show();
      $('#btnSave').show();
    $('.file').show();
  });
//End

});
</script>
@endsection