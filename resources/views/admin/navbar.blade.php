


        <nav class="navbar px-navbar">
            <!-- Header -->
            <div class="navbar-header">
                <a class="navbar-brand px-demo-brand" href="{{ route('admin.dashboard') }}"><!-- <span class="px-demo-logo bg-primary"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span> -->Voting System</a>
            </div>
            <!-- Navbar togglers -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset( 'skin-1/assets/user.png' ) }}" alt=" " class="px-navbar-image">
                            <span class="hidden-md">{{ ucfirst( Auth::guard( 'admin' )->user()->name ) }}</span>
                        </a>                             
                        <ul class="dropdown-menu">
                            <li><a href="{{ route( 'admin.edit.profile', ['id'=>Auth::guard( 'admin' )->user()->id ] ) }}"><i class="dropdown-icon fa fa-wrench"></i>&nbsp;&nbsp;Account Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route( 'admin.logout' ) }}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse <i class="fa fa-wrench"></i> -->
        </nav>
