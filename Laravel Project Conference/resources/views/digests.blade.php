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
                      Submission
                    </div>
                    <div class="items">
                        <a href="digests" class="item left_on">Digests Submission</a>
                        <a href="digests_guide" class="item">Guidelines</a>
                        <a href="mypage" class="item">Full Paper Submission</a>
                        <a href="presentation" class="item">Presentation Guidelines</a>
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
          </table>
         
          </td>
        <td valign="top" style="padding-bottom:20px;">
   <!-- <table width="900" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><img src="image/common/coming.gif" width="870" height="450"></td>
  </tr>
  <tr>
    <td valign="top"><p><br>
      </p></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
</table> -->
          <script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<body>

<table width="870" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Digests</span> Submission</h1></div></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#fff">
          <div class="digests-box">

            <span class="textbox1">Digests Submission Deadline <font color="red">December 15, 2018</font></span>
            <br>
            
            <div id="digests">
              <div id="main_links">
                <div class='wrapper'>
                  <ul>
                    <li>
                      <a href='download/Digests_Submission_Template_ISR_19.doc'>
                        <i class='fa fa-desktop'></i>
                        <div>Digest Template</div>
                      </a>
                    </li>
                   
                    <!-- <li>
                      <a href='digests_register'>
                        <i class='fa fa-hand-o-right'></i>
                        <div>Go To Submit </div>
                      </a>
                    </li> -->
                  </ul>
                  <span class="shadowHolderflat"><img src="{{URL::asset('new/images/big-shadow4.png')}}" alt=""></span>
                </div>

                </div>
              </div>

            </div>

        </td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td height="30" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" valign="top"><span class="sub_title">Steps for Abstract Submission</span></td>
  </tr>
  <tr>
    <td height="30" valign="top"><strong>Step 1:</strong> Sign up and log in.</br>
                                 <strong>Step 2:</strong> Download the digest template and prepare digest file.</br>
                                 <strong>Step 3:</strong> Click [Go To Submit] button in this page.</br>
                                 <strong>Step 4:</strong> Select the topic, fill out digest title and abstract, upload digest file, fill out number of authors and their informations and finally select the correspondence author.</br>
                                 <strong>Step 5:</strong> After submission, you wil redirect to your page to check your digests.</br>
    </td>
  </tr>
  <tr>
    <td height="30" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="35" valign="top"><span class="sub_title">Conference Topics</span></td>
  </tr>
  <tr>
    <td height="30" valign="top"><table width="870" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
          <tr>
            <td width="40" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>01</strong></td>
            <td width="830" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Technologies of renewable energy and energy storage.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>02</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">New materials for energy applications.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>03</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Water management and crop composition.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>04</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Water treatment and desalination.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>05</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Media; energy and water issues.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>06</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Environmental hazards and therapeutic uses.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>07</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Legal challenges and economic concepts.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>08</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Future trends in energy, water sustainability and climate.</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding : 6px 30px;"><strong>09</strong></td>
            <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">Remote sensing techniques and GIS applications.</td>
          </tr>
        </table></td>
      </tr>

    </table></td>
  </tr>
  <tr>
    <td height="40" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" valign="top"><span class="sub_title">Notification of Acceptance</span></td>
  </tr>
  <tr>
    <td height="30" valign="top">All submitted abtracts will be reviewed by  the Technical Program Committee according to reviewing procedures. Notification  of acceptance will be sent by e-mail to corresponding, presenting and abstract  submitting authors. If you have not received the  notification, please send the email to the secretariat (<a href="mailto:isr-19@unv.tanta.edu.eg">isr-19@unv.tanta.edu.eg</a>) with your abstract information.</td>
  </tr>
  <tr>
    <td height="30" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" valign="top"><span class="sub_title">Withdrawal of a Abstract</span></td>
  </tr>
  <tr>
    <td height="30" valign="top">If you must withdraw a abstract, please  notify  the secretariat (<a href="mailto:isr-19@unv.tanta.edu.eg">isr-19@unv.tanta.edu.eg</a>) in writing as soon as possible.<strong> </strong></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
</table>
</div></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection