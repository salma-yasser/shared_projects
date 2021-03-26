@extends('layouts.app')

@section('content')
<div id="content">
  <table width="1200" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="300" valign="top"><table width="240" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td height="40" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td height="65" valign="top"><img src="{{URL::asset('image/news/left_top.gif')}}"></td>
              </tr>
              <tr>
                <td height="35" style="padding-left:20px; border-bottom : 1px solid #dedcdd;"><a href="right_logoutnews_list" class="left_on">News & Notice</a></td>
              </tr>
            </tbody>
          </table>
          <table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="50"><img src="{{URL::asset('image/common/left_keydate3.jpg')}}" vspace="20" /></td>
            </tr>
          </table>
          <table width="245" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="125" height="180" valign="top">@if (Auth::guest())<a href="signup" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('leftquick1','','image/common/right_signup_over.gif',1)"><img src="{{URL::asset('image/common/right_signup.gif')}}" name="leftquick1" border="0" id="leftquick1" /></a>@else<a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('leftquick1','','image/common/right_logout_over.gif',1)"><img src="{{URL::asset('image/common/right_logout.gif')}}" name="leftquick1" border="0" id="leftquick1" /></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>@endif</td>
              <td valign="top"><a href="mypage" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('leftquick2','','image/common/right_login_over.gif',1)"><img src="{{URL::asset('image/common/right_login.gif')}}" name="leftquick2"  border="0" id="leftquick2" /></a></td>
            </tr>
          </table>
          </td>
        <td valign="top" style="padding-bottom:20px;"><div style="text-align:left;padding-bottom:20px;"><div><img src="{{URL::asset('image/news/title_news.gif')}}" vspace="30"></div>

 <table width="900" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><img src="{{URL::asset('image/common/coming.gif')}}" width="870" height="450"></td>
  </tr>
  <tr>
    <td valign="top"><p><br>
      </p></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
</table>

</div></td>
      </tr>
    </tbody>
  </table>
</div> 
@endsection
