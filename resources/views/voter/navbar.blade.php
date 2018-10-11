 <nav class="navbar px-navbar">
            <!-- Header -->
            <div class="navbar-header">
                <a class="navbar-brand px-demo-brand" href="{{ route( 'voter.dashboard' ) }}">Voting System</a>

                                     
            </div>
            <!-- Navbar togglers -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="{{ route( 'voter.dashboard' ) }}" role="button" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    </li>

                </ul>


                <div class="navbar-header" >
                    <h2 style="margin: 10px;">EHTESHAM VOTING PROJECT</h2>
                               
                </div>
                
               

              

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset( 'skin-1/assets/user.png' ) }}" alt=" " class="px-navbar-image">
                            <span class="hidden-md">{{ ucfirst( Auth::guard( 'voter' )->user()->name ) }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="{{ route( 'voter.logout' ) }}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse <i class="fa fa-wrench"></i> -->
        </nav>