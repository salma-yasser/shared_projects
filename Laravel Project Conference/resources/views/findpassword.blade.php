@extends('layouts.app')

@section('content')
@if (Auth::guest())
<!-- <link href="{{URL::asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css" />
<!-- <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" /> -->
<!-- <link href="{{URL::asset('css/eyesight.css')}}" rel="stylesheet" type="text/css"> -->
<!-- <link rel="stylesheet" href="{{URL::asset('css/swiper.min.css')}}"> -->
<div id="content">
  <table width="1200" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="300" valign="top">         
         <table width="250" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td height="50" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td height="65" valign="top">
                  <div class="leftMenu">
                    <div class="leftMenutTitle">
                      Membership
                    </div>
                    <div class="items">
                        <a href="login" class="item">Login</a>
                        <a href="signup" class="item">Sign Up</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="50" id="vtimeline">
                <div class="board">
                    <div class="clear20"></div>
                    <div class="innerFullWidth">
                      <ul class="bullet2">
                          <li><p class="strong">Start of abstract submission</p> 
                            <span>July 1, 2018</span></li>
                      </ul>
                    </div>
                    <div class="innerFullWidth">
                      <ul class="bullet2">
                          <li><p class="strong">Deadline of abstract submission</p> 
                            <span style="color: red;">December 15, 2018</span></li>
                      </ul>
                    </div>
                    <div class="innerFullWidth">
                      <ul class="bullet2">
                          <li><p class="strong">Deadline of full paper submission</p> 
                            <span>January 31 , 2019</span></li>
                      </ul>
                    </div>
                    <div class="innerFullWidth">
                      <ul class="bullet2">
                          <li><p class="strong">Announcement of conference program</p> 
                            <span>March 1, 2019</span></li>
                      </ul>
                    </div>
                </div>
                <div class="shadowHolderflat"><img src="{{URL::asset('new/images/big-shadow4.png')}}" alt=""></div>
              </td>
            </tr>
            <tr>
                <td height="50" valign="top">&nbsp;</td>
              </tr>
          </table>
          </td>
          <td valign="top" style="padding-bottom:20px;">
            <table width="870" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Reset Password</span></h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <script type="text/javascript">

                  function isEmpty( data ) 
                  {
                    for ( var i = 0 ; i < data.length ; i++ ) {
                      if ( data.substring( i, i+1 ) != ' ' )
                        return false;
                    }
                    return true;
                  }

                  function login_check()
                  {
                    var f = document.resetpassword;

                    if (isEmpty(f.email.value))
                    {
                      alert("Please check the E-mail.") ;
                      f.email.focus() ;
                      return false;
                    }
                    
                    // if (isEmpty(f.password.value))
                    // {
                    //   alert("Please check the Password.") ;
                    //   f.password.focus() ;
                    //   return false;
                    // }
                  }

                  // function win_findpass() {
                  //   var window_left = (screen.width-395)/2;
                  //   window.open("findpass","findpass","width=460, height=320,top=100,left=" + window_left + "");
                  // }

                </script>
                <table width="900" border="0" cellspacing="0" cellpadding="0">
                  <form name="resetpassword" method="post" action="{{ route('reset') }}" onsubmit="return login_check();">
                     {{ csrf_field() }}
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" id="subtable1_write">
                          <tr>
                            <td width="22%" bgcolor="#f8f8f8" class="first"><img src="{{URL::asset('image/eyesight/icon_blackbox.gif')}}" width="3" height="3" align="absmiddle"> E-mail Address</td>
                            <td class="first" width="30%"><input name="email" type="text" class="hbox" id="email" size="40"></td>
                            <td bgcolor="#f8f8f8" class="first"><a onclick="document.resetpassword.submit();" class="button_icems2018"> <span style="color: #ffffff; margin: auto 9px;">Reset Password</span> </a></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" bgcolor="#FFFFFF" style="padding-top:20px;border-bottom:0px"> 
                            </td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li><span style="color:#E46C0A">{{ $error }}</span></li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    </tr>
                    <tr>
                      <td align="left" style="padding-top:10px;"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                      </table></td>
                    </tr>
                  </form>
                </table>
                </td>
              </tr>
              <tr>
                <td valign="top"><p><br>
                  </p></td>
              </tr>
              <tr>
                <td height="40">&nbsp;</td>
              </tr>
            </table>
          </td>
      </tr>
    </tbody>
  </table>
</div>  
@else
  <meta http-equiv="refresh" content="0; url=mypage">
@endif
@endsection