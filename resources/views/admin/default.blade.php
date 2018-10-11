<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Voting System</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('/skin-1/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/widgets.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/themes/candy-orange.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/demo/demo.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/custom.css') }}" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
        <link href="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
        <script src="{{ asset('/skin-1/assets/pace/pace.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/demo/demo.js') }}"></script>



        


        @yield('css') 
        <!-- holder.js -->
        <!-- Pace.js -->

        <!-- Custom styling -->
        <style>
            .page-header-form .input-group-addon,
            .page-header-form .form-control {
            background: rgba(0,0,0,.05);
            }
            .error{
            color: #FF0000;
            }
        </style>
        <!-- / Custom styling -->
    </head>
    <body>






  <nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
        


                <li class="px-nav-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="px-nav-icon  ion-ios-home"></i><span class="px-nav-label">Dashboard</span></a>
                </li>


                <li class="px-nav-item">
                    <a href="{{ route( 'admin.politicalGroups.index' ) }}"><i class="fa fa-certificate"></i><span class="px-nav-label"> Political Groups</span></a>
                </li>

                 <li class="px-nav-item">
                    <a href="{{ route( 'admin.participants.index' ) }}"><i class="fa fa-users"></i><span class="px-nav-label"> Participants</span></a>
                </li>

                <li class="px-nav-item">
                    <a href="{{ route('admin.elections.index') }}"><i class="ionicons ion-person-stalker"></i><span class="px-nav-label"> Election</span></a>
                </li>


                <li class="px-nav-item">
                    <a href="{{ route( 'admin.voter.index' ) }}"><i class="fa fa-edit"></i><span class="px-nav-label"> Voters </span></a>
                </li> 
            
                
    </ul>
  </nav>



@include('admin.navbar')

        @yield('content')




        <!-- getting route for nav active -->
        <input type="hidden" name="currRoute" id="currRoute" value="{{url()->current()}}">


        <div class="m-t-4 p-b-4" id="empty-space"></div>
        <footer  class="px-footer px-footer-bottom text-center m-t-4 ">
            <span class=""></span>
        </footer>
        <!-- jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('/skin-1/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/js/pixeladmin.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
        <!-- <script src="{{ asset('/skin-1/assets/js/jquery.validate.min.js') }}"></script> -->
        <script src="{{ asset('/skin-1/assets/js/additional-methods.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/js/custom.js') }}"></script>
        <script type="text/javascript">
            // -------------------------------------------------------------------------
            // Initialize DEMO


             // Initialize Select2
            $(function() {
              $('.select2-example').select2({
                
              });
            });

            $(function() {
              var file = String(document.location).split('/').pop();
              var currRoute = $('#currRoute').val();


              // Activate current nav item
              $('body > .px-nav')
                .find('.px-nav-item > a[href="' + currRoute + '"]')
                .parent()
                .addClass('active');

              $('body > .px-nav').pxNav();
              $('body > .px-footer').pxFooter();

            });
        </script>
        @yield('js') 
    </body>
</html>