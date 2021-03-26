@extends('layouts.app')

@section('content')
<style>
.tablink {
  background-color: #e0e1db;
  color: #666;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 5px;
  font-size: 17px;
  /*width: 30%;*/
  font-size: 17px;
}

.tablink:hover {
  background-color: #e2b746;
  color: white;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding-bottom: 10px;
  margin-right: 20px;
  height: 100%;
}
 /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
   /* z-index: 1;  Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
@if (Auth::guest())
<meta http-equiv="refresh" content="0; url=login">
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
                    @if(Auth::user()->usersboards->count() != 0)
                    <div class="items">
                        <a href="paper_committee" class="item">Papers of Scientific Committee</a>
                    </div>
                    @endif
                    <!-- @if(Auth::user()->id == 2)
                    <div class="items">
                        <a href="paper_confirmed" class="item left_on">Confirmed Paper</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;">
                        <span style="color: #0071bc;">Confirmed </span> Paper
                    </h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">

                       <script type="text/javascript">

                  function viewContents(i,j,k)
                  {
                    var f = document.sview;
                    var paper_count = <?php echo $papercount; ?>;
                    
                    if(k=='all') {
                      if(j=='on') {
                        for(var a=1;a<=paper_count+2;a++) {
                          // document.getElementById('symall').style.display = "none";
                          // document.getElementById('symall_on').style.display = "";
                          document.getElementById('sym'+a+'_fold').style.display = "";
                          document.getElementById('sym'+a+'_unfold').style.display = "none";
                          document.getElementById('sym'+a+'_accept').style.display = "";
                          document.getElementById('sym'+a+'_on').style.display = "";
                          document.getElementById('sym'+a+'_content').style.display = "";
                          document.getElementById('sym'+a+'_blank').style.height = "30px";
                        }
                      } else {
                        for(var a=1;a<=paper_count;a++) {
                          // document.getElementById('symall').style.display = "";
                          // document.getElementById('symall_on').style.display = "none";
                          document.getElementById('sym'+a+'_fold').style.display = "none";
                          document.getElementById('sym'+a+'_unfold').style.display = "";
                          document.getElementById('sym'+a+'_accept').style.display = "none";
                          document.getElementById('sym'+a+'_on').style.display = "none";
                          document.getElementById('sym'+a+'_content').style.display = "none";
                          document.getElementById('sym'+a+'_blank').style.height = "5px";
                        }
                      }
                      f.onchk.value=0;
                    } else {
                      if(j=='on') { // on
                        // document.getElementById('symall').style.display = "none";
                        // document.getElementById('symall_on').style.display = "";
                        document.getElementById('sym'+i+'_fold').style.display = "";
                        document.getElementById('sym'+i+'_unfold').style.display = "none";
                        document.getElementById('sym'+i+'_accept').style.display = "";
                        document.getElementById('sym'+i+'_on').style.display = "";
                        document.getElementById('sym'+i+'_content').style.display = "";
                        document.getElementById('sym'+i+'_blank').style.height = "30px";
                        f.onchk.value = parseFloat(f.onchk.value)+1;
                      } else { // out
                        document.getElementById('sym'+i+'_fold').style.display = "none";
                        document.getElementById('sym'+i+'_unfold').style.display = "";
                        document.getElementById('sym'+i+'_accept').style.display = "none";
                        document.getElementById('sym'+i+'_on').style.display = "none";
                        document.getElementById('sym'+i+'_content').style.display = "none";
                        document.getElementById('sym'+i+'_blank').style.height = "5px";
                        f.onchk.value = parseFloat(f.onchk.value)-1;
                        // if(f.onchk.value==0) {
                        //   document.getElementById('symall').style.display = "";
                        //   document.getElementById('symall_on').style.display = "none";          
                        // }
                      }
                    }
                  }

                  function openPage(pageName, elmnt) {
                      // Hide all elements with class="tabcontent" by default */
                      var i, tabcontent, tablinks;
                      tabcontent = document.getElementsByClassName("tabcontent");
                      for (i = 0; i < tabcontent.length; i++) {
                        if(document.getElementById(pageName) == tabcontent[i]){
                          if(tabcontent[i].style.display == "none"){
                            // Show the specific tab content
                            tabcontent[i].style.display = "block";
                            // Add the specific color to the button used to open the tab content
                            elmnt.style.backgroundColor = "#e2b746";
                            elmnt.style.color = "#FFFFFF";
                            elmnt.style.fontWeight = "bold";
                          }else{
                            // Hide the specific tab content
                            tabcontent[i].style.display = "none";
                            // Add the specific color to the button used to close the tab content
                            elmnt.style.backgroundColor = "";
                            elmnt.style.color = "#666";
                            elmnt.style.fontWeight = "unset";
                          }
                        }else{
                          tabcontent[i].style.display = "none";
                          // Remove the background color of all tablinks/buttons
                          tablinks = document.getElementsByClassName("tablink");
                          tablinks[i].style.backgroundColor = "";
                          tablinks[i].style.color = "#666";
                          tablinks[i].style.fontWeight = "unset";
                        }
                      }
                  }
                </script>
                <?php
                $topic_count = 1;
                $x = 1;
                foreach($topics as $topic){
                 echo '<button class="tablink" onclick="openPage(\'ks'.$topic_count.'\', this)"><strong>Papers of '.$topic->topic.'</strong></button></br></br>
                  <div id="ks'.$topic_count.'" class="tabcontent" style="display: none;">';
                 
                    if($topic->papers->count()){
                    echo '<form name="sview"><input type="hidden" name="onchk" value="0"></form>
                    <table width="830" border="0" cellpadding="5" cellspacing="0" style="
                      margin-left: 10px;">';
                      
                      foreach($topic->papers as $paper){
                      echo '<tr>
                        <td colspan="3"  bgcolor="#449972" style="padding:5pt 10pt"><div style="float:left"><span style="color: #fff">'.$paper->id.'</span><span class="symposium1"> - </span><span style="color: #fff">'.$paper->title.'</span></div>
                          <div style="float:right"><span id="sym'.$x.'_unfold"><img src="image/pr/icon_unfold.png" style="cursor:pointer" onclick="javascript:viewContents(\''.$x.'\',\'on\');" /></span><span id="sym'.$x.'_fold" style="display:none"><img src="image/pr/icon_fold.png" style="cursor:pointer" onclick="javascript:viewContents(\''.$x.'\',\'out\');" /></span></div></td>
                      </tr>
                      <tr id="sym'.$x.'_accept" style="display:none">
                        <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>Acceptance </strong></td>
                        <td bgcolor="#FFFFFF" style="padding:5pt 10pt"></td>';
                        if(Auth::user()->id ==5 || Auth::user()->id ==36){
                          echo '<td bgcolor="#FFFFFF" style="padding:5pt 10pt">'.($paper->confirmed ==1?'<span style="margin: auto 20px;">Paper confirmed</span>':($paper->accepted ==1?'<span style="margin: auto 20px;">Paper accepted</span><a href="paper_committee/c/1/'.$paper->id.'/'.Auth::user()->id.'" class="button_icems2018"> <span style="color: #ffffff; margin: auto 9px;">Confirm Acceptance</span> </a>':'<span style="margin: auto 20px;">In Progress</span>')).'</td>';
                        }else{
                          echo '<td bgcolor="#FFFFFF" style="padding:5pt 10pt">'.($paper->confirmed ==1?'<span style="margin: auto 20px;">Paper confirmed</span>':($paper->accepted ==1?'<span style="margin: auto 20px;">Paper accepted</span><a href="paper_committee/0/'.$paper->id.'/'.Auth::user()->id.'" > <span style="color: #0071bc;">Cancel Acceptance</span> </a>':'<a href="paper_committee/1/'.$paper->id.'/'.Auth::user()->id.'" class="button_icems2018"> <span style="color: #ffffff; margin: auto 9px;">Accept Paper</span> </a>')).'</td>';
                        }
                        echo '</tr>
                      <tr id="sym'.$x.'_on" style="display:none">
                        <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>Correspondence Author</strong></td>
                        <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>'.$paper->main_author.'</strong></td>
                        <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><a href="upload/'.$paper->file.'" class="button_icems2018" download="'.$paper->title .".". substr(strrchr($paper->file, "."), 1).'"> <span style="color: #ffffff">Download Paper</span> </a></td>
                      </tr>
                      <tr id="sym'.$x.'_content" style="display:none">
                        <td colspan="3" bgcolor="#f5f5f5" style="padding:10pt 10pt"><span style="font-weight:bold;">Abstract: </span>'.$paper->abstract.'</br></br>
                        <span class="sub_title">Authors</span>
                        <table border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">';
                          
                          $i = 0;
                          foreach($paper->authors as $author){
                          if ($i % 2 == 0){
                            echo '<tr>';
                          }
                            echo '<td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;">
                              <center><strong>' . $author->fname .' '. $author->lname . '</strong> </br>'
                              .$author->email .'</br>'
                              .$author->degree->degree .'</br>'
                              .$author->affiliation .'</br></center>
                            </td>';
                          
                          if ($i % 2 != 0){
                            echo '</tr>';
                          }
                          $i = $i + 1;
                          }
                          if ($i % 2 != 0){
                            echo '<td bgcolor="#FFFFFF" style="border-bottom : 1px solid #dedcdd; padding-left:20px;"></td></tr>';
                          } 
                           
                        echo '</table>';
						   echo '</br>';
                        // if($paper->accepted !=0){
               
                          echo '<span class="sub_title">Comments</span>
                        <table id="comment_table'.$paper->id.'" border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">';
                          if($paper->paperscomments->count()){
                              foreach($paper->paperscomments as $comment){
                                 echo '<tr><td width="15%" style="padding:5pt;"><center><strong style="font-size:12pt;">'.$comment->user->fname.' '.$comment->user->lname.' </strong></center></td>
                                <td width="70%"  bgcolor="#FFFFFF" style="padding:5pt 10pt; border-bottom: 3px solid #f5f5f5;">'.$comment->comment.'</td><td width="10%" bgcolor="#FFFFFF" style="padding-right:10pt;border-bottom: 3px solid #f5f5f5;"><span style="color: #00a99d; font-size:11pt;"><center>'.$comment->updated_at.'</center></span> </td></tr>';
                              }
                          }
                          if($paper->confirmed !=1){
                          if(Auth::user()->id !=5 && Auth::user()->id !=36){
                          echo '<tr id="new_comment'.$paper->id.'"><td width="15%" style="padding:5pt;"><center><strong style="color: #0071bc; font-size:12pt;">Comment </strong></center></td>
                                      <td width="70%" bgcolor="#FFFFFF" style="padding:5pt 10pt"><textarea id="comment'.$paper->id.'" cols="80"></textarea></td> <td width="10%"bgcolor="#FFFFFF" style="padding-right:10pt"><a onclick="sendComment('.$paper->id.')" class="button_icems2018"> <span style="color: #ffffff">Save</span> </a></td></tr>';
                          }
                        }
                            echo '</table>';
                        // }
                        echo '</td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#FFFFFF" id="sym'.$x.'_blank" height="5px"></td>
                      </tr>';
                      $x = $x +1;
                      }
                    echo '</table>';
                     }else{
                        echo '<center><h3><br/><br/><span style="font-weight: bold; color: #00a99d">No paper was submitted</span></h3></center>';
                     }
                 echo '</div>';
                 $topic_count = $topic_count + 1;
               }
               ?>
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
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">
                    <div class="form-group">
                        <label id="message" class="control-label">Are you sure?</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-accept" onclick="javascript:acceptPaper()" value="0">Accept</button>
            </div>
  </div>
</div>
<script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  function confirm(url, index, message){
      document.getElementById('message').innerHTML ='Are you sure you will accept the paper of '+message+'?';
      document.getElementById('btn-accept').value = url;
      modal.style.display = "block";
  }

  function acceptPaper(){
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", document.getElementById('btn-accept').value, true); // false for synchronous request
    xmlHttp.send();

    xmlHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById('comment'+paperid).innerHTML = this.responseText;
            modal.style.display = "none";
        }
    };

    // xmlhttp.open("GET", document.getElementById('btn-accept').value, true);
    // xmlhttp.send();
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>
@endif
@endsection