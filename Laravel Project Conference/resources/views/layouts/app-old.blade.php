<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Scientific Research ISR-2019') }}</title>

    <!-- Styles -->
    <link href="{{URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/eyesight.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/swiper.min.css')}}">
    <script type="text/javascript" src="{{URL::asset('js/java.js')}}"/>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38713089-12', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
    function activeArt_menu_sub(tg)
    {
        tg.style.backgroundColor = "#afc445";
        tg.style.fontWeight = "normal";
        tg.style.color = "#ffffff";
    }

    function deactiveArt_menu(tg)
    {
        tg.style.backgroundColor = "#ffffff";
        tg.style.fontWeight = "normal";
        tg.style.color = "#666666";
    }

    function deactiveArt_menu_on(tg)
    {
        tg.style.backgroundColor = "#afc445";
        tg.style.fontWeight = "normal";
        tg.style.color = "#ffffff";
    }

    function setCookie( name, value, expiredays )
    {
        var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    }
    
    function GetCookie( name )
    {
        var nameOfCookie = name + "=";
        var x = 0;
        while ( x <= document.cookie.length )
        {
            var y = (x+nameOfCookie.length);
            if ( document.cookie.substring( x, y ) == nameOfCookie ) {
                if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
                    endOfCookie = document.cookie.length;
                return unescape( document.cookie.substring( y, endOfCookie ) );
            }
            x = document.cookie.indexOf( " ", x ) + 1;
            if ( x == 0 )
                break;
        }
        return "";
    }


    if(GetCookie( "Scientific Research ISR-2019_popup01" ) != "done")
    {
        var window_left = (screen.width-1000)/2;
        //window.open("popup/popup01","popupView1","resizable=0,scrollbars=0,width=400,height=300,top=50,left=" + window_left + "");
    } 
</script>
<script src="{{URL::asset('js/swiper.min.js')}}"></script>

