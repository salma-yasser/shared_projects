<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
        <meta name="author" content="Djava UI">
        <title>Ugrow</title>
        <!--/ END META SECTION -->

        <!-- START @FAVICONS -->
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon.png" rel="shortcut icon">
        <!--/ END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="/assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="/assets/admin/css/reset.css" rel="stylesheet">
        <link href="/assets/admin/css/layout.css" rel="stylesheet">
        <link href="/assets/admin/css/components.css" rel="stylesheet">
        <link href="/assets/admin/css/plugins.css" rel="stylesheet">
        <link href="/assets/admin/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="/assets/admin/css/custom.css" rel="stylesheet">
        <!--/ END THEME STYLES -->

        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="/assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="/assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->


        @yield('css')
    </head>
    <!--/ END HEAD -->

    <body class="page-footer-fixed">

        <!-- START @WRAPPER -->
        <section id="wrapper">

            <!-- START @HEADER -->
            <header id="header">

                <!-- Start header right -->
                <div class="header-right ">
                    <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <div class="navbar-minimize-mobile left">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!--/ End offcanvas left -->

                    <!-- Start navbar header -->
                    <div class="navbar-header">

                        <!-- Start brand -->
                        <a class="navbar-brand" href="dashboard.html">
                            <img class="logo" src="/assets/global/img/logo.png" alt="brand logo">
                        </a><!-- /.navbar-brand -->
                        <!--/ End brand -->

                    </div><!-- /.navbar-header -->
                    <!--/ End navbar header -->

                    <div class="clearfix"></div>
                </div><!-- /.header-right -->
                <!--/ End header right -->

                <!-- Start header left -->
                <div class="header-left">
                    <!-- Start navbar toolbar -->
                    <div class="navbar navbar-toolbar">

                        <!-- Start left navigation -->
                        <ul class="nav navbar-nav navbar-left"><!-- /.nav navbar-nav navbar-left -->

                        <!-- Start profile -->
                        <li class="dropdown navbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="meta">
                                    <span class="text hidden-xs hidden-sm text-muted">username</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <!-- Start dropdown menu -->
                            <ul class="dropdown-menu animated flipInX" style="direction: ltr;">
                                <li class="dropdown-header">Account</li>
                                <li><a href="page-profile.html"><i class="fa fa-user"></i>View profile</a></li>
                               <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>         
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                            </ul>
                            <!--/ End dropdown menu -->
                        </li><!-- /.dropdown navbar-profile -->
                        <!--/ End profile -->

                        <!-- Start messages -->
                        <li class="dropdown navbar-message">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="rounded count label label-danger">7</span></a>

                        </li><!-- /.dropdown navbar-message -->
                        <!--/ End messages -->

                        <!-- Start notifications -->
                        <li class="dropdown navbar-notification">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="rounded count label label-danger">6</span></a>

                            <!-- Start dropdown menu -->
                            <div class="dropdown-menu animated flipInX">
                                <div class="dropdown-header">
                                    <span class="title">Notifications <strong>(10)</strong></span>
                                </div>
                                <div class="dropdown-body niceScroll">

                                    <!-- Start notification list -->
                                    <div class="media-list small">

                                        <a href="#" class="media">
                                            <div class="media-object pull-left"><i class="fa fa-cogs fg-success"></i></div>
                                            <div class="media-body">
                                                <span class="media-text">Your sistem is updated</span>
                                                <!-- Start meta icon -->
                                                <span class="media-meta">5 minutes</span>
                                                <!--/ End meta icon -->
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->

                                        <!-- Start notification indicator -->
                                        <a href="#" class="media indicator inline">
                                            <span class="spinner">Load more notifications...</span>
                                        </a>
                                        <!--/ End notification indicator -->
                                    </div>
                                    <!--/ End notification list -->
                                </div>
                                <div class="dropdown-footer">
                                    <a href="#">See All</a>
                                </div>
                            </div>
                            <!--/ End dropdown menu -->

                        </li><!-- /.dropdown navbar-notification -->
                        <!--/ End notifications -->

                        </ul><!-- /.navbar-left -->
                        <!--/ End left navigation -->

                        <!-- Start right navigation -->
                            <ul class="nav navbar-nav navbar-right">

                                <!-- Start sidebar shrink -->
                                <li class="navbar-minimize pull-right">
                                    <a href="javascript:void(0);" title="Minimize sidebar">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                <!--/ End sidebar shrink -->

                                <!-- Start form search -->
                                <!-- <li class="navbar-search"> -->
                                    <!-- Just view on mobile screen-->
                                   <!--  <a href="#" class="trigger-search"><i class="fa fa-search"></i></a>
                                    <form class="navbar-form">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control typeahead rounded" placeholder="Search">
                                            <button type="submit" class="btn btn-theme fa fa-search form-control-feedback rounded"></button>
                                        </div>
                                    </form>
                                </li> -->
                                <!--/ End form search -->

                            </ul><!-- /.navbar-right -->
                            <!--/ End right navigation -->

                    </div><!-- /.navbar-toolbar -->
                    <!--/ End navbar toolbar -->
                </div><!-- /.header-right -->
                <!--/ End header left -->

            </header> <!-- /#header -->
            <!--/ END HEADER -->

            <aside id="sidebar-left" class="sidebar-circle">

                <!-- Start left navigation - profile shortcut -->
                <div class="sidebar-content">
                    <div class="media">
                        <a class="pull-right has-notif avatar" href="#">
                            <img src="/assets/global/img/icon/64/contact.png" alt="admin">
                            <i class="online"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Hello, <span>username</span></h4>
                            <small>Job</small>
                        </div>
                    </div>
                </div><!-- /.sidebar-content -->
                <!--/ End left navigation -  profile shortcut -->

                <!-- Start left navigation - menu -->
                <ul class="sidebar-menu">             
                    <li {!! Request::is('dashboard','dashboard/*') ? 'class="active"' : null !!}>
                         <a href="{{URL::asset('dashboard')}}">
                                <span class="icon"><i class="fa fa-home"></i></span>
                                <span class="text">لوحة التحكم</span>
                                {!! Request::is('dashboard') ? '<span class="selected"></span>' : null !!}
                        </a>

                    </li>
                    <!-- Start category UGrow -->
                    <li class="sidebar-category">
                        <span>الإعدادات</span>
                        <span class="pull-left"><i class="fa fa-cog"></i></span>
                    </li>
                    <!--/ End category UGrow -->

                    <!-- Start development - layouts -->
                    <li {!! Request::is('departments','departments/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('departments')}}">
                            <span class="icon"><i class="fa fa-tags"></i></span>
                            <span class="text">الأقسام</span>
                            {!! Request::is('departments','departments/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                    </li>
                    
                    <li {!! Request::is('jobs','jobs/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('jobs')}}">
                            <span class="icon"><i class="fa fa-tasks"></i></span>
                            <span class="text">وظائف العملاء</span>
                            {!! Request::is('jobs','jobs/*') ? '<span class="selected"></span>' : null !!}
                        </a>   
                    </li>

                    <li {!! Request::is('how_knows','how_knows/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('how_knows')}}">
                            <span class="icon"><i class="fa fa-question"></i></span>
                            <span class="text">كيف توصلت إلينا</span>
                            {!! Request::is('how_knows','how_knows/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                    </li>

                    <li {!! Request::is('roles','roles/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('roles')}}">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <span class="text">الوظائف</span>
                            {!! Request::is('roles','roles/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                    </li>

                    <li {!! Request::is('courses','courses/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('courses')}}">
                            <span class="icon"><i class="fa fa-certificate"></i></span>
                            <span class="text">الدورات</span>
                            {!! Request::is('courses','courses/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                    </li>

                    <li {!! Request::is('programs','programs/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('programs')}}">
                            <span class="icon"><i class="fa fa-university"></i></span>
                            <span class="text">البرامج</span>
                            {!! Request::is('programs','programs/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                    </li>

                    <!-- Start category Customers -->
                    <li class="sidebar-category">
                        <span>العملاء</span>
                        <span class="pull-left"><i class="fa fa-trophy"></i></span>
                    </li>
                    
                    <li {!! Request::is('customers')? 'class="submenu active"' : 'class="submenu"' !!}>
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <span class="text">العملاء</span>
                            <span class="plus"></span>
                            {!! Request::is('customers') ? '<span class="selected"></span>' : null !!}
                        </a>
                        <ul>
                            <li class="active"><a href="{{URL::asset('customers')}}">All</a></li>
                        </ul>
                    </li>

                    <li {!! Request::is('adults','adults/*','kids','kids/*')? 'class="submenu active"' : 'class="submenu"' !!}>
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <span class="text">Registration Form</span>
                            <span class="plus"></span>
                            {!! Request::is('adults','adults/*','kids','kids/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                        <ul>
                            <li class="active"><a href="{{URL::asset('adults/create')}}">Adults</a></li>
                            <li class="active"><a href="{{URL::asset('kids/create')}}">Kids</a></li>
                        </ul>
                    </li>

                    <li {!! Request::is('adult_application_create','adult_application_create')? 'class="submenu active"' : 'class="submenu"' !!}>
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <span class="text">Application Form</span>
                            <span class="plus"></span>
                            {!! Request::is('adult_application_create','adult_application_create') ? '<span class="selected"></span>' : null !!}
                        </a>
                        <ul>
                            <li class="active"><a href="{{URL::asset('adult_application_create')}}">Adults</a></li>
                            <li class="active"><a href="{{URL::asset('kid_application_create')}}">Kids</a></li>
                        </ul>
                    </li>

                    <li {!! Request::is('parents','parents/*')? 'class="active"' : null !!}>
                        <a href="{{URL::asset('parents')}}">
                            <span class="icon"><i class="fa fa-group"></i></span>
                            <span class="text">أولياء الأمور</span>
                            {!! Request::is('parents','parents/*') ? '<span class="selected"></span>' : null !!}
                        </a>
                    
                    </li>
                </ul><!-- /.sidebar-menu -->
                <!--/ End left navigation - menu -->

            </aside><!-- /#sidebar-left -->
            <!--/ END SIDEBAR LEFT -->

            <!-- START @PAGE CONTENT id="page-content" -->
            <section id="page-content">

                <!-- Start body content -->
                <div class="body-content animated fadeIn" style="min-height: 600px;">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel rounded shadow">

                                <div class="panel-heading">
                                    @yield('header')
                                </div><!-- /.panel-heading -->
                                <div class="panel-body">
                                    @yield('content')
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->

                        </div>
                    </div>

                </div><!-- /.body-content -->
                <!--/ End body content -->

                <!-- Start footer content -->
                <footer class="footer-content">
                    Copyrights © 2017 All Rights Reserved.
                </footer><!-- /.footer-content -->
                <!--/ End footer content -->

            </section><!-- /#page-content -->
            <!--/ END PAGE CONTENT -->

        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
        <script src="/assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
        <script src="/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/assets/global/plugins/bower_components/typehead.js/dist/handlebars.js"></script>
        <script src="/assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js"></script>
     
        <script src="/assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
        <script src="/assets/global/plugins/bower_components/jquery.sparkline.min/index.js"></script>
        <script src="/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
        <script src="/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
        <script src="/assets/global/plugins/bower_components/bootbox/bootbox.js"></script>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="/assets/admin/js/apps.js"></script>
        <script src="/assets/admin/js/demo.js"></script>
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

        <!-- START GOOGLE ANALYTICS -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-55892530-1', 'auto');
            ga('send', 'pageview');

        </script>

        <!--/ END GOOGLE ANALYTICS -->


        @yield('scripts')

    </body>
    <!--/ END BODY -->

</html>
