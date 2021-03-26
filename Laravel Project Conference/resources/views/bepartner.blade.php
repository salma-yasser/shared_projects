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
                      Exhibitation&Partnership
                    </div>
                    <div class="items">
                        <a href="joinexhibition" class="item">Join the Exhibitation</a>
                        <a href="bepartner" class="item left_on">Be a Partner</a>
                        <a href="ourpartner" class="item">Our Partner</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Be</span> a Partner</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
                <td valign="top">

                 <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">Believing in the challenging effects of both energy and water sectors on the national security
                and in the light of politically leading vision to find out solutions for these challenges, Tanta
                University organizes The Fifth International Conference on Scientific Research entitled
                ”Renewable Energy and Water Sustainability” from 26-29 March 2019 in Sharm El-Sheikh,
                Egypt.<br/><br/>
                Thus, Postgraduate Studies and Research sector affiliated to Tanta University cordially invites
                you to participate in the aforementioned conference as a sponsor.<!-- <br/><br/>
                The following sponsorship programs are recommended to choose from --></p>
                </td>
              </tr>
               <!-- <tr>
                <td valign="top">
                  <table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
                        <tr>
                          <th style="border-top : 1px solid #dedcdd;">Category</th>
                          <th style="border-top : 1px solid #dedcdd;">The service offered</th>
                          <th style="border-top : 1px solid #dedcdd; padding : 6px 0px 6px 100px;">The cost</th> 
                      </tr>
                      <tr>
                        <td width="40" bgcolor="#FFFFFF" style="border-top : 1px solid #dedcdd; border-bottom : 1px solid #dedcdd; padding : 6px 100px 6px 0px;"><strong>Bronze</strong></td>
                        <td width="830" bgcolor="#FFFFFF" style="border-top : 1px solid #dedcdd;border-bottom : 1px solid #dedcdd;"><img src="{{URL::asset('new/images/bullet.png')}}"/> Banners <br/><img src="{{URL::asset('new/images/bullet.png')}}"/> Printouts<br/><img src="{{URL::asset('new/images/bullet.png')}}"/> Full accommodation for one person(3 nights)<br/><img src="{{URL::asset('new/images/bullet.png')}}"/> The firm logo on the printouts</td>
                        <td width="830" bgcolor="#FFFFFF" style="padding : 6px 0px 6px 100px; border-top : 1px solid #dedcdd;border-bottom : 1px solid #dedcdd;">20,000 EGP</td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 100px 6px 0px;"><strong>Silver</strong></td>
                        <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Banners+2m*3m booth+ the firm logo on the printouts+ full accommodation for one person (3 nights)</td>
                        <td width="830" bgcolor="#FFFFFF" style="padding : 6px 0px 6px 100px; border-top : 1px solid #dedcdd;border-bottom : 1px solid #dedcdd;">40,000 EGP</td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 100px 6px 0px;"><strong>Gold</strong></td>
                        <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Banners+2m*3m booth+ the firm logo on the printouts+ full accommodation for two persons(3 nights)+a medal of honor</td>
                        <td width="830" bgcolor="#FFFFFF" style="padding : 6px 0px 6px 100px; border-top : 1px solid #dedcdd;border-bottom : 1px solid #dedcdd;">50,000 EGP</td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 100px 6px 0px;"><strong>Diamond</strong></td>
                        <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Banners+2m*3m booth+ the firm logo on the printouts+ full accommodation for four persons(3 nights)+a medal of honor</td>
                        <td width="830" bgcolor="#FFFFFF" style="padding : 6px 0px 6px 100px; border-top : 1px solid #dedcdd;border-bottom : 1px solid #dedcdd;">100,000 EGP</td>
                      </tr>
                    </table></td>
                    </tr> -->
                     <tr>
                <td height="20">&nbsp;</td>
              </tr>
             <tr>
                <td valign="top">

 <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">kindly asked to fill the following form <a href="download/Partnership Form.pdf"><span style="color: #00f;">(Partnership Form) </span></a>and email it to: <a href="mailto:isr_finance@unv.tanta.edu.eg"><span style="color: #00f;">isr_finance@unv.tanta.edu.eg<span style="color: #00f;"></a></p>
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