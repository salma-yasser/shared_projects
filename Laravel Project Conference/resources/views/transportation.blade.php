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
                        <a href="transportation" class="item left_on">Transportation</a>
                        <a href="visa" class="item">Visa</a>
                        <a href="essentials" class="item">Traveler's Essentials</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Transportation</span></h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
<p aling="center"><img src="{{URL::asset('image/common/sharmm.jpg')}}" width="870" height="350"></p>
 <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;"><strong>Get in Sharm:</strong></p>

 <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

See Sinai for information on the Sinai visit pass, which allows visa-free travel for up to 14 days. For travel outside the Sinai you will need to get a Visa at the airport.
</br></br> 
<strong>By Plane:</strong> </br>
 Sharm el-Sheikh Airport (IATA: SSH) (ICAO: HESH) is the largest in the Sinai and receives planeloads of charter tourists daily in the winter high season. Domestic flights from Cairo are offered by Egypt Air. For departures: timetable shows only nearest 1-2hours, makes you watch over the row of check-in desks for your flight number.
 </br></br> 
<strong>By Boat:</strong>
  </br>

International Fast Ferries run fast boats to Hurghada on the mainland Red Sea Coast, currently running four times weekly. The ride takes 1.5 hours and costs EBP250 one-way, EGP450 return for foreigners. Warning: this ride is notoriously bumpy and prone to cancellations.
  </br></br> 
<strong>By Road:</strong> </br>
 Sharm el-Sheikh can be reached by driving down the eastern coast from Taba via Nuweiba and Dahab, or via the western coast from Cairo. There are daily buses for both routes. From Cairo, East Delta buses take approximately 8h (EGP80) while Superjet buses take6 hrs. When taking the bus from Cairo, keep your bus ticket and passport handy, as you will pass through a number of checkpoints, which require passengers to present identification and ticket. The drive is interesting with beautiful scenery, throughout theroute.
 </br></br>
<strong>By Bus and micro-bus:</strong>
 </br>
The bus station is about 1km from the Peace road. If you should arrive during the evening hours your only option may be to take a taxi, as micro-bus service can be spotty. Since Sharm is a tourist-driven economy, you should be prepared to do some bargaining.If you are of the hiking type, the main road is, roughly, twenty minutes from main road. Just ask anyone to point you in the direction of Peace road. Once at Peace road you should have no problem hailing down a micro-bus. When heading to the bus station viamicro-bus, you must indicate that you are going to the bus station, and want to be left off at the gas station. Once at the gas station, you should see micro-buses, which will take you on the final leg. Remember, transfers are not issued; you will need topay another fee for the final leg. About micro-bus fees, if your journey is within a kilometer or two, the cost should be about (LE 6 to 10 LE). If your stop is further out, or if you are traveling during the late night hours, be prepared to get a demand formore money, in some cases drivers may demand up to (LE 10 or LE 20).
 
</p>

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