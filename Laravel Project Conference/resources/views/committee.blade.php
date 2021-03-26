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
                        <a href="committee" class="item left_on">Committee</a>
                        <a href="scientific_committee" class="item">Scientific Committee</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;">Committee</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                 <table width="870" border="0" cellpadding="0" cellspacing="0">
                  <tr valign="top">
                    <td height="30" ><span class="committee">Under the Patronage of</span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Prof. Khaled A. Abd Elghafar</span><br />
                          Minister of Higher Education and Research</td>
                        <td bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Dr. Mohamed Abdelaty</span><br />
                          Minister of Water Resources and Irrigation </td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Dr. Mohamed Shaker</span><br />
                          Minister of Electricity and Renewable Energy</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Dr. Yasmin S. Fouad</span><br />
                          Minister of Environment</td>
                        </tr>
                        <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Dr. Hala El Saeed</span><br />
                          Minister of Planning and Follow-Up and Reform Administrative</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Eng. Tarek El Mulla</span><br />
                          Minister of Petroleum</td>
                        </tr>
                        <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Ambassador/ Nabila Makram</span><br />
                          Minister of Immigration and Egyptian Expatriates Affairs</td>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Dr. Yasmine Fouad</span><br />
                          Minister of Environment</td>
                        </tr>
                        <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Prof. Magdi A. Sabaa</span><br />
                          President of Tanta University</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="40" valign="top">&nbsp;</td>
                  </tr>
                  <tr valign="top">
                    <td height="30" ><span class="committee">Conference Chair</span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Prof. Mostafa M. El-Sheikh</span><br />
                Vice President of Tanta University for Post-Graduate Studies and Research</td>
                        <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="40" valign="top">&nbsp;</td>
                  </tr>
                  <tr valign="top">
                    <td height="30" ><span class="committee">Conference Coordinator</span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td width="50%" bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name"> Prof. Tarek A. Fayed</td>
                        <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="40" valign="top">&nbsp;</td>
                  </tr>
                  <tr valign="top">
                    <td height="30" ><span class="committee">External Conference Coordinator
                </span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td bgcolor="#ffffff" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name">Prof. Eman M. Ghoneim</span><br />
                Director, Remote Sensing Research Lab., University of North Carolina Wilmington-USA</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="40" valign="top">&nbsp;</td>
                  </tr>
                  <tr valign="top">
                    <td height="30" ><span class="committee">Conference Secretary</span></td>
                  </tr>
                  <tr valign="top">
                    <td height="30"><table width="100%" border="0" cellpadding="0" cellspacing="15">
                      <tr>
                        <td width="50%" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name"> Prof. El-Refaie S. Kenawy</td>
                        <td width="50%" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name"> Dr. Mohamed K. El-Nemr</td>
                      </tr>
                      <tr>
                        <td width="50%" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name"> Dr. Mohamed R. Berber</td>
                        <td width="50%" style="padding:0px 15px; border-left : 2px solid #dedcdd;"><span class="name"> Dr. Diaa-Eldin A. Mansour</td>
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