<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary border-top border-bottom navbar-laravel">
        <div class="container">
            <button class="btn btn-default navbar-toggler" id="menu-toggle">
                <span class="fa fa-arrow-right text-light" title="Toggle Sidebar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/manage') }}">
                UEW<strong>Messenger</strong> <i class="fa fa-comment-alt"></i> <small style="font-size:12px;">MANAGEMENT</small>
            </a>
            <button class="navbar-toggler btn-sm" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="fa fa-bars text-light "></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                @guest
                    
                @else
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fa fa-newspaper"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/notifications"><i class="fa fa-bell"></i> Notifications</a>
                        </li>
                        {{-- <li class="nav-item">
                            <!--<a class="nav-link show-modal" data-toggle="modal" data-target="#publishModal" data-backdrop="static" href="#"><i class="fa fa-plus"></i> Publish</a>-->
                            <a class="nav-link" href="/posts/create"><i class="fa fa-plus"></i> Publish</a>
                        </li> --}}
            
                        <form class="nav-item mt-1 ml-3" id="nav-search">
                            <div class="input-group input-group-sm" style="max-width:360px;">
                                <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                <div class="input-group-append">
                                <button class="btn btn-light border" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </ul>
                @endguest

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link">Want to publish announcements?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/manage/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a>
                                <a class="dropdown-item" href="{{route('profile.show', Auth::user()->id)}}"><i class="fa fa-user-circle"></i> Profile</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>