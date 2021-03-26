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
                      Program
                    </div>
                    <div class="items">
                        <a href="program" class="item">Program</a>
                        <a href="keynote" class="item">Keynote Speakers</a>
                        <a href="workshop" class="item">Workshops</a>
                        <a href="special" class="item">Special Sessions</a>
                        <a href="social" class="item left_on">Social Programs</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h2 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Social</span> Programs</h2></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

The organizing committee shall be organizing a number of Post Conference Tours and Activities. This in addition to the welcome reception that will be an excellentchance to get together with colleagues and make new friends while enjoying some delicious foods and refreshing drinks. Come and join this entertaining icebreaker to expand professional networks and form partnerships.

  

The banquet will be a great opportunity to meet and network with colleagues in pleasant surroundings. Enjoy the climax of Scientific Research ISR-2019 with anexcellent dinner.

  </p></br>
<h2 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Remark</span></h2></br>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
Participationfee: Free of charge for Scientific Research ISR-2019 attendees </br>
Please,come to the designated meeting point 10 minutes prior to the scheduled time.</br>
Post-conferencetour reservation is available through the Scientific Research ISR-2019 on-line registration system.</br>
On-siteconference tour reservation needs to be made one day prior to the scheduled tour at the registration desk.</br>

</p>

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