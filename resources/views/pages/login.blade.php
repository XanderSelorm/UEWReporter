@extends('layouts.app1')

@section('content')
<nav class="navbar bg-light navbar-login">
        <div class="container">
            <a class="navbar-brand pull-left logos" href="">{{config('app.name', 'UEW Messenger')}} <i class="fa fa-comment-alt"></i></a>
            <span class="pull-right">
                <a class="text-muted" >Don't have an account?</a>
                <a class="btn btn-primary" href="/register">Sign Up</a>
            </span>
        </div>
  </nav>

<header class="masthead masthead-login text-light text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-right align-self-center">
          <h1 class="mb-1">UEW Messenger <i class="fa fa-comment-alt"></i></h1>
            <hr class="bg-light">
            <h5 class="mb-3">Important announcements and events, instantly and wherever!</h5>
        </div>
        <div class="col-md-4 mx-left">
            <div class="jumbotron" style="background-color: rgba(255, 255, 255, 0.75)">
                <h3 class=" mb-4 text-primary">Welcome back!</h3>
                <form>
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                </div>
<br>
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
<br>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="chkbxRememberMe">
                  <label class="custom-control-label text-primary" for="chkbxRememberMe">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login  mb-2" type="submit">Sign in</button>
                <div class="text-center">
                  <a class="small" href="#">Forgot password?</a>  
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </header>
  @stop