<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{URL::asset('image/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
</head>
<body>
<div id="wrap">
  <div id="header_wrap">
    <div id="header">
      <table width="1200" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="300"><a href="index"><img src="{{URL::asset('image/common/top_logo_sub.gif')}}" border="0"></a></td>
            <td width="900"><div style="padding-left:28px;"><a href="welcome" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top1','','image/common/top_menu1_over.gif',1);MM_showHideLayers('topsub1','','show','topsub2','','hide','topsub3','','hide','topsub5','','hide','topsub6','','hide','topsub7','','hide')"><img src="{{URL::asset('image/common/top_menu1.gif')}}" name="top1" width="120" height="130" border="0" id="top1"></a><a href="program" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top2','','image/common/top_menu2_over.gif',1);MM_showHideLayers('topsub1','','hide','topsub2','','show','topsub3','','hide','topsub5','','hide','topsub6','','hide','topsub7','','hide')"><img src="{{URL::asset('image/common/top_menu2.gif')}}" name="top2" width="120" height="130" border="0" id="top2" style="padding-left:5px;"></a><a href="fullpaper" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top3','','image/common/top_menu3_over.gif',1);MM_showHideLayers('topsub1','','hide','topsub2','','hide','topsub3','','show','topsub5','','hide','topsub6','','hide','topsub7','','hide')"><img src="{{URL::asset('image/common/top_menu3.gif')}}" name="top3" width="120" height="130" border="0" id="top3" style="padding-left:5px;"></a><a href="registration" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top4','','image/common/top_menu4_over.gif',1);MM_showHideLayers('topsub1','','hide','topsub2','','hide','topsub3','','hide','topsub5','','hide','topsub6','','hide','topsub7','','hide')"><img src="{{URL::asset('image/common/top_menu4.gif')}}" name="top4" width="120" height="130" border="0" id="top4" style="padding-left:5px;"></a><a href="hotel" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top5','','image/common/top_menu5_over.gif',1);MM_showHideLayers('topsub1','','hide','topsub2','','hide','topsub3','','hide','topsub5','','show','topsub6','','hide','topsub7','','hide')"><img src="{{URL::asset('image/common/top_menu5.gif')}}" name="top5" width="120" height="130" border="0" id="top5" style="padding-left:5px;"></a><a href="joinexhibition" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top6','','image/common/top_menu6_over.gif',1);MM_showHideLayers('topsub1','','hide','topsub2','','hide','topsub3','','hide','topsub5','','hide','topsub6','','show','topsub7','','hide')"><img src="{{URL::asset('image/common/top_menu6.gif')}}" name="top6" width="120" height="130" border="0" id="top6" style="padding-left:5px;"></a><a href="city" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top7','','image/common/top_menu7_over.gif',1);MM_showHideLayers('topsub1','','hide','topsub2','','hide','topsub3','','hide','topsub5','','hide','topsub6','','hide','topsub7','','show')"><img src="{{URL::asset('image/common/top_menu7.gif')}}" name="top7" width="120" height="130" border="0" id="top7" style="padding-left:5px;"></a></div></td>
          </tr>
        </tbody>
      </table>
      <div id="topsub1" style="position:absolute; left:290px; top:105px; visibility: hidden;width:200px;z-index:9999">
        <table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back1.png')}}" width="200" height="35"></td>
          </tr>
          <tr>
            <td align="center" background="image/common/submenu_back2.png"><table width="160" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='welcome'" class="sub">Welcome  Message</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='committee'" class="sub">Committee</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='overview'" class="sub">Overview</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='topic'" class="sub">Conference  Topics</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='venue'" class="sub">Venue</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back3.png')}}" width="200" height="35"></td>
          </tr>
        </table>
      </div>
      <div id="topsub2" style="position:absolute; left:410px; top:105px;display:hidden;width:200px;z-index:9999">
        <table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back1.png')}}" width="200" height="35"></td>
          </tr>
          <tr>
            <td align="center" background="image/common/submenu_back2.png"><table width="160" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='program'" class="sub">Program at a Glance</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='keynote'" class="sub">Keynote Speakers</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='special'" class="sub">Special Sessions</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='social'" class="sub">Social Programs</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back3.png')}}" width="200" height="35"></td>
          </tr>
        </table>
      </div>
      <div id="topsub3" style="position:absolute; left:540px; top:105px;display: hidden;width:200px;z-index:9999">
        <table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back1.png')}}" width="200" height="35"></td>
          </tr>
          <tr>
            <td align="center" background="image/common/submenu_back2.png"><table width="160" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='digests'" class="sub">Digests Submission</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='fullpaper'" class="sub">Full Paper Submission</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='presentation'" class="sub">Presentation Guidelines</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back3.png')}}" width="200" height="35"></td>
          </tr>
        </table>
      </div>
      <div id="topsub5" style="position:absolute; left:790px; top:105px;display: hidden;width:200px;z-index:9999">
        <table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back1.png')}}" width="200" height="35"></td>
          </tr>
          <tr>
            <td align="center" background="image/common/submenu_back2.png"><table width="160" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='hotel'" class="sub">Hotel</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='tour_half'" class="sub">Optional Tour</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back3.png')}}" width="200" height="35"></td>
          </tr>
        </table>
      </div>
      <div id="topsub6" style="position:absolute; left:915px; top:105px;display: hidden;width:200px;z-index:9999">
        <table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back1.png')}}" width="200" height="35"></td>
          </tr>
          <tr>
            <td align="center" background="image/common/submenu_back2.png"><table width="160" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='joinexhibition'" class="sub">Join the Exhibition</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='bepartner'" class="sub">Be a Partner</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='ourpartner'" class="sub">Our Partner</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back3.png')}}" width="200" height="35"></td>
          </tr>
        </table>
      </div>
      <div id="topsub7" style="position:absolute; left:1005px; top:105px;display: hidden;width:200px;z-index:9999">
        <table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back1.png')}}" width="200" height="35"></td>
          </tr>
          <tr>
            <td align="center" background="image/common/submenu_back2.png"><table width="160" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='city'" class="sub">City</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='transportation'" class="sub">Transportation</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='visa'" class="sub">Visa</td>
                </tr>
                <tr>
                  <td height="25" style="cursor:pointer;padding-left:10px;" onmouseover="javascript:activeArt_menu_sub(this)" onmouseout="javascript:deactiveArt_menu(this)" onclick="location.href='essentials'" class="sub">Traveler's Essentials</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><img src="{{URL::asset('image/common/submenu_back3.png')}}" width="200" height="35"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div id="content_wrap">
    @yield('content')
  </div>

  <div id="footer_wrap2">
    <div id="footer2">
    <table width="1200" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <!-- <td width="130" height="70" valign="top"><img src="image/common/footer_logo.gif"></td> -->
            <td width="1070" valign="top"><span class="footer"><!-- The Korean Institute of Electrical Engineers<br /> -->
            &nbsp;<img src="image/common/footer_web.gif" align="absmiddle" />&nbsp;&nbsp;web: isr.tanta.edu.eg<br />
            <img src="image/common/footer_email.gif" align="absmiddle" /> E-mail: <a href="mailto:isr-19@unv.tanta.edu.eg" class="footer">isr-19@unv.tanta.edu.eg</a><br />
            <img src="image/common/footer_tel.gif" align="absmiddle" />Tel: 0201228517896&nbsp;<img src="image/common/footer_bar.gif" width="23" height="13" hspace="1" align="absmiddle" />Fax: 020403404914</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
