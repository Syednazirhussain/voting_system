

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Dashboard</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
  <script>function _pxDemo_loadStylesheet(a,b,c){var c=c||decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"clean"),d="rtl"===document.getElementsByTagName("html")[0].getAttribute("dir");document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/,'<link href="$1'+(c.indexOf("dark")!==-1&&a.indexOf("/css/")!==-1&&a.indexOf("/themes/")===-1?"-dark":"")+(!d||0!==a.indexOf("assets/css")&&0!==a.indexOf("assets/demo")?"":".rtl")+'$2" rel="stylesheet" type="text/css"'+(b?'class="'+b+'"':"")+">"))}</script>

  <!-- DEMO ONLY: Set RTL direction -->
  <script>"ltr"!==document.getElementsByTagName("html")[0].getAttribute("dir")&&"1"===decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-rtl")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"0")&&document.getElementsByTagName("html")[0].setAttribute("dir","rtl");</script>

  <!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
  <!-- <script>
    _pxDemo_loadStylesheet('assets/css/bootstrap.min.css', 'px-demo-stylesheet-bs');
    _pxDemo_loadStylesheet('assets/css/pixeladmin.min.css', 'px-demo-stylesheet-core');
    _pxDemo_loadStylesheet('assets/css/widgets.min.css', 'px-demo-stylesheet-widgets');
  </script> -->

  <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/assets/css/pixeladmin.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/assets/css/widgets.min.css') }}" rel="stylesheet"/>

  <!-- DEMO ONLY: Load theme -->
  <script>
    function _pxDemo_loadTheme(a){var b=decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"clean");_pxDemo_loadStylesheet(a+b+".min.css","px-demo-stylesheet-theme",b)}
    _pxDemo_loadTheme('assets/css/themes/');
  </script>

  <!-- Demo assets -->
  <!-- 
  <script>_pxDemo_loadStylesheet('assets/demo/demo.css');</script> -->

  <link href="{{ asset('/assets/demo/demo.css') }}" rel="stylesheet"/>
  
  <!-- / Demo assets -->

  <!-- holder.js -->
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>

  <!-- Pace.js -->
  <script src="{{ asset( '/assets/pace/pace.min.js' ) }}"></script>

  <script src="{{ asset( '/assets/demo/demo.js' ) }}"></script>

	


  <!-- Custom styling -->
  
  <!-- CUSTOM CSS -->
