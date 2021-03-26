@extends('layouts.app')

@section('content')
<link href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css" />
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
                 <table width="870" border="0" cellpadding="0" cellspacing="0">
                    <!-- <tr>
                      <td height="35" valign="top">&nbsp;</td>
                    </tr> -->
                    <tr>
                      <td height="30" valign="top"><table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
                        <tr>
                          <td bgcolor="#FFFFFF" class="sub_title" style="color: #666;padding-bottom: 2px;font-size: 22px;">Conference Registration Fee</td>
                          <td bgcolor="#FFFFFF" style="padding-bottom: 15px"></td>
                        </tr>
                        <tr>
                          <td width="270" bgcolor="#EFEFEF" style="padding-left:20px;"><span class="table1_re"><strong>Category</strong></span></td>
                          <td width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>Registration Fee</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Egyptians</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">1200 EGP</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Non-Egyptians</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">600$</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;padding-left:20px;">50% Discount for <strong>students</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;"></td>
                        </tr>
                         <tr>
                          <td bgcolor="#FFFFFF" class="sub_title" style="color: #666; font-size: 22px; padding-bottom: 2px; padding-top: 15px;">Workshop Registration Fee</td>
                          <td bgcolor="#FFFFFF" style="padding-bottom: 15px"></td>
                        </tr>
                        <tr>
                          <td width="270" bgcolor="#EFEFEF" style="padding-left:20px;"><span class="table1_re"><strong>Category</strong></span></td>
                          <td width="300" bgcolor="#EFEFEF"><span class="table1_re"><strong>Registration Fee</strong></span></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Egyptians</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">100 EGP</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"><strong>Non-Egyptians</strong></td>
                          <td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd;">100$</td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="20" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="20" valign="top"><span style="color: #0071bc; font-weight: bold;"> * </span> Accommodation and transportation are not included; more details will be addressed in 2nd announcement</td>
                    </tr>
                    <tr>
                      <td height="20" valign="top">&nbsp;</td>
                    </tr>
                   @if (Auth::check())
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
                    @endif
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
 <script type="text/javascript">
  // $(document).ready(function(){ 
  //   alert(Auth::user()->id);

  //  });
  function calculate()
  {
    //get selected nationality
    var nationalityList = document.getElementsByName('nationality');
    var nationality;
    for (var i = 0; i < nationalityList.length; i++) {
    if (nationalityList[i].checked) {
        nationality = nationalityList[i].value;
        break;
    }
  }
  
  //calculate selected type
  var total = 0;
  var typeList = document.getElementsByName('type[]');
  for (var i = 0; i < typeList.length; i++) {
    if (typeList[i].checked) {
      if(typeList[i].value == 1 && nationality ==  ' EGP'){
        total = total + 1200;
      }else if(typeList[i].value == 1 && nationality ==  '$'){
        total = total + 600;
      }else{
        total = total + 100;
      }
    }
  }
  document.getElementById('total').value = total + '' +nationality;
}
</script>
@endsection
