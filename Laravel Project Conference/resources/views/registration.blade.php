@extends('layouts.app')

@section('content')
<style>
.tablink {
  background-color: #e0e1db;
  color: #666;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 16px;
  font-size: 17px;
  width: 10%;
  font-size: 20px;
}

.tablink:hover {
  background-color: #00a99d;
  color: white;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding-top: 75px;
  padding-bottom: 75px;
  margin-right: 20px;
  height: 100%;
}

#defaultOpen {
  margin-right: 20px;
}
</style>
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
                      Registration
                    </div>
                    <div class="items">
                        <a href="registration" class="item left_on">Registration</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Registration</span> Fee</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <button class="tablink" onclick="openPage('president', this)" id="defaultOpen">English</button>
                  <button class="tablink" onclick="openPage('vice', this)">عربي</button>

                  <div id="president" class="tabcontent">
                   <table width="870" border="0" cellpadding="0" cellspacing="0">
                    <!-- <tr>
                      <td height="35" valign="top">&nbsp;</td>
                    </tr> -->
                    <tr>
                      <td height="30" valign="top"><table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
                        <tr>
                          <td bgcolor="#FFFFFF" class="sub_title" style="color: #666;padding-bottom: 2px;font-size: 22px;">Conference Registration Fee</td>
                          <td colspan="2"bgcolor="#FFFFFF" style="padding-bottom: 15px"></td>
                        </tr>
                        <tr>
                          <td width="270" bgcolor="#EFEFEF" style="padding-left:20px;"><span class="table1_re"><strong>Category</strong></span></td>
                          <td colspan="2"width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>Registration Fee</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Egyptians</strong></td>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1200 EGP</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Non-Egyptians</strong></td>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">600$</td>
                        </tr>
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-left:20px;">50% Discount for <strong>students</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;"></td>
                        </tr>
                         <tr>
                          <td bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">Workshop Registration Fee</td>
                          <td colspan="2"bgcolor="#FFFFFF" style="padding-bottom: 15px"></td>
                        </tr>
                        <tr>
                          <td width="270" bgcolor="#EFEFEF" style="padding-left:20px;"><span class="table1_re"><strong>Category</strong></span></td>
                          <td colspan="2" width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>Registration Fee</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Egyptians</strong></td>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">100 EGP</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Non-Egyptians</strong></td>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">100$</td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-top: 20px; padding-bottom: 15px;"><span class="table1_re"><strong>Conference subscription fees are paid through the account numbers:</strong></span></br>
                            <strong>Central Bank of Egypt – Cairo, 54 Gomhoria Street, Cairo-Egypt</strong></br>
                            <strong>Egyptian pound account:</strong> 9/450/87851/1 </br>
                            <strong>Dollar account:</strong> 4/082/17524/7</br>
                            <strong>Swift code:</strong> CBEGEGCXXXX</td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">Accomodation Costs for Egyptians (double room single use for 3 nights)</td>
                        </tr>
                        <tr>
                          <td width="270" bgcolor="#EFEFEF" style="padding-left:20px;"><span class="table1_re"><strong>Category</strong></span></td>
                          <td width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>5 Stars</strong></span></td>
                          <td width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>3 Stars</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Participant</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1700 EGP</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1000 EGP</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Student</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1700 EGP</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1000 EGP</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Companion</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">2300 EGP</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1000 EGP</td>
                        </tr>
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-left:20px;"><STRONG>Cost of single room</STRONG> in 5 stars hotel for Egyptians (Per Person for 3 nights) :
                          3500 EGP</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;"></td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">Accomodation Costs for non-Egyptians (Per Person for 3 nights)</td>
                        </tr>
                        <tr>
                          <td width="270" bgcolor="#EFEFEF" style="padding-left:20px;"><span class="table1_re"><strong>Room</strong></span></td>
                          <td colspan="2" width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>Cost</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Single</strong></td>
                          <td colspan="2" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">250$</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Double</strong></td>
                          <td colspan="2" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">170$</td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" style="padding-top: 20px; padding-bottom: 15px;"><span class="table1_re"><strong>For Payment of the accommodation, Kindly use the following account
                          numbers:</strong></span></br>
                            <strong>CIB bank-ElHadaba Sharm branch, Happy Rose Tours</strong></br>
                            <strong>Egyptian pound account:</strong> 100027760095 </br>
                            <strong>Dollar account:</strong> 100027760087</br>
                            <strong>Swift code:</strong> CIBEEGCX131</td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="20" valign="top">&nbsp;</td>
                    </tr>
                   
                  <!--  @if (Auth::check())
                    <tr>
                      <td height="40">
                        <span class="sub_title"> Register to...</span>
                        <table width="900" border="0" cellspacing="0" cellpadding="0">
                          <form name="fee" method="POST" action="{{action('RegistrationFeeController@update')}}">
                             {{ csrf_field() }}
                            <tr>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="subtable1_write">
                                  <tr>
                                    <td width="22%" bgcolor="#f8f8f8" class="first"> Nationality<span style="color: red;">*</span></td>
                                    <td width="39%" class="first"> 
                                      <input type="radio" name="nationality" value=" EGP" <?php echo Auth::user()->is_egyptian==1?'checked':''; ?> onclick="javascript:calculate()"> Egyptian<br>
                                    </td>
                                    <td width="39%" class="first"> 
                                      <input type="radio" name="nationality" value="$" <?php echo Auth::user()->is_egyptian==0?'checked':''; ?> onclick="javascript:calculate()"> Non-Egyptian<br>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#f8f8f8">Regitration Type<span style="color: red;">*</span></td>
                                    <?php 
                                    $workshopList = [];
                                    $workshops = Auth::user()->usersworkshops()->get();
                                    foreach($workshops as $workshop){
                                      $workshopList[] = $workshop->workshop;
                                    }
                                    ?>
                                    <td colspan="2"><input type="checkbox" name="type[]" <?php echo in_array(1, $workshopList)?'checked':''; ?> value="1" onclick="javascript:calculate()">  Conference<br>
                                      <input type="checkbox" name="type[]" <?php echo in_array(2, $workshopList)?'checked':''; ?> value="2" onclick="javascript:calculate()">  Remote Sensing and GIS Sciences Workshop<br>
                                      <input type="checkbox" name="type[]" <?php echo in_array(3, $workshopList)?'checked':''; ?> value="3" onclick="javascript:calculate()">  Design of On-Grid Solar Power Stations Workshop<br>
                                      <input type="checkbox" name="type[]" <?php echo in_array(4, $workshopList)?'checked':''; ?> value="4" onclick="javascript:calculate()">  Conservation of Irrigation Water for
                                        Sustainable Development Workshop<br>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#f8f8f8"><span style="font-weight: bold;">Total Fee</span></td>
                                    <td>
                                      <?php echo '<input name="total" type="text" class="hbox" id="total" size="40" readonly value="'.(Auth::user()->registration_fee!=0?Auth::user()->registration_fee:'0 EGP').'" style="border: white;">'; ?>
                                    </td>
                                    <td><input type="submit" style="color: white; width: 150px;" class="button_icems2018" value="Register" hidefocus>
                                    </td>
                                  </tr>
                              </table></td>
                            </tr>
                          </form>
                        </table>
                      </td>
                    </tr>
                    @endif -->
                   <!--  <tr>
                      <td height="20" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="40">
                        <span class="sub_title"> Payment</span>
                        Payments are to be made cash at the
                        conference site or bank transfer through:
                        <table width="900" border="0" cellspacing="0" cellpadding="0">
                         <tr><td></td></tr>
                        </table>
                      </td>
                    </tr> -->
                  </table>
                  </div>

                  <div id="vice" class="tabcontent">
                     <table width="870" border="0" cellpadding="0" cellspacing="0" style="text-align: right">
                    <!-- <tr>
                      <td height="35" valign="top">&nbsp;</td>
                    </tr> -->
                    <tr>
                      <td height="30" valign="top"><table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="padding-bottom: 15px"></td>
                          <td bgcolor="#FFFFFF" class="sub_title" style="color: #666;padding-bottom: 2px;font-size: 22px;">رسوم التسجيل في المؤتمر</td>
                        </tr>
                        <tr>
                          <td colspan="2"width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>رسوم التسجيل</strong></span></td>
                          <td width="270" bgcolor="#EFEFEF" style="padding-right:20px;"><span class="table1_re"><strong>الجنسيه</strong></span></td>
                        </tr>
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1200 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>المصريين</strong></td>
                        </tr>
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">600 دولار</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>غير المصريين</strong></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;"></td>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-right:20px;">خصم 50% <strong>للطلاب</strong></td>
                        </tr>
                         <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="padding-bottom: 15px"></td>
                          <td bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">رسوم تسجيل ورش العمل</td>
                        </tr>
                        <tr>
                          <td colspan="2" width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>روم التسجيل</strong></span></td>
                          <td width="270" bgcolor="#EFEFEF" style="padding-right:20px;"><span class="table1_re"><strong>الجنسية</strong></span></td>
                        </tr>
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">100 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>المصريين</strong></td>
                        </tr>
                        <tr>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">100 دولار</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>غير المصريين</strong></td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-top: 20px; padding-bottom: 15px;"><span class="table1_re"><strong>:يتم سداد قيمة إشتراك المؤتمر على الحساب رقم</strong></span></br>
                            <strong>البنك المركزي المصري، 54 شارع الجمهورية، القاهرة – جمهورية مصر العربية</strong></br>
                            <strong>بالجنيه المصري حساب رقم: </strong> <span>9/450/87851/1 </span></br>
                            <strong>بالدولار حساب رقم: </strong> 4/082/17524/7</br>
                            <strong  style="float: right;">:سويفت كود</strong> CBEGEGCXXXX</td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">إجمالي تكلفة الإقامه للمصريين  -غرفة مزدوجة 3 ليالي للفرد</td>
                        </tr>
                        <tr>
                          <td width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>3 نجوم</strong></span></td>
                           <td width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>5 نجوم</strong></span></td>
                          <td width="270" bgcolor="#EFEFEF" style="padding-right:20px;"><span class="table1_re"><strong>الفندق</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1000 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1700 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>مشارك</strong></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1000 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1700 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>طالب</strong></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1000 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">2300 جنيهاً</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>مرافق</strong></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;"></td>
                          <td colspan="2"bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-right:20px;"><STRONG>إجمالي تكلفة الإقامه للمصريين غرفه منفرده في فندق 5 نجوم - 3 ليالي للفرد :
                          3500 جنيهاً</STRONG></td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">إجمالي تكلفة الإقامه لغير المصريين - 3 ليالي للفرد</td>
                        </tr>
                        <tr>
                          <td colspan="2" width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>التكلفة</strong></span></td>
                          <td width="270" bgcolor="#EFEFEF" style="padding-right:20px;"><span class="table1_re"><strong>الغرفه</strong></span></td>
                        </tr>
                        <tr>
                          <td colspan="2" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">250 دولار</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>غرفة منفرده</strong></td>
                        </tr>
                        <tr>
                          <td colspan="2" bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">170 دولار</td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-right:20px;"><strong>غرفة مزدوجة</strong></td>
                        </tr>
                        <tr>
                          <td colspan="3"bgcolor="#FFFFFF" style="padding-top: 20px; padding-bottom: 15px;"><span class="table1_re"><strong>:تسدد تكلفة الإقامه على حساب رقم</strong></span></br>
                            <strong>بنك CIB - فرع الهضبة شرم - شركة هابي روز تاورز</strong></br>
                            <strong>بالجنيه المصري حساب رقم:</strong> 100027760095 </br>
                            <strong>بالدولار حساب رقم:</strong> 100027760087</br>
                            <strong  style="float: right;">:سويفت كود </strong> CIBEEGCX131</td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="20" valign="top">&nbsp;</td>
                    </tr>
                   <!-- @if (Auth::check())
                    <tr>
                      <td height="40">
                        <span class="sub_title"> Register to...</span>
                        <table width="900" border="0" cellspacing="0" cellpadding="0">
                          <form name="fee" method="POST" action="{{action('RegistrationFeeController@update')}}">
                             {{ csrf_field() }}
                            <tr>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="subtable1_write">
                                  <tr>
                                    <td width="22%" bgcolor="#f8f8f8" class="first"> Nationality<span style="color: red;">*</span></td>
                                    <td width="39%" class="first"> 
                                      <input type="radio" name="nationality" value=" EGP" <?php echo Auth::user()->is_egyptian==1?'checked':''; ?> onclick="javascript:calculate()"> Egyptian<br>
                                    </td>
                                    <td width="39%" class="first"> 
                                      <input type="radio" name="nationality" value="$" <?php echo Auth::user()->is_egyptian==0?'checked':''; ?> onclick="javascript:calculate()"> Non-Egyptian<br>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#f8f8f8">Regitration Type<span style="color: red;">*</span></td>
                                    <?php 
                                    $workshopList = [];
                                    $workshops = Auth::user()->usersworkshops()->get();
                                    foreach($workshops as $workshop){
                                      $workshopList[] = $workshop->workshop;
                                    }
                                    ?>
                                    <td colspan="2"><input type="checkbox" name="type[]" <?php echo in_array(1, $workshopList)?'checked':''; ?> value="1" onclick="javascript:calculate()">  Conference<br>
                                      <input type="checkbox" name="type[]" <?php echo in_array(2, $workshopList)?'checked':''; ?> value="2" onclick="javascript:calculate()">  Remote Sensing and GIS Sciences Workshop<br>
                                      <input type="checkbox" name="type[]" <?php echo in_array(3, $workshopList)?'checked':''; ?> value="3" onclick="javascript:calculate()">  Design of On-Grid Solar Power Stations Workshop<br>
                                      <input type="checkbox" name="type[]" <?php echo in_array(4, $workshopList)?'checked':''; ?> value="4" onclick="javascript:calculate()">  Conservation of Irrigation Water for
                                        Sustainable Development Workshop<br>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#f8f8f8"><span style="font-weight: bold;">Total Fee</span></td>
                                    <td>
                                      <?php echo '<input name="total" type="text" class="hbox" id="total" size="40" readonly value="'.(Auth::user()->registration_fee!=0?Auth::user()->registration_fee:'0 EGP').'" style="border: white;">'; ?>
                                    </td>
                                    <td><input type="submit" style="color: white; width: 150px;" class="button_icems2018" value="Register" hidefocus>
                                    </td>
                                  </tr>
                              </table></td>
                            </tr>
                          </form>
                        </table>
                      </td>
                    </tr>
                    @endif -->
                   <!--  <tr>
                      <td height="20" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="40">
                        <span class="sub_title"> Payment</span>
                        Payments are to be made cash at the
                        conference site or bank transfer through:
                        <table width="900" border="0" cellspacing="0" cellpadding="0">
                         <tr><td></td></tr>
                        </table>
                      </td>
                    </tr> -->
                  </table>
                  </div>
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
<script>
function openPage(pageName, elmnt) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks[i].style.color = "#666";
        tablinks[i].style.fontWeight = "unset";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = "#00a99d";
    elmnt.style.color = "#FFFFFF";
    elmnt.style.fontWeight = "bold";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection