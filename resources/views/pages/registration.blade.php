@extends('layouts.app1')

@section('content')
<nav class="navbar navbar-primary bg-light static-top navbar-register">
        <div class="container">
        <a class="navbar-brand pull-left logos" href="">{{config('app.name', 'UEW Messenger')}} <i class="fa fa-comment-alt"></i></a>
            <span class="pull-right">
                <a class="text-muted" >Already have an account?</a>
                <a class="btn btn-primary" href="/login">Sign In</a>
            </span>
        </div>
  </nav>

<header class="masthead masthead-register text-light text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
      <div class="col-md-8 mx-right align-self-center">
          <h1 class="mb-1">UEW Messenger <i class="fa fa-comment-alt"></i></h1>
            <hr class="bg-light">
            <h5 class="mb-3">Important announcements and events, instantly and wherever!</h5>
        </div>
        <div class="col-md-4 mx-left">
            <div class="jumbotron" style="background-color: rgba(255, 255, 255, 0.85)">
                <h3 class=" mb-4 text-primary">Join Us!</h3>
                <form>
                <div class="form-label-group mb-4">
                  <input type="text" id="inputUsername" class="form-control registrationInput" placeholder="Username" required autofocus>
                </div>
                <br>
                <div class="form-label-group mb-4 registrationInput">
                  <input type="phone number" id="inputPhone" class="form-control" placeholder="Phone Number (024XXXXXXX)" required autofocus>
                </div>
                <br>
                <div class="form-label-group mb-4 registrationInput">
                  <input type="text" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                </div>
                <br>
                <div class="form-label-group mb-4 registrationInput">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <br>
                <div class="form-label-group mb-4 registrationInput">
                  <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
                </div>
                    
                <h5 class="text-primary small">Clicking on sign up means you have read and agreed to the <a href="#">terms and conditions</a> concerning the usage of this service.</h5>
                <button class="btn btn-lg btn-primary btn-block btn-login  mb-2" type="submit">Sign Up</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </header>
  @stop