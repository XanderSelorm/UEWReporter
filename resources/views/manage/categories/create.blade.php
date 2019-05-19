@extends('layouts.manage')

@section('content')
  <div class="container col">
      <div class="">
        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
        <a class="h2">Create a new Category</a>
      </div>
    <hr class="">

    <div class="col">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="m-3">
                    <div class="card-header">
                        <h2>Category Details:</h1>
                    </div>
                    
                    <div class="card-content mt-3">
                        <div class="form-group">
                            <label for="display_name">Name <small>(Human Readable)</small></label>
                            <input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" id="display_name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Slug <small>(eg: my-slug)</small></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        </div>
    
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col my-3">
                <button type="submit" class="btn btn-primary">Create New Category</button>
            </div>
        </form>
    </div>
  </div>
@endsection