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
                      Travel Information
                    </div>
                    <div class="items">
                        <a href="city" class="item">City</a>
                        <a href="transportation" class="item">Transportation</a>
                        <a href="visa" class="item">Visa</a>
                        <a href="essentials" class="item left_on">Traveler's Essentials</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Traveler's</span> Essentials</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">

<p><table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr><td><p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 19px; color:#d16819"><strong>Currency</strong></span></td></tr>
        <td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/cu.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">
       Major foreign currencies that can be exchanged at banks, hotels, and the airport include the US Dollar, Japanese Yen, Euro, and UK Sterling. For major currencies& their rates in the NATIONAL BANK OF EGYPT (NBE), press the next more button
 Most hotels, restaurants, and shops accept major international credit cards including Visa, American Express, Diners Club, Master Card, and JCB.
<br>USD 1 = EGP 17.8732 as of July 22, 2018</p></td>
      </tr></tbody>
</table></p><br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>ATM (Automated Teller Machines)</strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/atm.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">
     Travelers who carry internationally recognized credit cards can get cash from Automated Teller Machines (ATMs) installed at airports, major hotels, departmentstores and tourist attractions. ATMs are in operation 24 hours a day. Most large stores, hotels and restaurants in Sharm accept major international credit cards. However it is advisable to carry some cash, since many smaller establishments and stores are unlikelyto accept credit cards. Bank Misr ATM machines map can be located<br> using the more link</p></td>
   </tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>Time</strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/time.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">
    Egypt'local time is 2 hours ahead of GMT with no daylight savings time.
2018/07/22 Mon </p></td></tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>Weather </strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/Weather.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">
    2018/07/22<br>
21.2 C </p></td></tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>Phone in Sharm </strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/phone.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">
    You may use roaming from your mobile while in Sharm. Take a spare handset if poss, buy an Egyptian sim to put in that. (Will cost about 20LE, there are about 8.5LE). If you don't have a spare handset you can buy one out there at a reasonable price. Send texts from the Egyptian one & ask your friends to reply on your home number. That's the cheapest way. Generally speaking - calls to the UK, for example, onan Egyptian Sim card cost 4 LE a minute (About 40p) and texts to the UK about 50 Piastres a minute (About 5p) When you have your sim card you will need to buy credit (on top of the 20LE cost of the sim) & denominations are 5,10,20,25,50,100 or 200LE. </p></td></tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>International Call </strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/call.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">
International dialing code to Sharm, Egypt is +20-069 (Telephon Number). Please omit (0) before 69 when dialing from overseas.
  </p></td></tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>Tip & Tax </strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/tip.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">Tip Tipping is not a regular practicein Egypt, specially in highly-ranked places. Service charges are included in your bill for rooms, meals and other services at hotels and upscale restaurants. Egyptians occasionally do tip when they are especially pleased with the service they receive. 
  </p></td></tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>Business Hours </strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/bu.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">Government office hours are usually from 09:00 am to 06:00 pm on weekdays and closed on weekends. Banks are open from 8:00 am to 2:00 pm on weekdays and closedon Friday and Saturday. Major stores are open every day from 10:30 am to 11:00 pm including Sundays.
  </p></td></tr>
</tbody>
</table>
<br>
<p style="font-family: calibri; font-size: 19px; color: #666; line-height: 23px;"><span style="font-size: 18px; color:#d16819"><strong>Electricity </strong></span>
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<td width="9%" align="center" valign="top" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><img src="image/ci/el.png" valign="top" width="60" height="60"></td>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;">The standard electricity supply is 220 volts AC/60 cycles. Most hotels may provide outlet converters for 110 and 220 volts. Participants are recommended to checkwith the hotel beforehand.
  </p></td></tr>
</tbody>
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
@endsection