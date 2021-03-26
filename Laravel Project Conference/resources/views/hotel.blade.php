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
                      Hotel & Tour
                    </div>
                    <div class="items">
                        <a href="hotel" class="item left_on">Hotel</a>
                        <a href="tour_half" class="item">Optional Tour</a>
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
                    <td>
                      <div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Hotel</span></h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top"><p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
With warm weather, bright sunshine and crystal clear waters all year
round, Sharm El Sheikh is a world renowned diving capital and tourist
magnet, where you can soak up the sun, lay down on the golden sandy
beaches, dive in the famous red sea with its amazing corals reefs, and
enjoy the sea any time you need a break from routine.<br/><br/>
<Strong>Sharm El Sheikh</Strong> boasts the widest array of fun activities, and exciting
crazy water sports facilities; including diving, snorkeling, sailing, wind
surfing, parasailing, etc...
</p>
</br>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<table width="95%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; text-align: center;"><span style="font-size: 24px; color: #666666"><strong>5 Stars</strong></span></td>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; text-align: center;"><span style="font-size: 24px; color: #666666"><strong>3 Stars</strong></span></td>
</tr>
<tr>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Hotel</strong></span><br>
        Maritim Jolie Ville Golf & Resort<br/>
        Um Marikha Bay, Sharm El Sheikh,<br/>
        South Sinai, Egypt</p></td>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Hotel</strong></span><br>
        Viva Sharm<br/>
        Hadabet Om El Seid St., Sharm El Sheikh,<br/>
        South Sinai, Egypt</p></td>
</tr>
<tr>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Location</strong></span><br>
        5 km from Sharm El Sheikh International Airport<br/>
        7 km from Naama Bay<br/>
        500 km from Cairo</p></td>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Location</strong></span><br>
        1 km from the Old market<br/>
        7 km from Naama Bay<br/>
        500 m from El Mercato</p></td>
</tr>
<tr>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Tel</strong></span><br>
        +2 069 360 3200</p></td>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Tel</strong></span><br>
        +2 069 366 1734</p></td>
</tr>
<tr>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Fax</strong></span><br>
        +2 069 360 3225</p>
        </td>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Mob</strong></span><br>
        +2 01141991117</p>
        </td>
</tr>
<tr>
        <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Website</strong></span><br>
      <a href="https://www.jolievillesharmresorts.com">www.jolievillesharmresorts.com</a></p></td>
      <td width="50%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;"><span style="font-size: 17px; color: #d16819"><strong>Website</strong></span><br>
      <a href="https://www.vivasharm-hotel.com">www.vivasharm-hotel.com</a></p></td>
</tr>
</tbody>
</table></p></td>
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