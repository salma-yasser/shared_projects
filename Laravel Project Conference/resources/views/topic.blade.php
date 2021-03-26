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
                        <a href="overview" class="item">Overview</a>
                        <a href="topic" class="item left_on">Conference Topics</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Conference</span> Topics</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <table width="870" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top"><table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
                            <tr>
                              <td width="40" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>01</strong></td>
                              <td width="830" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Technologies of renewable energy and energy storage</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>02</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">New materials for energy applications</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>03</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Water management and crop composition</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>04</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Water treatment and desalination</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>05</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Media; energy and water issues</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>06</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Environmental hazards and therapeutic uses</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>07</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Legal challenges and economic concepts</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>08</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Future trends in energy, water sustainability and climate</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>09</strong></td>
                              <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Remote sensing techniques and GIS applications</td>
                            </tr>
                          </table></td>
                    </tr>
                    <tr>
                      <td valign="top"><p><br>
                        </td>
                    </tr>
                    <tr>
                      <td height="40">&nbsp;</td>
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