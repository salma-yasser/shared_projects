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
                        <a href="mypage" class="item left_on">My Page</a>
                    </div>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">My Paper</span></h1></div></div></td>
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
                    var paper_count = <?php echo $papers->count(); ?>;
                    
                    if(k=='all') {
                      if(j=='on') {
                        for(var a=1;a<=paper_count+2;a++) {
                          document.getElementById('symall').style.display = "none";
                          document.getElementById('symall_on').style.display = "";
                          document.getElementById('sym'+a+'_fold').style.display = "";
                          document.getElementById('sym'+a+'_unfold').style.display = "none";
                          document.getElementById('sym'+a+'_topic').style.display = "";
                          document.getElementById('sym'+a+'_on').style.display = "";
                          document.getElementById('sym'+a+'_content').style.display = "";
                          document.getElementById('sym'+a+'_blank').style.height = "30px";
                        }
                      } else {
                        for(var a=1;a<=paper_count;a++) {
                          document.getElementById('symall').style.display = "";
                          document.getElementById('symall_on').style.display = "none";
                          document.getElementById('sym'+a+'_fold').style.display = "none";
                          document.getElementById('sym'+a+'_unfold').style.display = "";
                          document.getElementById('sym'+a+'_topic').style.display = "none";
                          document.getElementById('sym'+a+'_on').style.display = "none";
                          document.getElementById('sym'+a+'_content').style.display = "none";
                          document.getElementById('sym'+a+'_blank').style.height = "5px";
                        }
                      }
                      f.onchk.value=0;
                    } else {
                      if(j=='on') { // on
                        document.getElementById('symall').style.display = "none";
                        document.getElementById('symall_on').style.display = "";
                        document.getElementById('sym'+i+'_fold').style.display = "";
                        document.getElementById('sym'+i+'_unfold').style.display = "none";
                        document.getElementById('sym'+i+'_topic').style.display = "";
                        document.getElementById('sym'+i+'_on').style.display = "";
                        document.getElementById('sym'+i+'_content').style.display = "";
                        document.getElementById('sym'+i+'_blank').style.height = "30px";
                        f.onchk.value = parseFloat(f.onchk.value)+1;
                      } else { // out
                        document.getElementById('sym'+i+'_fold').style.display = "none";
                        document.getElementById('sym'+i+'_unfold').style.display = "";
                        document.getElementById('sym'+i+'_topic').style.display = "none";
                        document.getElementById('sym'+i+'_on').style.display = "none";
                        document.getElementById('sym'+i+'_content').style.display = "none";
                        document.getElementById('sym'+i+'_blank').style.height = "5px";
                        f.onchk.value = parseFloat(f.onchk.value)-1;
                        if(f.onchk.value==0) {
                          document.getElementById('symall').style.display = "";
                          document.getElementById('symall_on').style.display = "none";          
                        }
                      }
                    }
                  }
                function checkFile(file){
                    if(file.files[0].size > 10485760){
                       alert("File is too big!");
                       file.value = "";
                    };
                }
                </script>
                @if($papers->count())
                <form name="sview"><input type="hidden" name="onchk" value="0"></form>
                <table width="870" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                     <td height="60" valign="top"><div style="position:absolute;" id="symall"><img src="image/pr/btn_program_view.gif" style="cursor:pointer" onclick="javascript:viewContents('','on','all')"></div><div style="position:absolute;display:none;" id="symall_on"><img src="image/pr/btn_program_fold.gif" style="cursor:pointer" onclick="javascript:viewContents('','out','all')"></div></td>
                  </tr>
                </table>
                <table width="830" border="0" cellpadding="5" cellspacing="0" style="
                  margin-left: 2px;">
                  <?php
                  $x = 1;
                  foreach($papers as $paper){
                  echo '<tr>
                    <td colspan="3"  bgcolor="#449972" style="padding:5pt 10pt"><div style="float:left"><span class="symposium1">Title: </span><span style="color: #fff">'.$paper->title.'</span></div>
                      <div style="float:right"><span id="sym'.$x.'_unfold"><img src="image/pr/icon_unfold.png" style="cursor:pointer" onclick="javascript:viewContents(\''.$x.'\',\'on\');" /></span><span id="sym'.$x.'_fold" style="display:none"><img src="image/pr/icon_fold.png" style="cursor:pointer" onclick="javascript:viewContents(\''.$x.'\',\'out\');" /></span></div></td>
                  </tr>
                  <tr id="sym'.$x.'_topic" style="display:none">
                    <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>Topic </strong></td>
                    <td colspan="2" bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>'.$paper->topic->topic.'</strong></td>
                  </tr>
                  <tr id="sym'.$x.'_on" style="display:none">
                    <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>Correspondence Author</strong></td>
                    <td bgcolor="#FFFFFF" style="padding:5pt 10pt"><strong>'.$paper->main_author.'</strong></td>
                    <td bgcolor="#FFFFFF" style="padding:5pt 10pt;"><a href="upload/'.$paper->file.'" class="button_icems2018" style="padding-left: 25px;padding-right: 25px;margin-right: 5px;right:0;" download="'.$paper->title .".". substr(strrchr($paper->file, "."), 1).'"> <span style="color: #ffffff">Download Digest</span> </a>';
                  if($paper->confirmed == 1 && $paper->fullpaper != null){
                    echo '<a href="uploadfull/'.$paper->fullpaper.'" class="button_icems2018" style="right:0;" download="'.$paper->title .".". substr(strrchr($paper->fullpaper, "."), 1).'"> <span style="color: #ffffff">Download Full Paper</span> </a>';
                  }
                    echo '</td>
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
                          <center><strong>' . $author->fname . $author->lname . '</strong> </br>'
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
                       
                    echo '</table>
                      </br><span class="sub_title">Acceptance</span>';
                      if($paper->confirmed ==0){
                      echo '<span style="margin-left: 155px;">In Progress</span>';
                      }else{
                        echo '<span style="margin-left: 155px;">Accepted</span>';
                      }
                     if($paper->confirmed ==1 && $paper->paperscomments->count()){
                      echo '<table id="comment_table'.$paper->id.'" border="0" cellspacing="0" cellpadding="8" width="100%" bgcolor="#d9d9d9">';
                          if($paper->paperscomments->count()){
                              foreach($paper->paperscomments as $comment){
                                 echo '<tr><td width="10%" style="padding:5pt; font-size:12pt;"><center><strong style="font-size:12pt;">Reviewer Comment </strong></center></td>
                                <td width="70%"  bgcolor="#FFFFFF" style="padding:5pt 10pt; border-bottom: 3px solid #f5f5f5;">'.$comment->comment.'</td></tr>';

                                // <td bgcolor="#FFFFFF" style="padding-right:10pt;border-bottom: 3px solid #f5f5f5;"><span style="color: #00a99d; font-size:11pt;"><center>'.$comment->updated_at.'</center></span> </td>
                              }
                          }
                            echo '</table>';
                      }
                    echo '</td>
                  </tr>
                  <tr>
                    <td colspan="3" bgcolor="#FFFFFF" id="sym'.$x.'_blank" height="5px"></td>
                  </tr>';
                  $x = $x +1;
                  }
                  ?>
                </table>
                 @else
                    <h3>You didn't submit paper yet, please <a href="digests"><span style="color: #E46C0A;font-weight:  bold;">submit your digest</span></a> first. </h3>
                @endif
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