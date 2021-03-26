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
                        <a href="visa" class="item left_on">Visa</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Visa</span></h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top"> <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

Visitors to Sharm El-Sheikh from most countries are welcomed and traveling to Sharm el Sheikh, Dahab, Nuweiba and Taba resorts for up to 15 days receive a free entry permission stampupon arrival. If you intend to travel out of these areas or stay longer than 15 days, you must get a visa. Tourist visas granted using the e-visa system are valid for a maximum of 3 months. Although it's still possible to get a tourist visa on arrival, it'sbetter to get one before you travel. Because Sharm as well as some other tourist resorts such as Taba and Dahab are on the Sinai Peninsula, a Visa is required in order to: 
</br></br>
a) Travel out of Sinai - to Cairo, Luxor, The Ras Mohammed trip by boat, quad (taking in the blue lagoon & BBQ lunch), car or bus. 
</br></br>
 b) to leave the immediate beach area and go further out to sea. The latter means that if you want to go to some dive sites - you will need a visa. 
</br></br>
One can buy a single entry visa on arrival in Sinai or Egypt. It's valid for 30 days. One can obtain multi-entry visas from his country's consulate, prior to travel. They are validfor 6m & allow a maximum single stay of 90 days. Get Your Visa Online from - www.visa2egypt.gov.eg
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