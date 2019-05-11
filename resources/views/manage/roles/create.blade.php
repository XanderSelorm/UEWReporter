@extends('layouts.manage')

@section('content')
  <div class="container col">
      <div class="">
        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
        <a class="h2">Create a new Role</a>
      </div>
    <hr class="">

    <div class="col">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="m-3">
                    <div class="card-header">
                        <h2>Role Details:</h1>
                    </div>
                    
                    <div class="card-content mt-3">
                        <div class="form-group">
                            <label for="display_name">Name <small>(Human Readable)</small></label>
                            <input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" id="display_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug <small>(eg: my-slug)</small></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description">
                        </div>
                        <input type="hidden" name="permissions" :value="permissionsSelected">
                    </div>
                </div>
            </div>


            <div class="card mt-3">
                    <div class="m-3">
                        <div class="card-header">
                            <h2 class="title">Permissions:</h2>
                        </div>
                        
                        <div class="card-content mt-3">
                            @foreach ($permissions as $permission)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" v-model="permissionsSelected" :value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        
            <div class="col my-3">
                <button type="submit" class="btn btn-primary">Create New Role</button>
            </div>
        </form>
    </div>
  </div>
@endsection

@section('scripts')
<script>

    var app = new Vue({
        el: '#app',
        data: {
        permissionsSelected: []
        }
    });
    
</script>


{{-- <script type="text/javascript">
    $(document).ready(function(){
        //Variable Definitions
        var txtPermissionSelected = $('input[value="permissionSelected"]');
        var permissionChecked = [];
        var checkboxes = $("input:checkbox[name='permission_selected']");


        //Functionalities (getting and checking usere's prior permissions)
        checkboxes = {!! $role->permissions->pluck('id') !!} ;
        
    });
</script> --}}
@endsection