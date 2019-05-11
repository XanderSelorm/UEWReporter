{{-- <!--SIDEBAR-->
    <button type="button" class="btn btn-default btn-sm btn-block mb-2 border navbar-toggler text-secondary" data-toggle="collapse" data-target="#sidebar">Dashboard Controls <i class="fa fa-bars"></i></button>

    <div class="list-group navbar-expand-md col-md-12 side-menu" id="sidebar">
        <div  class=" ml-3">
            <div class="list-group list-group-flush">
                <a class="h3 text-center mt-3 mb-3">Dashboard</a>
                <label class="text-secondary ">General</label>
                <a href="/manage/dashboard" class="list-group-item list-group-item-action bg-light"><i class="fa fa-bullhorn"></i> Announcements</a>

                <label class="mt-3 text-secondary">Administration</label>
                <a href="{{route('users.index')}}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-users"></i> Manage Users</a>
                <a href="{{route('roles.index')}}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-shield"></i> Manage Roles</a>
                <a href="{{route('permissions.index')}}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-id-card"></i> Manage Permissions</a>
            </div>
        </div>
    </div>

<!--SIDEBAR END--> --}}


<div class="side-menu border-right" id="sidebar-wrapper">
    <div class="sidebar-heading mt-4 text-center">
        <a class="h2">Management</a>
    </div>
    <hr>
    <aside class="list-group mt-3 ml-5">
        <div class="nav nav-stacked flex-column nav-pills">

            <label for="general">General</label>
            <div class="mb-4" id="general">    
                <a href="{{route('manage.dashboard')}}" class="nav-link {{Nav::isRoute('manage.dashboard')}} border"><i class="fa fa-tachometer" id="icon"></i> Dashboard</a>
            </div>

            <label for="content">Content</label>
            <div class="mb-4" id="content">
                <a href="/manage/posts{{--{{route('manage.posts')}}--}}" class="nav-link {{Nav::isResource('posts', 2)}} border"><i class="fa fa-bullhorn" id="icon"></i> Announcements</a>
            </div>

            <label for="administration">Administration</label>
            <div class="mb-4" id="administration">
                <a href="{{route('users.index')}}" class="nav-link {{Nav::isResource('users')}} border"><i class="fa fa-users" id="icon"></i> Manage Users</a>
                
                <a class="nav-link {{Nav::hasSegment(['roles', 'permissions'], 2)}} border" data-toggle="collapse" href="#collapse1"><i class="fa fa-shield ml-auto" id="icon"></i> Roles &amp; Permissions <i class="fa fa-caret-down" id="toggle-icon"></i></a>

                <div id="collapse1" class="navbar-collapse collapse">
                    <a href="{{route('roles.index')}}" class="nav-link {{Nav::isResource('roles')}} border">
                        <span  class="ml-3"><i class="fa fa-user-secret" id="icon"></i> Roles</span>
                    </a>
                    <a href="{{route('permissions.index')}}" class="nav-link {{Nav::isResource('permissions')}} border">
                        <span class="ml-3"><i class="fa fa-key" id="icon"></i> Permissions</span>
                    </a>
                </div>
            </div>
        </div>    
    </aside>
</div>

@section('scripts')
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $("#menu-toggle").click(function() {
        $(this).toggleClass('menu-toggle');
    });

    $("#administration").click(function(){
        $('#toggle-icon').toggleClass('fa-caret-right fa-caret-down');
    });
</script>
@endsection
