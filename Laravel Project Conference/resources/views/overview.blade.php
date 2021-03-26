@extends('layouts.app')

@section('content')
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
                      Conference Information
                    </div>
                    <div class="items">
                        <a href="welcome" class="item">Welcome Message</a>
                        <a href="committee" class="item">Committee</a>
                        <a href="scientific_committee" class="item">Scientific Committee</a>
                        <a href="overview" class="item left_on">Overview</a>
                        <a href="topic" class="item">Conference Topics</a>
                        <a href="venue" class="item">Venue</a>
                        <a href="sponser" class="item">Sponsers</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;">Overview</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
We cordially invite you to the 5th International Scientific Research Conference on Renewable Energy and Water Sustainability to be held in Sharm El-Sheikh (Egypt) from the26th to 29th of March, 2019. The Scientific Research ISR-2019 Committee will organize various scientific programs as well as social programs so all of our participants will be able to enjoy our fascinating culture and warm spirit of friendship.We hope you will join us at the ISR-2019 proceedings and have a meaningful time with all the global experts. 
</p>
</br>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<table width="95%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview1.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Title</strong></span><br>
        The 5th International Scientific Research Conference on Renewable Energy and Water Sustainability</p></td>
      </tr>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview2.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Date</strong></span><br>
        March 26-29, 2019</p></td>
      </tr>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview3.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Venue</strong></span><br>
        Sharm El-Sheikh, Egypt</p></td>
      </tr>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview4.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Organized by</strong></span><br>
        Tanta University</p>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Sponsored by</strong></span><br>
Ministry of Higher Education and Scientific Research, Ministry of Water Resources and Irrigation, Ministry of Electricity and Renewable Energy, Ministry of Environment, Ministry of Planning, Follow-Up and Reform Administrative, Ministryof Petroleum.
</p>
</td>
      </tr>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview5.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Program</strong></span><br>
        Welcome Reception, Plenary, Invited, Oral, Poster Presentations, Banquet</p></td>
      </tr>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview1.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Website</strong></span><br>
      http://isr.tanta.edu.eg</p></td>
      </tr>
<tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/overview7.gif" width="40" height="40"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Official Language</strong></span><br>
     English </p></td>
      </tr>

</tbody>
</table></p>
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
@endsection