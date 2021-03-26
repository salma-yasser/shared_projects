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
                        <a href="scientific_committee" class="item left_on">Scientific Committee</a>
                        <a href="overview" class="item">Overview</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Scientific </span>Committee</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                      <table width="870" border="0" cellpadding="0" cellspacing="0">
                  <tr valign="top">
                    <td height="30" ><span class="committee">Head of Scientific Committee</span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Prof. Saad Eddin Aboul Enein</span><br />
                          Egypt</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="40" valign="top">&nbsp;</td>
                  </tr>
                  <tr valign="top">
                    <td height="30" ><span class="committee">Scientific Committee</span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Dr.-Ing. habil. Gerhard Krost</span><br />
                          Germany</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Magdy M.A. Salama</span><br />
                          Canada</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Alex. P.M.Van den Bossche</span><br />
                          Belgium</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Nabil H. Abbasy</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Sobhy M. Abdelkader</span><br />
                          Egypt</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Almoataz Y. Abdelaziz</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Dr.-Ing. Günter Meon</span><br />
                          Germany</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Dr.-Eng. Ahmed Ali Hassant</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Essam Eldin M. Rashad</span><br />
                          Egypt</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Ahmed A. Elsebaii</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Dr. Tamer Gado</span><br />
                          Egypt</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Metwally Abd El Azeem</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Aliaa Ramdan</span><br />
                          Egypt</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Ali El Shrbiny</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Hany ElShamy</span><br />
                          Egypt</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Ahmed R. Azmy</span><br />
                          Egypt</td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;padding-bottom: 10px;"><span class="name">Prof. Alaa A. Masoud</span><br />
                          Egypt</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px;"></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="50" valign="top">&nbsp;</td>
                  </tr>
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