<!--   <script>_pxDemo_loadStylesheet('assets/css/custom.css');</script> -->
  <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet"/>

  <!-- / Custom CSS -->	

  <style>
    .page-header-form .input-group-addon,
    .page-header-form .form-control {
      background: rgba(0,0,0,.05);
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
      <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <img src="{{ asset( '/assets/demo/avatars/1.jpg' ) }}" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;">
        <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>John</strong></div>
        <div class="btn-group" style="margin-top: 4px;">
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-envelope"></i></a>
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-cog"></i></a>
          <a href="#" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
        </div>
      </li>

      <li class="px-nav-item px-nav-dropdown">
        <a href="{{ route( 'admin.dashboard' ) }}"><i class="px-nav-icon ion-ios-pulse-strong"></i><span class="px-nav-label">Manage Users<span class="label label-danger">5</span></span></a>

        <ul class="px-nav-dropdown-menu">
        <!--   <li class="px-nav-item"><a href=" {{ route( 'viewusers' ) }} "><span class="px-nav-label">Users</span></a></li> -->

          <li class="px-nav-item"><a href=" {{ route( 'addusers' ) }} "><span class="px-nav-label">Create Users</span></a></li>
          <li class="px-nav-item"><a href="{{ route( 'viewusers' ) }}"><span class="px-nav-label">View Users</span></a></li>
          
          <li class="px-nav-item"><a href=""><span class="px-nav-label">Elections</span></a></li>

          <!-- <li class="px-nav-item"><a href="dashboards-financial.html"><span class="px-nav-label">Financial</span></a></li>
          <li class="px-nav-item"><a href="dashboards-blog.html"><span class="px-nav-label">Blog</span></a></li> -->
        </ul>
      </li>

      <!-- <li class="px-nav-item">
        <a href="boxes.html"><i class="px-nav-icon ion-ios-analytics"></i><span class="px-nav-label">Boxes</span></a>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-erlenmeyer-flask"></i><span class="px-nav-label">Widgets</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="widgets-lists.html"><span class="px-nav-label">Lists</span></a></li>
          <li class="px-nav-item"><a href="widgets-pricing.html"><span class="px-nav-label">Pricing</span></a></li>
          <li class="px-nav-item"><a href="widgets-timeline.html"><span class="px-nav-label">Timeline</span></a></li>
          <li class="px-nav-item"><a href="widgets-misc.html"><span class="px-nav-label">Misc</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item">
        <a href="utilities.html"><i class="px-nav-icon ion-cube"></i><span class="px-nav-label">Utilities</span></a>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-monitor"></i><span class="px-nav-label">UI elements</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="ui-buttons.html"><span class="px-nav-label">Buttons</span></a></li>
          <li class="px-nav-item"><a href="ui-tabs.html"><span class="px-nav-label">Tabs & Accordions</span></a></li>
          <li class="px-nav-item"><a href="ui-modals.html"><span class="px-nav-label">Modals</span></a></li>
          <li class="px-nav-item"><a href="ui-alerts.html"><span class="px-nav-label">Alerts & Tooltips</span></a></li>
          <li class="px-nav-item"><a href="ui-panels.html"><span class="px-nav-label">Panels</span></a></li>
          <li class="px-nav-item"><a href="ui-sortable.html"><span class="px-nav-label">Sortable</span></a></li>
          <li class="px-nav-item"><a href="ui-carousel.html"><span class="px-nav-label">Carousel</span></a></li>
          <li class="px-nav-item"><a href="ui-misc.html"><span class="px-nav-label">Misc</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-android-checkbox-outline"></i><span class="px-nav-label">Forms</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="forms-layout.html"><span class="px-nav-label">Layout</span></a></li>
          <li class="px-nav-item"><a href="forms-controls.html"><span class="px-nav-label">Controls</span></a></li>
          <li class="px-nav-item"><a href="forms-components.html"><span class="px-nav-label">Components</span></a></li>
          <li class="px-nav-item"><a href="forms-advanced.html"><span class="px-nav-label">Advanced</span></a></li>
          <li class="px-nav-item"><a href="forms-sliders.html"><span class="px-nav-label">Sliders</span></a></li>
          <li class="px-nav-item"><a href="forms-pickers.html"><span class="px-nav-label">Pickers</span></a></li>
          <li class="px-nav-item"><a href="forms-editors.html"><span class="px-nav-label">Editors</span></a></li>
          <li class="px-nav-item"><a href="forms-validation.html"><span class="px-nav-label">Validation</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-ios-keypad"></i><span class="px-nav-label">Tables</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="tables-bootstrap.html"><span class="px-nav-label">Bootstrap</span></a></li>
          <li class="px-nav-item"><a href="tables-datatables.html"><span class="px-nav-label">DataTables</span></a></li>
          <li class="px-nav-item"><a href="tables-editable-table.html"><span class="px-nav-label">editableTableWidget</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-stats-bars"></i><span class="px-nav-label">Charts</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="charts-flot.html"><span class="px-nav-label">Flot.js</span></a></li>
          <li class="px-nav-item"><a href="charts-morris.html"><span class="px-nav-label">Morris.js</span></a></li>
          <li class="px-nav-item"><a href="charts-chart.html"><span class="px-nav-label">Chart.js</span></a></li>
          <li class="px-nav-item"><a href="charts-chartist.html"><span class="px-nav-label">Chartist</span></a></li>
          <li class="px-nav-item"><a href="charts-c3.html"><span class="px-nav-label">C3.js</span></a></li>
          <li class="px-nav-item"><a href="charts-sparkline.html"><span class="px-nav-label">Sparkline</span></a></li>
          <li class="px-nav-item"><a href="charts-easy-pie-chart.html"><span class="px-nav-label">Easy Pie Chart</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-ios-paper"></i><span class="px-nav-label">Pages<span class="label label-info">22</span></span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item px-nav-dropdown">
            <a href="#"><span class="px-nav-label">Authentication</span></a>

            <ul class="px-nav-dropdown-menu">
              <li class="px-nav-item"><a href="pages-signin-v1.html"><span class="px-nav-label">Sign In v1</span></a></li>
              <li class="px-nav-item"><a href="pages-signin-v2.html"><span class="px-nav-label">Sign In v2</span></a></li>
              <li class="px-nav-item"><a href="pages-signup-v1.html"><span class="px-nav-label">Sign Up v1</span></a></li>
              <li class="px-nav-item"><a href="pages-signup-v2.html"><span class="px-nav-label">Sign Up v2</span></a></li>
            </ul>
          </li>
          <li class="px-nav-item px-nav-dropdown">
            <a href="#"><span class="px-nav-label">Blog</span></a>

            <ul class="px-nav-dropdown-menu">
              <li class="px-nav-item"><a href="pages-blog-posts.html"><span class="px-nav-label">Posts</span></a></li>
              <li class="px-nav-item"><a href="pages-blog-post.html"><span class="px-nav-label">Post</span></a></li>
            </ul>
          </li>
          <li class="px-nav-item px-nav-dropdown">
            <a href="#"><span class="px-nav-label">Error pages</span></a>

            <ul class="px-nav-dropdown-menu">
              <li class="px-nav-item"><a href="pages-404.html"><span class="px-nav-label">404</span></a></li>
              <li class="px-nav-item"><a href="pages-500.html"><span class="px-nav-label">500</span></a></li>
            </ul>
          </li>
          <li class="px-nav-item px-nav-dropdown">
            <a href="#"><span class="px-nav-label">Forum</span></a>

            <ul class="px-nav-dropdown-menu">
              <li class="px-nav-item"><a href="pages-forum-forums-list.html"><span class="px-nav-label">Forums list</span></a></li>
              <li class="px-nav-item"><a href="pages-forum-topics.html"><span class="px-nav-label">Topics</span></a></li>
              <li class="px-nav-item"><a href="pages-forum-thread.html"><span class="px-nav-label">Thread</span></a></li>
            </ul>
          </li>
          <li class="px-nav-item px-nav-dropdown">
            <a href="#"><span class="px-nav-label">Messages</span></a>

            <ul class="px-nav-dropdown-menu">
              <li class="px-nav-item"><a href="pages-messages-list.html"><span class="px-nav-label">List</span></a></li>
              <li class="px-nav-item"><a href="pages-messages-item.html"><span class="px-nav-label">Item</span></a></li>
              <li class="px-nav-item"><a href="pages-messages-new.html"><span class="px-nav-label">New message</span></a></li>
            </ul>
          </li>
          <li class="px-nav-item"><a href="pages-about-us.html"><span class="px-nav-label">About Us</span></a></li>
          <li class="px-nav-item"><a href="pages-account.html"><span class="px-nav-label">Account</span></a></li>
          <li class="px-nav-item"><a href="pages-invoice.html"><span class="px-nav-label">Invoice</span></a></li>
          <li class="px-nav-item"><a href="pages-pricing.html"><span class="px-nav-label">Pricing</span></a></li>
          <li class="px-nav-item"><a href="pages-profile-v1.html"><span class="px-nav-label">Profile v1</span></a></li>
          <li class="px-nav-item"><a href="pages-profile-v2.html"><span class="px-nav-label">Profile v2</span></a></li>
          <li class="px-nav-item"><a href="pages-search-results.html"><span class="px-nav-label">Search results</span></a></li>
          <li class="px-nav-item"><a href="pages-support-center.html"><span class="px-nav-label">Support center</span></a></li>
          <li class="px-nav-item"><a href="pages-blank.html"><span class="px-nav-label">Blank</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item">
        <a href="../color_generator/index.html"><i class="px-nav-icon ion-aperture"></i><span class="px-nav-label">Color Generator</span></a>
      </li>
      <li class="px-nav-item">
        <a href="docs/index.html" target="_blank" class="bg-success text-white b-a-0"><i class="px-nav-icon ion-social-buffer"></i><span class="px-nav-label">Docs</span></a>
      </li>
      <li class="px-nav-box b-t-1 p-a-2">
        <a href="pages-invoice.html" class="btn btn-primary btn-block btn-outline">Create Invoice</a>
      </li> -->
    </ul>
  </nav>

  <nav class="navbar px-navbar">
    <!-- Header -->
    <div class="navbar-header">
      <a class="navbar-brand px-demo-brand" href="index.html"><span class="px-demo-logo bg-primary"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>PixelAdmin</a>
    </div>

    <!-- Navbar togglers -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
          <div class="dropdown-multi-column">
            <ul class="dropdown-menu dropdown-column col-md-4">
              <li class="dropdown-header">Business</li>
              <li><a href="#">Design &amp; Urban Ecologies</a></li>
              <li><a href="#">Fine Art</a></li>
              <li><a href="#">Fashion Design</a></li>
              <li><a href="#">Strategic Design</a></li>
            </ul>
            <ul class="dropdown-menu dropdown-column col-md-4">
              <li class="dropdown-header">Liberal Arts</li>
              <li><a href="#">Anthropology</a></li>
              <li><a href="#">Media Studies</a></li>
              <li><a href="#">Philosophy</a></li>
            </ul>
            <ul class="dropdown-menu dropdown-column col-md-4">
              <li class="dropdown-header">Social Sciences</li>
              <li><a href="#">Food Studies</a></li>
              <li><a href="#">Journalism</a></li>
              <li><a href="#">Non Profit Management</a></li>
            </ul>
          </div>
        </li>

        <li class="dropdown">
          <a href class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bookmark m-r-1"></i>Links</a>
          <ul class="dropdown-menu">
            <li class="dropdown-toggle">
              <a href>Products</a>
              <ul class="dropdown-menu">
                <li><a href="#">All</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">Recent</a></li>
                <li><a href="#">Featured</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-plus m-r-1"></i>Add product</a></li>
              </ul>
            </li>
            <li class="dropdown-toggle">
              <a href>Users</a>
              <ul class="dropdown-menu">
                <li><a href="#">All</a></li>
                <li><a href="#">Recent</a></li>
                <li><a href="#">Banned</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-user-plus m-r-1"></i>Create user</a></li>
              </ul>
            </li>
            <li class="dropdown-toggle">
              <a href>Blog</a>
              <ul class="dropdown-menu">
                <li><a href="#">All</a></li>
                <li><a href="#">Popular</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-edit m-r-1"></i>New blog post</a></li>
              </ul>
            </li>
            <li class="divider"></li>
            <li><a href="#">Overview</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="https://stackoverflow.com" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="px-navbar-icon fa fa-bullhorn font-size-14"></i>
            <span class="px-navbar-icon-label">Notifications</span>
            <span class="px-navbar-label label label-success">5</span>
          </a>
          <div class="dropdown-menu p-a-0" style="width: 300px">
            <div id="navbar-notifications" style="height: 280px; position: relative;">
              <div class="widget-notifications-item">
                <div class="widget-notifications-title text-danger">SYSTEM</div>
                <div class="widget-notifications-description"><strong>Error 500</strong>: Syntax error in index.php at line <strong>461</strong>.</div>
                <div class="widget-notifications-date">12h ago</div>
                <div class="widget-notifications-icon fa fa-hdd-o bg-danger"></div>
              </div>

              <div class="widget-notifications-item">
                <div class="widget-notifications-title text-info">STORE</div>
                <div class="widget-notifications-description">You have <strong>9</strong> new orders.</div>
                <div class="widget-notifications-date">12h ago</div>
                <div class="widget-notifications-icon fa fa-truck bg-info"></div>
              </div>

              <div class="widget-notifications-item">
                <div class="widget-notifications-title text-default">CRON DAEMON</div>
                <div class="widget-notifications-description">Job <strong>"Clean DB"</strong> has been completed.</div>
                <div class="widget-notifications-date">12h ago</div>
                <div class="widget-notifications-icon fa fa-clock-o bg-default"></div>
              </div>

              <div class="widget-notifications-item">
                <div class="widget-notifications-title text-success">SYSTEM</div>
                <div class="widget-notifications-description">Server <strong>up</strong>.</div>
                <div class="widget-notifications-date">12h ago</div>
                <div class="widget-notifications-icon fa fa-hdd-o bg-success"></div>
              </div>

              <div class="widget-notifications-item">
                <div class="widget-notifications-title text-warning">SYSTEM</div>
                <div class="widget-notifications-description"><strong>Warning</strong>: Processor load <strong>92%</strong>.</div>
                <div class="widget-notifications-date">12h ago</div>
                <div class="widget-notifications-icon fa fa-hdd-o bg-warning"></div>
              </div>
            </div>

            <a href="#" class="widget-more-link">MORE NOTIFICATIONS</a>
          </div>
        </li>

        <li class="dropdown">
          <a href="https://google.com" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="px-navbar-icon fa fa-envelope font-size-14"></i>
            <span class="px-navbar-icon-label">Income messages</span>
            <span class="px-navbar-label label label-danger">8</span>
          </a>
          <div class="dropdown-menu p-a-0" style="width: 300px;">
            <div id="navbar-messages" style="height: 280px; position: relative;">
              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/2.jpg' ) }} " alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                <div class="widget-messages-alt-description">from <a href="#">Robert Jang</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/3.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                <div class="widget-messages-alt-description">from <a href="#">Michelle Bortz</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/4.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet.</a>
                <div class="widget-messages-alt-description">from <a href="#">Timothy Owens</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/5.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                <div class="widget-messages-alt-description">from <a href="#">Denise Steiner</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/2.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet.</a>
                <div class="widget-messages-alt-description">from <a href="#">Robert Jang</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/3.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                <div class="widget-messages-alt-description">from <a href="#">Michelle Bortz</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/4.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet.</a>
                <div class="widget-messages-alt-description">from <a href="#">Timothy Owens</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>

              <div class="widget-messages-alt-item">
                <img src="{{ asset( 'assets/demo/avatars/5.jpg' ) }}" alt="" class="widget-messages-alt-avatar">
                <a href="#" class="widget-messages-alt-subject text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                <div class="widget-messages-alt-description">from <a href="#">Denise Steiner</a></div>
                <div class="widget-messages-alt-date">2h ago</div>
              </div>
            </div>

            <a href="#" class="widget-more-link">MORE MESSAGES</a>
          </div> <!-- / .dropdown-menu -->
        </li>

        <li>
          <form class="navbar-form" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" style="width: 140px;">
            </div>
          </form>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset( 'assets/demo/avatars/1.jpg' ) }}" alt="" class="px-navbar-image">
            <span class="hidden-md">John Doe</span>
          </a>


          <ul class="dropdown-menu">
            <li><a href="pages-profile-v2.html"><span class="label label-warning pull-xs-right"><i class="fa fa-asterisk"></i></span>Profile</a></li>
            <li><a href="{{ route( 'edit_profile', ['id'=>Auth::guard( 'admin' )->user()->id ] ) }}">Account</a></li>
            <li><a href="pages-messages-list.html"><i class="dropdown-icon fa fa-envelope"></i>&nbsp;&nbsp;Messages</a></li>
            <li class="divider"></li>
            <li><a href=" {{ route( 'logout' ) }} "><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>

  <div class="px-content">
    <ol class="breadcrumb page-breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li class="active">Dashboard</li>
    </ol>

    <div class="page-header">
      <div class="row">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1><i class="page-header-icon ion-ios-pulse-strong"></i>Dashboard</h1>
        </div>

        <hr class="page-wide-block visible-xs visible-sm">

        <div class="col-xs-12 width-md-auto width-lg-auto width-xl-auto pull-md-right">
          <a href="#" class="btn btn-primary btn-block"><span class="btn-label-icon left ion-plus-round"></span>Create project</a>
        </div>

        <!-- Spacer -->
        <div class="m-b-2 visible-xs visible-sm clearfix"></div>

        <form action="" class="page-header-form col-xs-12 col-md-4 pull-md-right">
          <div class="input-group">
            <span class="input-group-addon b-a-0 font-size-16"><i class="ion-search"></i></span>
            <input type="text" placeholder="Search..." class="form-control p-l-0 b-a-0">
          </div>
        </form>
      </div>
    </div>

    <!-- header -->

    @yield( 'content' )




    <!-- footer -->

    <footer class="px-footer px-footer-bottom p-t-0">
    <div class="box m-a-0 bg-transparent">
      <div class="box-cell col-md-3 p-t-3">
        <h5 class="m-t-0 m-b-1 font-size-13">About Us</h5>
        <a href="#">Who we are</a><br>
        <a href="#">Jobs</a><br>
        <a href="#">Newsletters</a><br>
      </div>
      <div class="box-cell col-md-3 p-t-3">
        <h5 class="m-t-0 m-b-1 font-size-13">Help</h5>
        <a href="#">Support Center</a><br>
        <a href="#">Terms of Use</a><br>
        <a href="#">Privacy Policy</a><br>
      </div>
      <div class="box-cell col-md-3 p-t-3">
        <h5 class="m-t-0 m-b-1 font-size-13">Products</h5>
        <a href="#">Popular</a><br>
        <a href="#">Most rated</a><br>
        <a href="#">Recent</a><br>
      </div>
      <div class="box-cell col-md-3 p-t-3 valign-middle">
        <a href="#" class="display-block m-b-1 text-nowrap"><i class="fa fa-twitter"></i>&nbsp;&nbsp;@pixeladmin</a>
        <a href="#" class="display-block m-b-1 text-nowrap"><i class="fa fa-facebook"></i>&nbsp;&nbsp;PixelAdmin</a>
        <a href="#" class="display-block text-nowrap"><i class="fa fa-envelope"></i>&nbsp;&nbsp;support@pixeladmin.com</a>
      </div>
    </div>

    <hr class="page-wide-block">

    <span class="text-muted">Copyright © 2017 PixelAdmin LLC. All rights reserved.</span>
  </footer>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="{{ asset( 'assets/js/bootstrap.min.js' ) }}"></script>
  <script src="{{ asset( 'assets/js/pixeladmin.min.js' ) }}"></script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize DEMO sidebar

    $(function() {
      pxDemo.initializeDemoSidebar();

      $('#px-demo-sidebar').pxSidebar();
      pxDemo.initializeDemo();
    });
  </script>

  <script type="text/javascript">
    // -------------------------------------------------------------------------
    // Initialize DEMO

    $(function() {
      var file = String(document.location).split('/').pop();

      // Remove unnecessary file parts
      file = file.replace(/(\.html).*/i, '$1');

      if (!/.html$/i.test(file)) {
        file = 'index.html';
      }

      // Activate current nav item
      $('body > .px-nav')
        .find('.px-nav-item > a[href="' + file + '"]')
        .parent()
        .addClass('active');

      $('body > .px-nav').pxNav();
      $('body > .px-footer').pxFooter();

      $('#navbar-notifications').perfectScrollbar();
      $('#navbar-messages').perfectScrollbar();
    });
  </script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize uploads chart

    $(function() {
      var data = [
        { day: '2014-03-10', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-11', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-12', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-13', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-14', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-15', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-16', v: pxDemo.getRandomData(20, 5) }
      ];

      new Morris.Line({
        element: 'hero-graph',
        data: data,
        xkey: 'day',
        ykeys: ['v'],
        labels: ['Value'],
        lineColors: ['#fff'],
        lineWidth: 2,
        pointSize: 4,
        gridLineColor: 'rgba(255,255,255,.5)',
        resize: true,
        gridTextColor: '#fff',
        xLabels: "day",
        xLabelFormat: function(d) {
          return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate();
        },
      });
    });

    // -------------------------------------------------------------------------
    // Initialize easy pie charts

    $(function() {
      var colors = pxDemo.getRandomColors();

      var config = {
        animate: 2000,
        scaleColor: false,
        lineWidth: 4,
        lineCap: 'square',
        size: 90,
        trackColor: 'rgba(0, 0, 0, .09)',
        onStep: function(_from, _to, currentValue) {
          var value = $(this.el).attr('data-max-value') * currentValue / 100;

          $(this.el)
            .find('> span')
            .text(Math.round(value) + $(this.el).attr('data-suffix'));
        },
      }

      var data = [
        pxDemo.getRandomData(1000, 1),
        pxDemo.getRandomData(100, 1),
        pxDemo.getRandomData(64, 1),
      ];

      $('#easy-pie-chart-1')
        .attr('data-percent', (data[0] / 1000) * 100)
        .attr('data-max-value', 1000)
        .easyPieChart($.extend({}, config, { barColor: colors[0] }));

      $('#easy-pie-chart-2')
        .attr('data-percent', (data[1] / 100) * 100)
        .attr('data-max-value', 100)
        .easyPieChart($.extend({}, config, { barColor: colors[1] }));

      $('#easy-pie-chart-3')
        .attr('data-percent', (data[2] / 64) * 100)
        .attr('data-max-value', 64)
        .easyPieChart($.extend({}, config, { barColor: colors[2] }));
    });

    // -------------------------------------------------------------------------
    // Initialize retweets graph

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#sparkline-1").pxSparkline(data, {
        type: 'line',
        width: '100%',
        height: '42px',
        fillColor: '',
        lineColor: '#fff',
        lineWidth: 2,
        spotColor: '#ffffff',
        minSpotColor: '#ffffff',
        maxSpotColor: '#ffffff',
        highlightSpotColor: '#ffffff',
        highlightLineColor: '#ffffff',
        spotRadius: 4,
      });
    });

    // -------------------------------------------------------------------------
    // Initialize Monthly visitor statistics graph

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#sparkline-2").pxSparkline(data, {
        type: 'bar',
        height: '42px',
        width: '100%',
        barSpacing: 2,
        zeroAxis: false,
        barColor: '#ffffff',
      });
    });

    // -------------------------------------------------------------------------
    // Initialize scrollbars

    $(function() {
      $('#support-tickets').perfectScrollbar();
      $('#comments').perfectScrollbar();
      $('#threads').perfectScrollbar();
    });
  </script>
</body>
</html>




    