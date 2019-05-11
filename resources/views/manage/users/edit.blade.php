@extends('layouts.manage')

@section('content')
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
                <a class="text-secondary text-center h3">Edit User</a>
            </div>

            <div class="card-body">
                <div class="">
                    <div class="container">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" class="row">
                            {{method_field('PUT')}}
                            @csrf
        
                            <div class="col-md-6 mr-auto">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                                </div>
            
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                                </div>
                                
                                <div class="form group">                                    
                                    <div class="form-check-inline ">
                                        <label for="keep"><input type="radio" class="form-check-input" id="keep" name="password">Maintain Password</label><br>
                                        <label class="ml-3" for="create"><input type="radio" class="form-check-input" id="create" name="password">Create New Password</label>
                                    </div>
                                </div>
                                
                                <div class="form-group" id="pass">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                </div>
            
                                <div class="form-group" id="pass_conf">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
        
                            <div class="col-md-6 ml-auto">
                                <label for="roles">Roles:
                                    <input type="hidden" name="roles" :value="rolesSelected">
                                </label>
                                
                                <div class="form-group">
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-model="rolesSelected" :value="{{$role->id}}">{{$role->display_name}} <em>({{$role->description}})</em>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                
                            </div>
        
                            <div class="form-group ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Submit Changes</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript">

    var app = new Vue({
      el: '#app',
      data: {
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });


    $(document).ready(function(){
        var rdKeep = $('input[id="keep"]');
        var rdCreate = $('input[id="create"]');
        var radioButtons = $("input:radio[name='password']");

        var password = $("div#pass_conf");
        var password_confirmation = $("div#pass");

        rdKeep.prop('checked', true);
        password.hide();
        password_confirmation.hide();

        radioButtons.on('change', function() {
            if (rdKeep.is(':checked')) {
                password.hide();
                password_confirmation.hide();
            }
            else if (rdCreate.is(':checked')) {
                password.show();
                password_confirmation.show();
            }
        });
    });
</script>    
@endsection


    