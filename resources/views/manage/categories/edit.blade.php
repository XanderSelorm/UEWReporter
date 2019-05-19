@extends('layouts.manage')

@section('content')
  <div class="container col">
    <div class="row m-3">
      <div class="col-md-10">
        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
        <a class="h1">Modify: {{$category->display_name}}</a>
      </div>
    </div>
    <hr class="">

    <div class="col-md-12">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            {{-- {{ method_field('PUT') }} --}}
            @method('PUT')

            <div class="card">
                <div class="m-3">
                    <div class="card-header">
                        <h2>Category Details:</h1>
                    </div>
                    
                    <div class="card-content mt-3">
                        <div class="form-group">
                            <label for="display_name">Name <small>(Human Readable)</small></label>
                            <input type="text" class="form-control" name="display_name" value="{{$category->display_name}}" id="display_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug <small>(Cannot be edited)</small></label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" value="{{$category->description}}" id="description" name="description">
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
        
            <div class="col-md-12 my-3">
                <button type="submit" class="btn btn-primary">Save Changes to Category</button>
            </div>
        </form>
    </div>
  </div>
@endsection
