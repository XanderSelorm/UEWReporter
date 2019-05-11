@extends('layouts.manage')

@section('content')
<div class="container col">
    <div class="col-md-12">
        <div class="">
            <div class="card-header">
                <a href="{{ URL::previous() }}"class="btn btn-primary btn-sm mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
                <a class="text-secondaryr h3">Create New Permission</a>
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf 
               {{-- {!! Form::open(['action' => 'PermissionsController@store', 'method' => 'POST']) !!} --}}

                    <div class="form-check-inline mb-3" id="permissionType">
                        <div class="">
                            <input type="radio" class="form-check-input" id="basic" value="basic" name="permission_type"><label class="form-check-label" for="basic">Basic Permission</label>
                        </div>
                        <div class="ml-3">
                            <input type="radio" class="form-check-input" id="crud" value="crud" name="permission_type"><label class="form-check-label" for="crud">CRUD Permission</label>
                        </div>
                    </div>

                    {{--Basic Permission--}}
                    <div class="form-group" id="basicPermissionTypeControl">

                    </div>
                    {{--Basic Permission End--}}

                    {{--CRUD Permission--}}
                    <div class="form-group" id="crudPermissionTypeControl">

                    </div>
                    {{--CRUD Permission End--}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Create Permission</button>
                    </div>
                {{-- {!! Form::close() !!} --}}
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        //Variable Definitions
        var rdBasicValue = $('input[value="basic"]');
        var rdCrudValue = $('input[value="crud"]');
        var radioButtons = $("input:radio[name='permission_type']");

        rdBasicValue.prop('checked', true);

        $("div#basicPermissionTypeControl").load("/partials/basicPermission");

        //Conditions to HIDE or SHOW HTML Elements
        radioButtons.on('change', function() {
            if (rdBasicValue.is(':checked')) {
                $("div#basicPermissionTypeControl").load("/partials/basicPermission");
                 $("div#crudPermissionTypeControl").empty();//css({ "display" : "none"  });
                 $("div#basicPermissionTypeControl").show();//css({ "display" : "initial"  }); 
            } 
            else if (rdCrudValue.is(':checked')){
                $("div#crudPermissionTypeControl").load("/partials/crudPermission");
                 $("div#crudPermissionTypeControl").show();//css({ "display" : "initial"  });
                 $("div#basicPermissionTypeControl").empty();//css({ "display" : "none"  });
            }
        });
    }); 
</script>   
@endsection