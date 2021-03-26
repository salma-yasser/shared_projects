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
  padding: 14px 16px;
  font-size: 17px;
  width: 35%;
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
                      Conference Information
                    </div>
                    <div class="items">
                        <a href="welcome" class="item left_on">Welcome Message</a>
                        <a href="committee" class="item">Committee</a>
                        <a href="scientific_committee" class="item">Scientific Committee</a>
                        <a href="overview" class="item">Overview</a>
                        <a href="topic" class="item">Conference Topics</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">Welcome</span> Message</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <button class="tablink" onclick="openPage('president', this)" id="defaultOpen">President of Tanta University</button>
                  <button class="tablink" onclick="openPage('vice', this)">Conference Chairman</button>

                  <div id="president" class="tabcontent">
                   <!--  <h1 style="color: #00a99d; margin-bottom: 10px;">President of Tanta University</h1> -->
                    <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/president.png')}}" width="250" height="170" />
                      <br />
                      <span style="font-size: 19px;">
                      <strong>Prof. Dr. Magdiy Sabaa</strong><br />
                      President of Tanta University<br /></span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;"><strong>E</strong>gypt's vision 2030, rooted in the concept of sustainable development via 
                    Science, Technology and Innovation Strategy, is consistent with the UN goals of sustainable development, the success achieved in Egypt at the level of energy and water and the executive and finance mechanisms in collaboration with state institutions.
                    <br/><br/>
                    <strong>T</strong>anta University, one of the state institutions that contribute in the implementation of the strategy, holds this conference to promote and disseminate knowledge about the various integrated and intelligent technologies for the safe, secure, sustainable and affordable renewable energy and water resources. 
                    <br/><br/>
                    <strong>T</strong>he conference topics meet the national needs represented in facing the challenges arising from resource scarcity, variability and uncertainty driven by changes brought on by population growth, technological advances and policy developments. 
                    </br/><br/>
                    <strong>T</strong>he conference brings together thought leaders, researchers, scientists, engineers, academia, industry, investors, technology developers, planners, and policymakers to meet and present their research results in a compelling manner on novel technologies and applications of the renewable energy and water systems. Adding to that, they will explore the most suitable and effective ways to design, finance and build better and more sustainable resources with a common vision to identify threats, risks and key opportunities to drive future investments in both renewable energy and water resources.
                    </p>
                  </div>

                  <div id="vice" class="tabcontent">
                   <!--  <h1 style="color: #00a99d">Conference Chairman <br/>
                    Vice-President of Tanta University
                    </h1> -->
                    <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/vice.jpg')}}" width="250" height="170" />
                      <br />
                      <span style="font-size: 19px;">
                      <strong>Prof. Dr. Mostafa ElSheekh</strong><br />
                      Conference Chairman<br />
                      Vice-President of Tanta University<br /></span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;"><strong>W</strong>e all certainly share the view that the next stage is an important turning point in the history of Egypt's scientific and technological renaissance, and that universities support the nation Thought and Future Prospects, and we will all take into consideration the challenges facing Egypt in order to achieve the strategic objectives Science, Technology and Innovation Strategy and Egypt's Sustainable Development Strategy "Vision 2030". 
                    <br/><br/>
                    <strong>W</strong>ater and energy resources are becoming more exacerbated by longer-term trends, including population growth and shifting participation patters due to ongoing climate change. Joint action across industry stakeholders is needed in order to drive water-energy efficiencies and optimize their sustainability for future generations. This Renewable Energy and Water Sustainability Conference, 26-28 March, 2019 in Sharm El-Sheikh, organized by Tanta University, addresses the challenges facing water and renewable energy efficiency programs, technology advances that can help drive efficiencies and cost savings, and successful case studies of joint sustainability of water and energy and the conservation and optimization initiatives as well. 
                    <br/><br/>
                    <strong>T</strong>he event is unique in that it brings together startups, investors, business strategists, regulators, energy companies, water companies and technology innovators for three days of networking and sharing of insights into maximizing the most precious resources of our time.
                    <br/><br/>
                    <strong>T</strong>opics to be addressed include but not limited to: Technologies and energy storage, New materials for energy applications, water management, treatment, and desalination, Environmental hazards and therapeutic uses, Legal challenges and economic concepts, Future trends in energy, water sustainability and climate, and Remote sensing techniques and GIS applications. 
                    </p>
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