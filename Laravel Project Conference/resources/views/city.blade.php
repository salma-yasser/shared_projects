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
                        <a href="city" class="item left_on">City</a>
                        <a href="transportation" class="item">Transportation</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">City</span></h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top"><center><img src="{{URL::asset('image/common/sharm11.jpg')}}" width="870" height="350"></center>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<strong><br>Sharm El-Sheikh 'City of Peace'</strong><br>
Sharm El-Sheikh is famous for its beautiful and pristine natural scenery located on the southern tip of the Sinai Peninsula, in South Sinai Governorate, Egypt. Sharm has been assigned as, "City of Peace", referring to the large number ofinternational peace conferences that have been held there, includes the smaller coastal towns of Dahab and Nuweiba as well as the mountainous interior, St. Catherine and Mount Sinai. It experiences a subtropical arid amazing climate in winter. It is one ofthe finest diving spots in the world and a trip into the desert is an unforgettable adventure. It's known for its sheltered sandy beaches, clear waters and coral reefs. Rocky Mountains are parted from the deep-blue sea by a flat desert strip. This combinationof desert and sea is an incredible sight and makes you believe you are on a different planet.
</p>
<br>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<strong>Climate</strong><br>
Typical temperatures range from 20 to 25 C in January-March.
</p>
<br>
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<strong>Orientation</strong><br>
Na'ama Bay part of the city is the center of nightlife and dining: most of Sharm's clubs, cafes, restaurants and shops are here. Sharm El-Sheikh has grown into three distinct areas now; Nabq is a new area to the North of Na'ama, Old Marketand Hadaba to the South of Na'ama Bay. Nabq Bay Nabq Bay is on a promontory overlooking the Straits of Tiran at the mouth of the Gulf of Aqaba. Sharm el-Sheikh city has been subdivided into five areas, namely Nabq Bay, Ras Nasrani, Na'ama Bay, Umm Sid, andSharm El Maya. Together with Hay el Nour, Hadaba, Rowaysat, Montazah and Shark's Bay, it forms a metropolitan area of 42 Km2. Ras Muhammad National Park is a major diving destination, with marine life around the Shark and Yolanda reefs and the Thistlegormwreck.
</p><br><center>
<table width="90%" align="left">
<tr>
<td><div style="margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/common/sharm2.png')}}" width="200" height="170" /></br>Bedouin Dinner & Star Gazing,</div></td>
<td><div style="margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/common/sharm3.png')}}" width="200" height="170" /></br>Scuba Diving, </div></td>
<td><div style="margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/common/sharm4.png')}}" width="200" height="170" /></br>Glass Boat, </div></td>
</tr>
<tr>
<td><div style="margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/common/sharm5.png')}}" width="200" height="170" /></br>Moses Mountain Overnight Trip,</div></td>
<td><div style="margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/common/sharm6.png')}}" width="200" height="170" /></br>Snorkel-Camel Safari, </div></td>
                    </tr>
</table></center>
 

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