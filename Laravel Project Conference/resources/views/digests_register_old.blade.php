@extends('layouts.app')

@section('content')
@if (Auth::guest())
<meta http-equiv="refresh" content="0; url=login">
@else
<!-- <link href="{{URL::asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css" />
<!-- <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" /> -->
<!-- <link href="{{URL::asset('css/eyesight.css')}}" rel="stylesheet" type="text/css"> -->
<!-- <link rel="stylesheet" href="{{URL::asset('css/swiper.min.css')}}"> -->
 <style>

/*#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-fadmily: Raleway;
  border: 1px solid #aaaaaa;
}*/

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.stepForm {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

.overlay {
    background-color:#EFEFEF;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 1000;
    top: 0px;
    left: 0px;
    opacity: .5; /* in FireFox */ 
    filter: alpha(opacity=50); /* in IE */
}
</style>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                        <a href="fullpaper" class="item">Full Paper Submission</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Digests</span> Submission</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <table width="850" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><form id="regForm" name="regForm" method="POST" action="{{ route('papers.store') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div style="padding-bottom:7px;">Please fill in the following fields exactly to register paper</div>
                        <div class="stepform"><center><span style="font-weight: bold;">Paper Information</span></center>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="subtable1_write" style="table-layout:fixed">
                          <tr>
                            <td width="150" bgcolor="#f8f8f8" class="first">Topic<span style="color:#E46C0A">*</span></td>
                            <td class="first"><select name="topic_id" class="topic_id" class="hbox">
                                <option value="">-- Select One --</option>
                                <option value="1">Technologies of renewable energy and energy storage</option>
                                <option value="2">New materials for energy applications</option>
                                <option value="3">Water management and crop composition</option> 
                                <option value="4">Water treatment and desalination</option>
                                <option value="5">Media; energy and water issues</option>
                                <option value="6">Environmental hazards and therapeutic uses</option>
                                <option value="7">Legal challenges and economic concepts</option>
                                <option value="8">Future trends in energy, water sustainability and climate</option>
                                <option value="9">Remote sensing techniques and GIS applications</option>
                              </select></td>
                          </tr>
                          <tr>
                            <td bgcolor="#f8f8f8" >Title<span style="color:#E46C0A">*</span></td>
                            <td ><input name="title" type="text" id="title" size="80" class="hbox"></td>
                          </tr>
                          <tr>
                            <td bgcolor="#f8f8f8">Abstract<span style="color:#E46C0A">*</span></td>
                            <td><textarea name="abstract" class="abstract" rows="3" cols="80" onchange="checkWordLen(this);"></textarea></td>
                          </tr>
                          <tr>
                            <td bgcolor="#f8f8f8">File<span style="color:#E46C0A">*</span></td>
                            <td><input id="file" name="file" class="hbox" type="file" <input type="file"
                                  accept=".pdf,.doc,.docx" data-preview-file-type="any" data-upload-url="#">File must be less than 5MB</br>Allowed file types: pdf, doc, docx</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f8f8f8">Authors Number<span style="color:#E46C0A">*</span></td>
                            <td><input name="authornumber" type="number" id="authornumber" min="1" max="10" size="10" class="hbox"></td>
                          </tr>
                      </table>
                      </div>
                      <div id="authors" class="stepform" style="display: none;"></div>
                      <div id="main_author" class="stepform" style="display: none;"></div>
                      <div style="overflow:auto;">
                        <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                      </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div id="steps" style="text-align:center;margin-top:40px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>
                     </form>
                    </td>
                    </tr>
                    <tr>
                      <td>
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li><span style="color:#E46C0A">{{ $error }}</span></li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    </td>
                    </tr>
                </table>
                </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <script>
                var uploadField = document.getElementById("file");
                uploadField.onchange = function() {
                    if(this.files[0].size > 5242880){
                       alert("File is too big!");
                       this.value = "";
                    };
                };
                var currentTab = 0; // Current tab is set to be the first tab (0)
                showTab(currentTab); // Display the crurrent tab

                function showTab(n) {
                  // This function will display the specified tab of the form...
                  var x = document.getElementsByClassName("stepform");
                  x[n].style.display = "block";
                  //... and fix the Previous/Next buttons:
                  if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                  } else {
                    document.getElementById("prevBtn").style.display = "inline";
                  }
                  if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                  } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                  }
                  //... and run a function that will display the correct step indicator:
                  fixStepIndicator(n)
                }

                function nextPrev(n) {
                  // Exit the function if any field in the current tab is invalid:
                  if (n == 1 && !validateForm()) return false;

                  if(currentTab == 0 && document.getElementById("authors").childElementCount != document.getElementById("authornumber").value){
                    
                    document.getElementById("authors").innerHTML = '';
                    var author_number = document.getElementById("authornumber").value;
                    var text = "";
                    var i;
                    for (i = 0; i < author_number; i++) {
                      text += "<div><center><span style='font-weight: bold;'>Author "+(i+1)+"</span></center> <table width='100%' border='0' cellspacing='0' cellpadding='0' id='subtable1_write' style='table-layout:fixed'> <tr> <td width='220' bgcolor='#f8f8f8' class='first'>First (Middle) Name<span style='color:#E46C0A'>*</span></td> <td class='first'><input name='fname"+i+"' type='text' class='fname' size='30' class='hbox'></td> </tr> <tr> <td bgcolor='#f8f8f8'>Last Name<span style='color:#E46C0A'>*</span></td> <td><input name='lname"+i+"' type='text' class='lname' size='30' class='hbox'></td> </tr> <tr> <td bgcolor='#f8f8f8'>Degree<span style='color:#E46C0A'>*</span></td> <td><select name='degree_id"+i+"' class='degree_id' class='hbox'> <option value=''>-- Select One --</option> <option value='1'>Professor</option> <option value='2'>Associate Professor</option> <option value='3'>Assistance Prof. (Lecturer)</option> <option value='4'>Doctor</option> <option value='5'>Research Student</option> <option value='6'>Mr.</option> <option value='7'>Ms.</option> </select></td> </tr> <tr> <td bgcolor='#f8f8f8'>Affiliation<span style='color:#E46C0A'>*</span></td> <td><input name='affiliation"+i+"' type='text' id='affiliation"+i+"' size='70' class='hbox'></td> </tr> <tr> <td bgcolor='#f8f8f8'>E-mail<span style='color:#E46C0A'>*</span></td> <td><input name='email"+i+"' type='text' class='email' size='50' class='hbox'> <!-- <a href='javascript:mail_chk();' class='button_icems2018'>E-mail availability check</a> --></td> </tr> </table></br></div>";
                  }
                     $("#authors").append(text);
                  }
                  if(currentTab == 1){
                    if(document.getElementById("main_author").hasChildNodes()){
                      document.getElementById("main_author").innerHTML = '';
                    }
                    var fname_List = document.getElementsByClassName("fname");
                    var lname_List = document.getElementsByClassName("lname");
                    var text = "<center><span style='font-weight: bold;'>Correspondence Author</span></center> <table width='100%' border='0' cellspacing='0' cellpadding='0' id='subtable1_write' style='table-layout:fixed'> <tr> <td width='250' bgcolor='#f8f8f8' class='first'>Correspondence Author<span style='color:#E46C0A'>*</span></td> <td class='first' > ";
                    var i;
                    for (i = 0; i < fname_List.length; i++) {
                      if(i==0){
                      text += "<input type='radio' name='mainauthor' value='"+fname_List[i].value +" "+lname_List[i].value +"' checked> "+fname_List[i].value  +" "+lname_List[i].value +"</br>";
                      }else{
                      text += "<input type='radio' name='mainauthor' value='"+fname_List[i].value +" "+lname_List[i].value +"'> "+fname_List[i].value  +" "+lname_List[i].value +"</br>";
                    }
                  }
                  text += "</td> </tr> </table>";
                  $("#main_author").append(text);
                  }
                  // This function will figure out which stepform to display
                  var x = document.getElementsByClassName("stepform");
                  // Hide the current tab:
                  x[currentTab].style.display = "none";
                  // Increase or decrease the current tab by 1:
                  currentTab = currentTab + n;
                  // if you have reached the end of the form...
                  if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    //  var i;
                    // for(i = 0;i<x.length;i++){
                    //   x[i].style.display = "block";
                    // }
                    disableScreen();
                    document.regForm.submit();
                   
                    return false;
                  }
                  // Otherwise, display the correct tab:
                  showTab(currentTab);
                }

                function validateForm() {
                  // This function deals with validation of the form fields
                  var x, y, i, valid = true;
                  x = document.getElementsByClassName("stepform");
                  y = x[currentTab].getElementsByTagName("input");
                  // A loop that checks every input field in the current tab:
                  for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                      // add an "invalid" class to the field:
                      y[i].className += " invalid";
                      // and set the current valid status to false
                      valid = false;
                    }
                  }
                  if (currentTab == 0 ){
                    if (x[0].getElementsByClassName("abstract")[0].value == ""){
                      alert("Please check the abstract") ;
                      valid = false;
                    }
                    if (x[0].getElementsByClassName("topic_id")[0].value == "")
                    {
                      alert("Please select the topic") ;
                      valid = false;
                    }
                    if (y.authornumber.value<=0 || y.authornumber.value>10)
                    {
                      alert("Authors number must be between (1 - 10)") ;
                      y.authornumber.className += " invalid";
                      valid = false;
                    }
                  }
                  if (currentTab == 1){
                    var degree_list = document.getElementsByClassName("degree_id");
                    var degree;
                    for (degree = 0; degree < degree_list.length; degree++) {
                      if(degree_list[degree].value == ""){
                        alert("Please select the degree") ;
                        degree_list[degree].focus();
                        valid = false;
                      } 
                    }
                    var email_list = document.getElementsByClassName("email");
                    var regMail = /^[.a-z A-Z 0-9\-_]+@[a-z A-Z 0-9\-]+(\.[a-z A-Z 0-9 \-]+)+$/;
                    var email;
                    var mail_registered = false;
                    for (email = 0; email < email_list.length; email++) {
                      if(!eval(regMail).test(email_list[email].value)){
                        alert("Please check the Author E-mail") ;
                        email_list[email].focus();
                        valid = false;
                      } else if(email_list[email].value == "{{ Auth::user()->email }}"){
                        mail_registered = true;
                      }
                    }
                    if(mail_registered == false){
                      alert("Please check that one of the authors' email was registered in the website") ;
                      valid = false;
                    }
                  }
                  // If the valid status is true, mark the step as finished and valid:
                  if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                  }
                  return valid;
                }

                function checkWordLen(obj){
                  var wordLen = 150; // Maximum word length
                  var len = obj.value.split(/[\s]+/);
                   if(len.length > wordLen){
                       alert("You cannot put more than "+wordLen+" words in abstract");
                       obj.oldValue = obj.value!=obj.oldValue?obj.value:obj.oldValue;
                       obj.value = obj.oldValue?obj.oldValue:"";
                       return false;
                   }
                 return true;
                }

                function fixStepIndicator(n) {
                  // This function removes the "active" class of all steps...
                  var i, x = document.getElementsByClassName("step");
                  for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                  }
                  //... and adds the "active" class on the current step:
                  x[n].className += " active";
                }

                function disableScreen() {
                    // creates <div class="overlay"></div> and 
                    // adds it to the DOM
                    var div= document.createElement("div");
                    div.className += "overlay";
                    document.body.appendChild(div);
                }
                </script>
                  
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
@endif
@endsection