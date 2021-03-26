@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/util.css">
<div id="content">
  <div class="swiper-container" style="overflow:hidden">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="{{URL::asset('image/common/main_img1.jpg')}}"></div>
      <div class="swiper-slide"><img src="{{URL::asset('image/common/main_img2.jpg')}}"></div>
      <div class="swiper-slide"><img src="{{URL::asset('image/common/main_img3.jpg')}}"></div>
    </div>
  </div>
  <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 80,
        effect: 'fade',
        loop: true,
        autoplay: 4000,
        autoplayDisableOnInteraction: false
    });
  </script>
  <table border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td><a href="digests" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('banner1','','image/common/main_banner1_over.gif',1)"><img src="{{URL::asset('image/common/main_banner1.gif')}}" name="banner1" border="0"></a></td>
        <td><a href="special" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('banner2','','image/common/main_banner2_over.gif',1)"><img src="{{URL::asset('image/common/main_banner2.gif')}}" name="banner2" border="0"></a></td>
        <td><a href="registration" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('banner3','','image/common/main_banner3_over.gif',1)"><img src="{{URL::asset('image/common/main_banner3.gif')}}" name="banner3" border="0"></a></td>
        <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('banner4','','image/common/main_banner4_over.gif',1)"><img src="{{URL::asset('image/common/main_banner4.gif')}}" name="banner4" border="0" onclick="MM_openBrWindow('download_center','down','width=500,height=450')"></a></td>
                <td><a href="signup" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('banner5','','image/common/main_banner5_over.gif',1)"><img src="{{URL::asset('image/common/main_banner5.gif')}}" name="banner5" border="0"></a></td>
        <td><a href="mypage" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('banner6','','image/common/main_banner6_over.gif',1)"><img src="{{URL::asset('image/common/main_banner6.gif')}}" name="banner6" border="0"></a></td>
              </tr>
    </tbody>
  </table>
  <table width="1200" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" colspan="3" valign="top">&nbsp;</td>
    </tr>
    <tr>
  
<td width="380" align="center" valign="top">
  <div class="size1 overlay1">
    <!--  -->
    <div class="size1 flex-col-c-m p-l-15 p-r-15 p-b-50">
      <p class="m2-txt1 txt-center">
          5<sup>th</sup> International Conference on Scientific Research ISR-2019<br>
          RENEWABLE ENERGY & WATER SUSTAINABILITY<br>
          Sharm El Sheikh-Egypt
      </p>
    </div>
  </div>
</td>
    </tr>
    <tr><td width="380" align="center" valign="top"><table width="870" border="0" cellpadding="0" cellspacing="0">
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
Director, Remote Sensing Research Lab., Wilmington-USA</td>
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
</table></td></tr>
    <tr>
      <td height="40" colspan="3" valign="top">&nbsp;</td>
    </tr>
  </table>
</div>
@endsection