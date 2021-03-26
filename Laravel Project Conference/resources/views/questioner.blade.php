@extends('layouts.app')

@section('content')
@if (Auth::guest())
<meta http-equiv="refresh" content="0; url={{ route('login') . '?previous=' . Request::fullUrl() }}">
@else
<!-- <link href="{{URL::asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css" />
<!-- <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" /> -->
<!-- <link href="{{URL::asset('css/eyesight.css')}}" rel="stylesheet" type="text/css"> -->
<!-- <link rel="stylesheet" href="{{URL::asset('css/swiper.min.css')}}"> -->
<div id="content">
  @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
  @endif
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
                      Membership
                    </div>
                     <div class="items">
                        <a href="mypage" class="item">My Page</a>
                    </div>
                    @if(Auth::user()->papers->count() != 0)
                    <div class="items">
                        <a href="questioner" class="item left_on">Important Questioner</a>
                    </div>
                    @endif
                    @if(Auth::user()->usersboards->count() != 0)
                    <div class="items">
                        <a href="paper_committee" class="item">Papers of Scientific Committee</a>
                    </div>
                    @endif
                    <!-- @if(Auth::user()->id == 2)
                    <div class="items">
                        <a href="paper_confirmed" class="item">Confirmed Paper</a>
                    </div>
                    @endif -->
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Important </span>Questioner</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <table width="830" border="0" cellpadding="5" cellspacing="0" style="
                  margin-left: 2px;">
                  <tr><td colspan="3" bgcolor="#f5f5f5" style="padding:10pt 10pt">
                    <form id="questionerForm" name="questionerForm" method="POST" action="save_questioner" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table id="questioner_table" border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">
                          <tr>
                            <td style="padding: 5px;" >
                             <input type="checkbox" style="margin-top: -2px;" id="attend_personally"name="attend_personally"/> <span style="font-weight: bold;">I will attend the conference personally</span>
                             <div id="personally" style="display: none;">
                               <table id="questioner_table" border="0" cellspacing="0" cellpadding="8" width="90%" bgcolor="#d9d9d9">
                                 <tr>
                                  <td style="padding: 5px;" bgcolor="#FFFFFF" >
                                   <input type="checkbox" style="margin-top: -2px;" id="personal_companion" name="personal_companion"/> I will have companion personal
                                   <div id="personal_companion_many" style="margin: 7px 20px; display: none;">How many:<input type='number' style='margin-top: -2px; margin-left: 20px; padding-left: 5px;' name='personal_companion_many' min="1" value="1" /> 
                                   </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding: 5px;" bgcolor="#FFFFFF" >
                                   <input type="checkbox" style="margin-top: -2px;" id="personal_transportation" name="personal_transportation"/> I will use transportation offered by conference (initial cost around 300 EL per person)
                                    <div id="personal_transportation_many" style="margin: 7px 20px;display: none;">Your departure location:
                                      <input type='radio' style='margin-top: -2px; margin-left: 60px;' value='1' name='transportation_where0' checked/> Tanta
                                      <input type='radio' style='margin-top: -2px; margin-left: 60px;' value='2' name='transportation_where0'/> Alexandria
                                      <input type='radio' style='margin-top: -2px; margin-left: 60px;' value='3' name='transportation_where0'/> Cairo
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding: 5px;" bgcolor="#FFFFFF" >
                                    <span style="font-weight: bold;">The full Name as will appear in attendance certificate</span><br/>
                                   <input type="text" style="margin-top: -2px; margin-left: 30px;" id="personal_fullname" name="personal_fullname" size="35" />  default registered name
                                  </td>
                                </tr>
                               </table>
                             </div>
                            </td>
                          </tr>
                           <tr>
                            <td style="padding: 5px;" >
                             <input type="checkbox" style="margin-top: -2px;" id="attend_coauthors" name="attend_coauthors"/> <span style="font-weight: bold;">Other coauthors will register to the conference</span>
                             <div id="coauthors_many" style="margin: 7px 20px; display: none;">How many <input type="number" style="margin-left: 5px; padding-left: 5px;" value="1" min="1" name="coauthors_many" onchange="coauthors_many_function()" />
                             </div>
                             <div id="coauthors_details" style="margin: 7px 20px; display: none;">
                             </div>
                            </td>
                            <tr>
                              <td style="padding: 5px; float: right;" >
                                <a onclick="form_check()" class="button_icems2018"> <span style="color: #ffffff; margin: auto 9px;">Save</span> </a>
                              </td>
                            </tr>
                          </tr>
                        </table></form>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" bgcolor="#FFFFFF" id="sym'.$x.'_blank" height="5px"></td>
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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
  function form_check()
  {
    var f = document.questionerForm;
    if(document.getElementById('attend_coauthors').checked){
      var coauthors_many = document.getElementById('coauthors_many').children[0].value;
      var i;
      for (i = 1; i <= coauthors_many; i++) {
        if (document.getElementById('coauthors_fullname_'+i).value==null ||document.getElementById('coauthors_fullname_'+i).value=='')
        {
          alert("Please check the full name of Author "+i) ;
          $('#coauthors_fullname_'+i).focus() ;
          return false;
        }
      }
    }
    f.submit();
  }
  function attend_companion(self, num){
    if (self.checked) 
      $('#coauthors_companion_many_'+num).fadeIn('slow');
    else 
      $('#coauthors_companion_many_'+num).fadeOut('slow');
  }

  function coauthors_transportation(self, num){
    if (self.checked) 
      $('#coauthors_transportation_many_'+num).fadeIn('slow');
    else 
      $('#coauthors_transportation_many_'+num).fadeOut('slow');
  }

  function coauthors_many_function(){
    var coauthors_many = document.getElementById('coauthors_many').children[0].value;
    var child_nodes = document.getElementById('coauthors_details').childElementCount;
    var added = coauthors_many - child_nodes;
    var text = "";
    var i;
    for (i = 1; i <= added; i++) {
      text += "<div id='coauthors_"+(child_nodes+i)+"'><table id='questioner_table' border='0' cellspacing='0' cellpadding='8' width='90%' bgcolor='#d9d9d9'><tr><td style='padding: 5px; border-bottom: 1px solid #d9d9d9' bgcolor='#FFFFFF' ><span style='font-weight: bold;'>Author "+(child_nodes+i)+"</span></td></tr><tr><td style='padding: 5px;' bgcolor='#FFFFFF' ><input type='checkbox' style='margin-top: -2px;'  id='coauthors_companion_"+(child_nodes+i)+"' name='coauthors_companion_"+(child_nodes+i)+"' onchange='attend_companion(this,"+(child_nodes+i)+")' /> Will have companion <div id='coauthors_companion_many_"+(child_nodes+i)+"' style='margin: 7px 20px; display: none;'>How many:<input type='number' style='margin-top: -2px; margin-left: 20px; padding-left: 5px;' name='coauthors_companion_many_"+(child_nodes+i)+"' min='1' value='1' /> </div></td></tr><tr><td style='padding: 5px;' bgcolor='#FFFFFF' ><input type='checkbox' style='margin-top: -2px;' id='coauthors_transportation_"+(child_nodes+i)+"' name='coauthors_transportation_"+(child_nodes+i)+"' onchange='coauthors_transportation(this,"+(child_nodes+i)+")'/> Will use transportation offered by conference (initial cost around 300 EL per person)<div id='coauthors_transportation_many_"+(child_nodes+i)+"' style='margin: 7px 20px;display: none;'>Departure location:<input type='radio' style='margin-top: -2px; margin-left: 60px;' value='1' name='transportation_where"+(child_nodes+i)+"' checked/> Tanta<input type='radio' style='margin-top: -2px; margin-left: 60px;' value='2' name='transportation_where"+(child_nodes+i)+"'/> Alexandria<input type='radio' style='margin-top: -2px; margin-left: 60px;' value='3' name='transportation_where"+(child_nodes+i)+"'/> Cairo</div></td></tr><tr><td style='padding: 5px;' bgcolor='#FFFFFF' ><span style='font-weight: bold;'>The full Name as will appear in attendance certificate</span><span style='color:#E46C0A'>*</span><br/><input type='text' style='margin-top: -2px; margin-left: 30px;' id='coauthors_fullname_"+(child_nodes+i)+"' name='coauthors_fullname_"+(child_nodes+i)+"' size='35' />  </td></tr></table></div>";
    }
    $("#coauthors_details").append(text);
    if(added < 0){
      var select = document.getElementById('coauthors_details');
      var j;
      for (j = added; j < 0; j++) {
        select.removeChild(select.lastChild);
      }
    }
  }

  $(document).ready(function () {
    $('#attend_personally').change(function () {
        if (this.checked) 
           $('#personally').fadeIn('slow');
        else 
            $('#personally').fadeOut('slow');
    });
    $('#personal_companion').change(function () {
        if (this.checked){ 
            $('#personal_companion_many').fadeIn('slow');
         }
        else{
            $('#personal_companion_many').fadeOut('slow');
          }
    });
    $('#personal_transportation').change(function () {
        if (this.checked){ 
            $('#personal_transportation_many').fadeIn('slow');
         }
        else{
            $('#personal_transportation_many').fadeOut('slow');
          }
    });

    $('#attend_coauthors').change(function () {
        if (this.checked){ 
          $("#coauthors_details").append("<div id='coauthors_1'><table id='questioner_table' border='0' cellspacing='0' cellpadding='8' width='90%' bgcolor='#d9d9d9'><tr><td style='padding: 5px; border-bottom: 1px solid #d9d9d9' bgcolor='#FFFFFF' ><span style='font-weight: bold;'>Author 1</span></td></tr><tr><td style='padding: 5px;' bgcolor='#FFFFFF' ><input type='checkbox' style='margin-top: -2px;' id='coauthors_companion_1' name='coauthors_companion_1' onchange='attend_companion(this,1)' /> Will have companion <div id='coauthors_companion_many_1' style='margin: 7px 20px; display: none;'>How many:<input type='number' style='margin-top: -2px; margin-left: 20px; padding-left: 5px;' name='coauthors_companion_many_1' min='1' value='1' /> </div></td></tr><tr><td style='padding: 5px;' bgcolor='#FFFFFF' ><input type='checkbox' style='margin-top: -2px;' id='coauthors_transportation_1' name='coauthors_transportation_1' onchange='coauthors_transportation(this,1)'/> Will use transportation offered by conference (initial cost around 300 EL per person)<div id='coauthors_transportation_many_1' style='margin: 7px 20px;display: none;'>Departure location:<input type='radio' style='margin-top: -2px; margin-left: 60px;' value='1' name='transportation_where1' checked/> Tanta<input type='radio' style='margin-top: -2px; margin-left: 60px;' value='2' name='transportation_where1'/> Alexandria<input type='radio' style='margin-top: -2px; margin-left: 60px;' value='3' name='transportation_where1'/> Cairo</div></td></tr><tr><td style='padding: 5px;' bgcolor='#FFFFFF' ><span style='font-weight: bold;'>The full Name as will appear in attendance certificate</span><span style='color:#E46C0A'>*</span><br/><input type='text' style='margin-top: -2px; margin-left: 30px;' id='coauthors_fullname_1' name='coauthors_fullname_1' size='35' />  </td></tr></table></div>");
          $('#coauthors_many').fadeIn('slow');
          $('#coauthors_details').fadeIn('slow');
         }
        else{ 
          $('#coauthors_many').fadeOut('slow');
          $('#coauthors_details').fadeOut('slow');
          document.getElementById('coauthors_details').innerHTML = '';  
        }
    });
});
</script>
@endif
@endsection