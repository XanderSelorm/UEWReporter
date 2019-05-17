@extends('layouts.app')

@section('header')
   <div class="header-image" style="background-image: url('/storage/header_images/home-bg.jpg');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <a class="h1">Verify Email</a>
                  <span class="subheading">This is nothing much. We're just making sure the email belongs to you.</span>
                  @include('inc.messages')
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

@section('content')
<div class="col" id="myContent">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
