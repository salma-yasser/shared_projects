@extends('layouts.app')

@section('content')
@if (Auth::guest())
<meta http-equiv="refresh" content="0; url=login">
@else
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
                      Submission
                    </div>
                    <div class="items">
                        <a href="digests" class="item">Digests Submission</a>
                        <a href="digests_guide" class="item left_on">Guidelines</a>
                        <a href="fullpaper" class="item">Full Paper Submission</a>
                        <a href="presentation" class="item">Presentation Guidelines</a>
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
          </table>
         
          </td>
          <td valign="top" style="padding-bottom:20px;">
            <table width="870" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Notification</span> Mail</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td align="center" bgcolor="#fff">
                  <div class="digests-box">

                    <span class="textbox1">Send Notification</span>
                    <br>
                    
                    <div id="digests">
                      <div id="main_links">
                        <div class='wrapper' style="width: 25%;">
                          <ul>
                            <li>
                              <a href='notification_mail/send'>
                                <i class='fa fa-cloud-download'></i>
                                <div>Send</div>
                              </a>
                            </li>
                          </ul>
                          <span class="shadowHolderflat"><img src="{{URL::asset('new/images/big-shadow4.png')}}" alt=""></span>
                        </div>

                        </div>
                      </div>
                    </div>
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
@endif
@endsection