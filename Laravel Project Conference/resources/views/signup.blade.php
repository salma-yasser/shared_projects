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
                        <a href="signup" class="item left_on">Sign Up</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Sign Up</span></h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <script src="http://code.jquery.com/jquery-1.12.4.js"></script>
                  <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                  <script type="text/javascript">

                    $( function() {
                      var f = document.signup;
                   
                      $( "#affiliation" ).autocomplete({
                        source: function( request, response ) {
                          $.ajax( {
                            url: "affiliation_ajax",
                            dataType: "jsonp",
                            data: {
                              term: request.term
                            },
                            success: function( data ) {
                              response( data );
                            }
                          } );
                        },
                        minLength: 2,
                        select: function( event, ui ) {
                          f.country.value = ui.item.id;
                          f.affiliation.value = ui.item.value;
                        }
                      } );
                    } );

                  </script>
                  <script type="text/javascript">

                    function isEmpty( data ) 
                    {
                      for ( var i = 0 ; i < data.length ; i++ ) {
                        if ( data.substring( i, i+1 ) != ' ' )
                          return false;
                      }
                      return true;
                    }

                    function signup_check()
                    {
                      var f = document.signup;

                      if (isEmpty(f.fname.value))
                      {
                        alert("Please check the First (Middle) Name") ;
                        f.fname.focus() ;
                        return false;
                      }
                      
                      if (isEmpty(f.lname.value))
                      {
                        alert("Please check the Last Name") ;
                        f.lname.focus() ;
                        return false;
                      }

                      if (isEmpty(f.degree_id.value))
                      {
                        alert("Please check the Degree") ;
                        f.degree_id.focus() ;
                        return false;
                      }
                      
                      if (isEmpty(f.affiliation.value))
                      {
                        alert("Please check the Affiliation.") ;
                        f.affiliation.focus() ;
                        return false;
                      }
                      
                      var regMail = /^[.a-z A-Z 0-9\-_]+@[a-z A-Z 0-9\-]+(\.[a-z A-Z 0-9 \-]+)+$/;

                      if(!eval(regMail).test(f.email.value)){
                        alert("Please check the E-mail") ;
                        f.email.focus() ;
                        return false;
                      } 
                      
                      if (isEmpty(f.password.value))
                      {
                        alert("Please check the Password") ;
                        f.password.focus() ;
                        return false;
                      }

                      if (f.password.value.length<6)
                      {
                        alert("Password must be more than 6 characters") ;
                        f.password.focus() ;
                        return false;
                      }
                      
                      if (f.password.value != f.password_confirmation.value)
                      {
                        alert("Confirm Password doesn't match") ;
                        f.password_confirmation.focus() ;
                        return false;
                      }
                      
                      f.target="_top";
                      f.method="post";
                      f.action="{{ route('register') }}";
                      f.submit();
                    }

                    function mail_chk() {
                      var f = document.signup;
                      
                      if (f.email.value == "") {
                        alert("Please check the E-mail");
                        f.email.focus();
                        return;
                      } else {  
                        var regMail = /^[.a-z A-Z 0-9\-_]+@[a-z A-Z 0-9\-]+(\.[a-z A-Z 0-9 \-]+)+$/;
                    
                        if(!eval(regMail).test(f.email.value)){
                          alert("Please check the Author Email") ;
                          f.email.focus() ;
                          return ;
                        }       

                        var email = f.email.value;
                      
                        f.target="memchk";
                        f.action="emailchk_i?email="+email;
                        f.submit();
                      }
                    }

                  </script>

                  <table width="900" border="0" cellspacing="0" cellpadding="0">
                    <form name="signup" method="post" action="{{ route('register') }}" onsubmit="return signup_check();">
                       {{ csrf_field() }}
                      <tr>
                        <td><div style="padding-bottom:7px;">Please fill in the following fields exactly to register for online access.</div>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" id="subtable1_write" style="table-layout:fixed">
                            <tr>
                              <td width="220" bgcolor="#f8f8f8" class="first">First (Middle) Name<span style="color:#E46C0A">*</span></td>
                              <td class="first"><input name="fname" type="text" id="fname" size="30" class="hbox"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#f8f8f8">Last Name<span style="color:#E46C0A">*</span></td>
                              <td><input name="lname" type="text" id="lname" size="30" class="hbox"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#f8f8f8">Degree<span style="color:#E46C0A">*</span></td>
                              <td><select name="degree_id" id="degree_id" class="hbox">
                                  <option value="">-- Select One --</option>
                                  <option value="1">Professor</option>
                                  <option value="2">Associate Professor</option>
                                  <option value="3">Assistance Prof. (Lecturer)</option> 
                                  <option value="4">Doctor</option>
                                  <option value="5">Research Student</option>
                                  <option value="6">Mr.</option>
                                  <option value="7">Ms.</option>
                                </select></td>
                            </tr>
                            <tr>
                              <td bgcolor="#f8f8f8">Affiliation<span style="color:#E46C0A">*</span></td>
                              <td><input name="affiliation" type="text" id="affiliation" size="70" class="hbox"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#f8f8f8">E-mail<span style="color:#E46C0A">*</span></td>
                              <td><input name="email" type="text" id="email" size="50" class="hbox">
                                <!-- <a href="javascript:mail_chk();" class="button_icems2018">E-mail availability check</a> --></td>
                            </tr>
                            <tr>
                              <td bgcolor="#f8f8f8">Password<span style="color:#E46C0A">*</span></td>
                              <td><input name="password" type="password" id="password" size="30" class="hbox"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#f8f8f8">Confirm Password<span style="color:#E46C0A">*</span></td>
                              <td><input name="password_confirmation" type="password" id="password-confirm" size="30" class="hbox"></td>
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
                        <td align="center" style="padding-top:20px;"><input type=image src="{{URL::asset('image/btn/btn_next.gif')}}" class="img" hidefocus></td>
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
            <iframe style="width:0;height:0;" name="memchk" frameborder="0"></iframe></div>
          </td>
      </tr>
    </tbody>
  </table>
</div>  
@else
  <meta http-equiv="refresh" content="0; url=mypage">
@endif
@endsection