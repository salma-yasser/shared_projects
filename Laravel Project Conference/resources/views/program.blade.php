@extends('layouts.app')

@section('content')
<style>
.tablink {
  background-color: #e0e1db;
  color: #666;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 16px;
  font-size: 17px;
  width: 23%;
  text-align: center;
  font-size: 20px;
  margin-left: 5px;
  margin-bottom: 5px;
  text-decoration: none;
}

.tablink:hover {
  background-color: #00a99d;
  color: white;
  text-decoration: none;
}
</style>
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
                      Program
                    </div>
                    <div class="items">
                        <a href="program" class="item left_on">Program</a>
                        <a href="keynote" class="item">Keynote Speakers</a>
                        <a href="workshop" class="item">Workshops</a>
                        <a href="special" class="item">Special Sessions</a>
                        <a href="social" class="item">Social Programs</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Program</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
                <td valign="top">
                  <a class="tablink" href='download/ISR-Program.pdf'>
                    <div>Download ISR Program</div>
                    <i class='fa fa-cloud-download'></i>
                  </a>
                  <a class="tablink" href='download/ISR-Schedule.pdf'>
                    <div>Download ISR Schedule</div>
                    <i class='fa fa-cloud-download'></i>
                  </a>
                </td>
              </tr>
             <tr>
                <td valign="top"><img src="{{URL::asset('image/common/program-g.png')}}" width="870" height="350"></td>
              </tr>
              <tr>
                <td valign="top"><img src="{{URL::asset('image/common/program-g-2.png')}}" width="435" height="350"></td>
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
@endsection