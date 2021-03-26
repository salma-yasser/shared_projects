<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123053830-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123053830-1');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>{{ config('app.name', 'Scientific Research ISR-2019') }}</title>

<link rel="shortcut icon" href="{{URL::asset('new/images/logo.png') }}">

<!-- Style -->

<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />

<link href="{{URL::asset('new/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('new/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    
<link href="{{URL::asset('new/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('new/font/stylesheet.css') }}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('new/css/bromoPanel.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="{{URL::asset('new/css/blueBoxed.css') }}" title="blueBoxed" media="screen"> 
<link rel="alternate stylesheet" type="text/css" href="{{URL::asset('new/css/blueFull.css') }}" title="blueFull" media="screen">
<link rel="stylesheet" type="text/css" href="{{URL::asset('new/css/new-style.css') }}">


 <!-- Styles -->
    <!-- <link href="{{URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/eyesight.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/swiper.min.css')}}"> -->
    <!-- <script type="text/javascript" src="{{URL::asset('js/java.js')}}"/> -->
</head>

<body>
    
<div class="wrap">
	<div id="header">
        <div class="topbar">
            <div class="main-wrap">
                @if (Auth::guest())
                <a href="signup" class="signup">
                   <i class="fa fa-paper-plane"></i> Signup
                </a>
                 @else
                 <a href="{{ route('logout') }}" class="signup" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" >Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
                <a class="spacer"> | </a>
                @if (Auth::guest())
                <a href="mypage" class="login">
                   <i class="fa fa-sign-in"></i> Login My Page
                </a>
                @else
                 <a href="mypage" class="signup">
                    My Page
                </a>
                 @if(Auth::user()->usersboards->count() != 0)
                        <a class="spacer"> | </a>
                     <a href="paper_committee" class="signup">
                        Papers of Scientific Committee
                    </a>
                @endif
                @endif
            </div>
        </div>
        <div class="menu-wrap">
        	<!-- start menu wrap -->
        	<div class="main-menu-wrap">
            	               <!-- start main menu -->
                <div class="main-menu">
                    <ul>
                        <li><a href="welcome">Conference Information</a>
                            <ul>
                                <li><a href="welcome">Welcome  Message</a></li>
                                <li><a href="committee">Committee</a></li>
                                <li><a href="scientific_committee">Scientific Committee</a></li>
                                <li><a href="overview">Overview</a></li>
                                <li><a href="topic">Conference  Topics</a></li>
                                <li><a href="venue">Venue</a></li>
                                <li><a href="sponser">Sponsers</a></li>
                            </ul>
                        </li>
                        <li><a href="program">Program</a>
                            <ul>
                                <li><a href="program">Program</a></li>
                                <li><a href="keynote">Keynote Speakers</a></li>
                                <li><a href="workshop">Workshops</a></li>
                                <li><a href="special">Special Sessions</a></li>
                                <li><a href="social">Social Programs</a></li>
                            </ul>
                        </li>
                        <li><a href="digests">Submission</a>
                            <ul>
                                <li><a href="digests">Digests Submission</a></li>
                                <li><a href="digests_guide">Guidelines</a></li>
                                <li><a href="mypage">Full Paper Submission</a></li>
                                <li><a href="presentation">Presentation Guidelines</a></li>
                            </ul>
                        </li>
                        <li><a href="registration" >Registration</a></li> 
                        <li><a href="hotel" >Hotel & Optional Tour</a>
                            <ul>
                                <li><a href="hotel">Hotel</a></li>
                                <li><a href="tour_half">Optional Tour</a></li>
                            </ul>
                        </li> 
                        <li><a href="joinexhibition" >Partnership</a>
                            <ul>
                                <li><a href="joinexhibition">Join the Exhibition</a></li>
                                <li><a href="bepartner">Be a Partner</a></li>
                                <li><a href="ourpartner">Our Partner</a></li>
                            </ul>
                        </li>
                        <li><a href="city" >Travel Information</a>
                            <ul>
                                <li><a href="city">City</a></li>
                                <li><a href="transportation">Transportation</a></li>
                                <li><a href="visa">Visa</a></li>
                                <li><a href="essentials">Traveler's Essentials</a></li>
                            </ul>
                        </li> 
                    </ul>
                </div><!-- end main menu -->
                
                <!-- start logo -->
                <div class="logo">
                    <a href="index"><img src="{{URL::asset('new/images/logo.png')}}" alt="Home"></a>
                </div>
                <!-- end logo -->
            </div><!-- end main menu wrap -->
        </div><!-- end menu wrap -->
        
    </div><!-- end header section -->
    
        
    <div id="main">
        @yield('content')
    </div><!-- end main -->
             
    
    <!-- start footer -->
    <div id="footer" class="boxed">
        <div class="footer-wrap">
           <div class="contact_info">
               <p><i class="fa fa-globe"></i> Website: isr.tanta.edu.eg</p>
               <p><i class="fa fa-envelope"></i> E-mail: <a href="mailto:isr-19@unv.tanta.edu.eg"> isr-19@unv.tanta.edu.eg</a></p>
               <p><i class="fa fa-phone"></i> Tel: 0201228517896</p>
               <p><i class="fa fa-fax"></i> Fax: 020403404914</p>
           </div>
            
        </div>
        <div class="clear"></div>
        
        <!-- start post footer -->
        <div class="post-footer">
            <div class="post-footer-wrap">
                <p class="copyright">Copyright &copy; 2018-2019. All rights reserved.</p>
            </div>
        </div><!-- end post footer -->
    </div><!-- end footer -->
    
</div>
<!-- <div class="clear"></div>
<div id="footerShadow" class="boxed boxed"><div class="shadowHolderflat"><img src="images/big-shadow.png" alt=""></div></div> -->

    
<!-- Javascript -->
<script type="text/javascript" src="{{URL::asset('new/js/jquery-1.7.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/java.js')}}"/>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.cycle.all.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.tipsy.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/custom.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/animatedcollapse.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/input.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.nivo.slider.pack.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/nivoslider.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/slide.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/slides.min.jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.jtweetsanywhere-1.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.preloader.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.eislideshow.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/swfobject.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/jquery.ui.totop.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('new/js/styleswitch.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/cookies.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('new/js/cssLoader.js')}}"></script>


</body>
</html>
