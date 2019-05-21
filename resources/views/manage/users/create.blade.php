@extends('layouts.manage')

@section('content')
<div class="container col">
    <div class="">
        <div class="">
            <div class="card-header">
                <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
                <a class="text-secondary text-center h3">Create New User</a>
            </div>

            <div class="card-body mx-5">
                <form method="POST" action="{{ route('users.store') }}" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <div class="form-group profile-img">
                            <img src="/storage/profile_images/avatar.png" class="avatar img-thumbnail img-responsive" alt="Profile Image"/>
                            <span class="file btn btn-lg btn-primary">
                                <input type="file" class="text-center center-block file-upload" id="inputFile" name="profile_picture">  
                                Change Photo
                            </span>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="roles">Roles:</label>
                            <input type="hidden" id="roles" name="roles" :value="rolesSelected">                           
                        </div>
                            
                        <div class="form-group col-md-12">
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" v-model="rolesSelected" :value="{{$role->id}}">{{$role->display_name}} <em>({{$role->description}})</em>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">
                            Create User <i class="fa fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop