@extends('layouts.app')

@section('content')
<style>
.tablink {
  color: #666;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 5px;
  font-size: 17px;
  width: 98%;
  font-size: 17px;
}

.tablink:hover {
  background-color: #00a99d;
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
                      Program
                    </div>
                    <div class="items">
                        <a href="program" class="item">Program</a>
                        <a href="keynote" class="item">Keynote Speakers</a>
                        <a href="workshop" class="item left_on">Workshops</a>
                        <a href="special" class="item">Special Sessions</a>
                        <a href="social" class="item">Social Programs</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;"><span style="color: #0071bc;">
Workshops</span> </h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <div class="tablink" onclick="openPage('ks2', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Principal and Applications of Geospatial
Technologies: Remote Sensing and GIS
Sciences <i>(6 hrs)</i></strong></div></br></br>
                   <div id="ks2" class="tabcontent"  style="display: none;">
                    <div style="float: left; color: #666; margin-bottom: 10px; width: 100%;">
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Instructors</strong></span><br>
       <ul style="margin-left: 15px;"><li> <span style="font-weight: bold;">Prof. Eman Ghoneim</span><br/>
Director: Remote Sensing Research Laboratory (RSRL)<br/>
Department of Earth and Ocean Sciences<br/>
University of North Carolina Wilmington<br/>
USA
</li></ul></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Name</strong></span><br>
       <span style="margin-left: 15px;">Principal and Applications of Geospatial Technologies: Remote Sensing and GIS Sciences</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop date & time</strong></span><br>
       <span style="margin-left: 15px;">Three Sessions</span><br/>
               <span style="margin-left: 15px;">Date: March 26 – 28, 2019</span><br/>
               <span style="margin-left: 15px;">Time: 5:30 pm – 7:30 pm</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Fee</strong></span><br>
       <span style="margin-left: 15px;">100 EGP for Egyptians and 100 $ for Non-Egyptians</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Software</strong></span><br>
       <span style="margin-left: 15px;">ArcGIS v.10.5 (ArcMap and ArcScene) and ENVI v.5.5 software will be used during the
workshop to illustrate techniques in image processing and GIS modeling.</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Topics</strong></span><br>
       <ul style="margin-left: 15px;">
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Context, concepts, and definitions of Geographical Information System (GIS) and Remote
Sensing Sciences.
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Obtaining and processing multispectral satellite images (Landsat and Aster)
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Application of radar data. Advanced techniques in the use of microwave satellite data 
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Principal and applications of thermal infrared satellite imagery.
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Introduction to very high-resolution satellite imagery and their applications (Ikonos, QuickBird,
and WorldView-2)
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Groundwater exploration using multispectral and microwave data
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Mapping land cover, urban encroachments, geological units and lineaments from multispectral
and DEM data
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          GIS hydrological modeling: Mapping wadis and drainage basins. Generating flash flood hazards
via simulating hydrological behavior of desert wadis (dry valleys) during rainstorm events
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Mapping and estimating rates of coastal erosion/accretion from space
        </li>
      </ul></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;">
          Printed lectures will be provided during the workshop. At the end of the program, each trainee
will get a <span style="font-weight: bold;">certificate of completion</span> from the RSRL.
       </p></td>
</tr>
</tbody>
</table>            

                    </div></div></div>
                  <div class="tablink" onclick="openPage('ks1', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Design of On-Grid Solar Power Stations <i>(3 hrs)</i></strong></div></br></br>
                   <div id="ks1" class="tabcontent"  style="display: none;">
                    <div style="float: left; color: #666; margin-bottom: 10px; width: 100%;">
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Instructors</strong></span><br>
       <ul style="margin-left: 15px;"><li>  <span style="font-weight: bold;">Prof. Ahmed Mohamed Refaat Azmy</span><br/>
Vice Dean for Community Service and Environment Development<br/>
Faculty of Engineering- Tanta University
</li><li><span style="font-weight: bold;"> Dr. Sherif Mahmoud Emam Ibrahim</span><br/>
Assistant Professor, Electrical Engineering Department <br/>
Faculty of Engineering, Kafrelsheikh University
</li></ul></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Name</strong></span><br>
       <span style="margin-left: 15px;">Design of On-Grid Solar Power Stations</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop date & time</strong></span><br>
       <span style="margin-left: 15px;">Date 28 March 2019, 3:30-6:30 PM</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Fee</strong></span><br>
       <span style="margin-left: 15px;">100 EGP for Egyptians and 100 $ for Non-Egyptians</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Topics</strong></span><br>
       <ul style="margin-left: 15px;">
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Examining basic components of PV systems
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Identifying the components required for different types of PV systems
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Differences and economics of on-grid and off-grid systems  
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Standard Test Conditions (STC) and labeling of PV modules
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Examining different types of PV modules
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Different types of grid-dependent inverters (micro, string, and central inverters)
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Difference between deep-cycle and shallow-cycle batteries
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Explaining MPPT (Maximum Power Point Tracking) and its uses
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Site analysis, planning, and implementation
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Difference between the feed-in tariff and net-metering systems
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Steps to build a solar power station connected to the grid
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          On-grid system sizing for a client’s needs, desires, and/or budget 
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Specific terminology required for the design of on-grid PV systems 
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Effects of temperature and irradiance fluctuations on the design of PV systems
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Highlighting the combiner box components for both DC and AC sides
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Using solar energy web-based design programs to determine site shading 
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Using inverter's software for some brands to design on-grid PV systems
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Designing a 50 kW on-grid solar power station as a case study
        </li>
      </ul></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;">
       Printed lectures will be provided during the workshop. At the end of the program, each trainee will get a <span style="font-weight: bold;">certificate of completion</span> approved from the Organizing Committee and Tanta University.</p></td>
</tr>
</tbody>
</table>            

                    </div></div></div>
                    
 <div class="tablink" onclick="openPage('ks3', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Conservation of Irrigation Water for
Sustainable Development <i>(3 hrs)</i></strong></div></br></br>
 <div id="ks3" class="tabcontent"  style="display: none;">
  <div style="float: left; color: #666; margin-bottom: 10px; width: 100%;">
<table width="100%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Instructors</strong></span><br>
       <ul style="margin-left: 15px;"><li>  <span style="font-weight: bold;">Dr. Esam Mohamed Ibrahim El-Baaly</span><br/>
Associate Professor of Agricultural Extension<br/>
Faculty of Agriculture, Tanta University<br/>
</li></ul></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Name</strong></span><br>
       <span style="margin-left: 15px;">Conservation of Irrigation Water for Sustainable Development</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop date & time</strong></span><br>
       <span style="margin-left: 15px;">One Session</span><br/>
               <span style="margin-left: 15px;">Date: March 27, 2019</span><br/>
               <span style="margin-left: 15px;">Time: 3:30 am – 6:30 am</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Fee</strong></span><br>
       <span style="margin-left: 15px;">100 EGP for Egyptians and 100 $ for Non-Egyptians</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Workshop Topics</strong></span><br>
       <span style="margin-left: 15px;">
        Estimates of the water consumption in Egypt indicate that agriculture consumes the largest
share. There are four different frameworks for conserving irrigation water for sustainable
agricultural development from scientific and professional perspectives.<br/>
<span style="font-weight: bold;">First, the engineering framework, which can preserve</span> water by engineering development
of irrigation infrastructure.<br/>
<span style="font-weight: bold;">Second, the regulatory framework:</span> Farmers should be organized into a non-governmental
organization (NGOs) that will called water user associations.<br/>
<span style="font-weight: bold;">Third, the rational framework:</span> Farmer must be sensible with water, and efforts should be
made to convince farmer to adopt rational attitudes toward water resources.<br/>
<span style="font-weight: bold;">Fourth, the frame of adoption:</span> if farmer's behavior with water is irrational, it is necessary
to define justifications of that behavior from their own view then clarify the misconception of
these justifications.
        </span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>The overall objective of the workshop</strong></span><br>
       <span style="margin-left: 15px;">The workshop aims at providing the participants with the knowledge, skills and positive
attitudes related to the conservation of irrigation water for sustainable development.</span></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 17px; color: #d16819"><strong>Detailed objectives</strong></span><br>The participant will be able to:
       <ul style="margin-left: 15px;">
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Realize the reality of Egyptian water security.
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Recognize types of different theoretical frameworks for the conservation of irrigation water.
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Discuss the importance of conserving irrigation water for sustainable development.
        </li>
        <li> <span style="font-size: 17px; color: #0071bc; font-weight: bold;"> > </span>
          Adoption a positive approach towards the importance of conserving irrigation water for
sustainable development.
        </li>
      </ul></p></td>
</tr>
<tr>
        <td width="91%" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px; margin-bottom: 5px; margin-top: 5px;">
          Printed lectures will be provided during the workshop. At the end of the program, each
trainee will get a <span style="font-weight: bold;">certificate of completion</span> approved from the Organizing Committee
and Tanta University.
       </p></td>
</tr>
</tbody>
</table>            

                    </div></div></div>
                  </br></br></br></br>
               
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
      if(document.getElementById(pageName) == tabcontent[i]){
        if(tabcontent[i].style.display == "none"){
          // Show the specific tab content
          tabcontent[i].style.display = "block";
          // Add the specific color to the button used to open the tab content
          elmnt.style.backgroundColor = "#00a99d";
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
@endsection