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
  width: 35%;
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
                        <a href="keynote" class="item left_on">Keynote Speakers</a>
                        <a href="workshop" class="item">Workshops</a>
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
Keynote</span>  Speakers</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
                  <div class="tablink" onclick="openPage('ks8', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> A. S. BAHAJ, UK</strong></div></br></br>
 <div id="ks8" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks8.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>A. S. BAHAJ<br/>UK</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

Professor <strong>BAHAJ</strong> leads the 55-strong Energy and Climate Change Division and the Sustainable Energy Research Group at the University of Southampton, UK, where he completed his PhD, progressing from a researcher to a Personal Chair in Sustainable Energy.  For more than 25 years, Professor Bahaj has pioneered sustainable energy research and established the energy theme within the University. Professor Bahaj's work has resulted in over 300 articles, published in academic refereed journals and conference series of international standing. He founded the International Journal of Marine Energy for which he is the Editor-in-Chief. Prof Bahaj also holds visiting professorships at the Xi'an University, China, the Angstrom Laboratory and Engineering University of Uppsala, Sweden and King Abdulaziz University), KSA
           </p>

                  </div>

                  <div class="tablink" onclick="openPage('ks5', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Alex VAN DEN BOSSCHE, Belgium</strong></div></br></br>
<div id="ks5" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks5.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Alex VAN DEN BOSSCHE<br/>Belgium</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

Professor <strong>BOSSCHE</strong> has awarded his PhD degree from Ghent University in 1990. Currently he is serves as a professor in Department of Electrical Energy, Metals, Mechanical Constructions and Systems. Prof.<strong>BOSSCHE</strong> is interested in the research of alternative energy conversion, grid coupled converters, ultralight electric vehicles, DC-grids, direct use of PV, power electronic conversion, and energy saving. He has 7 patents in energy related subjects, in addition he published more than 183 research article. <span style="color: #ff0000;"> His Scopus h-index is 23.</span>
           </p>    </div>
           <div class="tablink" onclick="openPage('ks6', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Andrew N. TYLER, UK</strong></div>  </br> </br>  
<div id="ks6" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks6.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Andrew N. TYLER<br/>UK</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

<strong>TYLER</strong> is a professor at Biological and Environmental Sciences, Faculty of Natural Sciences, University of Stirling, UK. He is also an associate Dean for Research to drive the research activity across the Faculty of Natural Sciences. <strong>TYLER</strong> is a specialist in environmental monitoring from in-situ to Earth Observation for the quantitative assessment and impact of environmental pollutants (radioactive & nutrient) in aquatic and terrestrial environments from local to global scales. TYLER has granted many projects in monitoring water quality and environmental pollutants in aquatic and terrestrial environments. He published more than 54 articles.<span style="color: #ff0000;">  His Scopus h-index is 22.</span>
           </p>

                  </div>
                  <div class="tablink" onclick="openPage('ks9', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Curtis WOODCOCK, USA</strong></div></br></br>
<div id="ks9" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks9.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Curtis WOODCOCK<br/>USA</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

Professor <strong>WOODCOCK</strong> has received his degrees PhD in Geography, from University of California, USA. He is a chief scientist of USGS Land Change Monitoring, Assessment and Projection. He is also a Member of NASA Senior Review and MODIS Science Team. His areas of specialization are Remote sensing, Land Cover and Land Use Change; Terrestrial Carbon Dynamics; Spatial modeling and analysis and Digital image processing. He published more than 240 peer-review papers, book chapters, reports and reviews and secured several millions of US dollars in research grants. Prof. Woodcock received numerus honors and awards including, the NASA Graduate Researchers Program (Johnson Space Center), Erasmus Mundus Visiting Scholar, Outstanding Contributions Award, Remote Sensing Specialty Group of the Association of American Geographers.
           </p>

                  </div>
                  <div class="tablink" onclick="openPage('ks12', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /><strong> Eman GHONEIM, USA</strong></div></br></br>
<div id="ks12" class="tabcontent" style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks12.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Eman GHONEIM<br/>USA</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

 <strong>GHONEIM </strong>has received her PhD in Physical Geography from the Geography Department, Faculty of Science at the University of Southampton, United Kingdom 2002. <strong>GHONEIM </strong> is currently a Professor at Earth and Ocean Sciences, University of North Carolina, USA. She held a senior research position at the USA Center for Remote Sensing, Boston University in 2003 and become a faculty member at the UNCW-EOS and the Director of RSRL in 2010. Professor <strong>GHONEIM </strong> received several awards and recognitions including the UNCW Chancellor’s Teaching Excellence Award (2017), the Egyptian Ministry of Immigration and Expatriate Affairs during both the Egypt Can national summits in 2017 and 2018. In 2018, she is appointed as the Deputy Director of the UNCW-GEOINT Program. She has expertise in utilizing advanced geospatial technology in the study of natural resources and hazards. She published more than 80 peer-reviewed journals, book chapters and conference articles.
           </p>

                  </div>

                  <div class="tablink" onclick="openPage('ks13', this)" ><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong>Jianzhong SUN, China</strong></div></br></br>
<div id="ks13" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks13.jpg')}}" width="120" height="150" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Jianzhong SUN<br/>China</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

Prof. Dr. <strong>Jianzhong Sun </strong>is the Vice Dean, School of the Environmental and Safety Engineering, Jiangsu University, P. R. China. <strong>Sun</strong> has awarded his PhD degree from Louisiana State University, USA, 2002. <strong>Sun</strong> conduct research on Recycling, reuse, and recovery of waste biomass and other important lignocellulosic biomass resources for various value-added fuels and chemicals. Also he is interested in the research of advanced technology development for biomass-based plastics and other relevant bio-products. He published more than 49 international academic paper in these subjects.</span>
           </p>

                  </div>
                  <div class="tablink" onclick="openPage('ks15', this)" ><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong>Hossam MOGHAZY, Egypt</strong></div></br></br>
<div id="ks15" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks15.jpg')}}" width="120" height="150" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Hossam MOGHAZY<br/>Egypt</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
                        <strong>Hossam Moghazy,</strong> the former Egyptian Minister for Water
                        Resources and Irrigation. Professor Moghazy has obtained his
                        doctorate in groundwater and well design from the University of
                        London. He was appointed professor of irrigation engineering at the
                        University of Alexandria. He then served as head of the university's
                        irrigation department and represented the university in the agreement
                        of scientific cooperations. Moghazy received many scientific awards,
                        most notably the Alexandria University Encouragement Award for
                        1998, and supervised more than 15 master's and doctoral
                        dissertations in Egyptian and Arab universities. Moghazy published
                        many scientific researches, including more than 40 researches in
                        international and local journals in the field of groundwater, irrigation
                        and drainage engineering and protection of the aquatic environment.
                        </p>

                  </div>
                    <div class="tablink" onclick="openPage('ks7', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong>Katsuaki KOIKE, Japan</strong></div></br></br>
   <div id="ks7" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks7.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Katsuaki KOIKE<br/>Japan</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

<strong>KOIKE</strong> is a Professor of Environmental Geosphere Engineering, Chair of Earth Resource Sciences, Department of Urban Management, Graduate School of Engineering, Kyoto University, Japan. Professor <strong>KOIKE</strong> has got his PhD degree from Faculty of Engineering, Kyoto University, JAPAN (1995). He is interested in natural resources assessment devoted mainly to Energy & Water, integrating Earth Observation data, Geoinformatics, and computer programming. Prof. Koike published more than 103 research articles in highly ranked Journals. He has been assigned as an editor in many editorial boards such as Computers & Geosciences, Natural Resources Research, International Journal of Geoinformatics, and International Association for Mathematical Geosciences. <span style="color: #ff0000;"> His Scopus h-index is 18.</span>
           </p>

                  </div>

                  <div class="tablink" onclick="openPage('ks2', this)"> <img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong> Radisav D. VIDIC, USA</strong></div></br></br>
<div id="ks2" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks2.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Radisav D. VIDIC<br/>USA</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

<strong>Professor</strong> VIDIC is currently the Chair of Department of Civil and Environmental Engineering, University of Pittsburgh, Pittsburgh, PA, USA. He has got his PhD degree from Environmental Engineering, University of Cincinnati, USA in 1992. <strong>Professor</strong> VIDIC authored and co-authored more than 150 research article. He is a specialist in Physical chemical processes for water, wastewater, hazardous waste, air treatment, and adsorption technologies for water treatment.  He is a member of Board of Directors, Shale Alliance for Energy Research (SAFER). In 2003 he has awarded Fulbright Scholarship from University of Belgrade, Serbia and Montenegro.<span style="color: #ff0000;"> His Scopus h-index is 35.</span>
           </p>

                  </div>

<div class="tablink" onclick="openPage('ks11', this)"> <img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong> Ravishankar Sathyamurthy, India</strong></div></br></br>
<div id="ks11" class="tabcontent"  style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks11.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Ravishankar Sathyamurthy<br/>India</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<strong>Ravishankar S</strong> born on 5/11/1988 in India. He is a recipient of Veltech Gold medal for excellence in merit. During the year 2010-2012 he presented several papers in National and International conferences. Bagged his gold medal in post graduate and got the university 1st rank with a CGPA of 9.8/10. His research interests include material science, refrigeration and air conditioning, solar drying techniques, solar still desalination, IC engines, Nano fluids in heat transfer applications, material characterization, Computational fluid dynamics, Heat transfer phenomenon, phase change materials, hybrid characterization, energy storage, Alternate fuels, heat and power engineering. He authored and co authored more than 70 international articles and presented 7 articles in international conferences. He served as reviewer for 80 International journals and reviewed 400 research and review article. He is presently working with Mechanical Power Engineering department, Faculty of Engineering, Tanta University, Egypt and Department of Automobile Engineering, Hindustan Institute of Technology and Science, Chennai.
           </p>

                  </div>
                        <div class="tablink" onclick="openPage('ks16', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong> Weilan SHAO, China</strong></div></br></br>
<div id="ks16" class="tabcontent" style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks16.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Weilan SHAO<br/>China</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
                    <strong>Weilan Shao</strong> holds a Ph.D. degree in Microbiology from the
                    University of Georgia, USA. Dr. Shao has worked as a distinguished
                    professor in Jiangnan University, Her research mission is to develop
                    feasible and economic effective approaches for renewable bioenergy
                    processing by using molecular biotechnology. Dr Shao has invented
                    new techniques for industrial enzyme production and modification,
                    which include pHsh gene expression system (US patent), in situ gene
                    random mutagenesis (CN patent; US patent), high production of
                    thermostable laccase (CN patent), soluble expression of aggregation-
                    pron enzymes, and gfa selection marker for the bio-safety of gene
                    transfer in microbes.
                    </p>

                  </div>
                        <div class="tablink" onclick="openPage('ks14', this)"><img src="{{URL::asset('image/ci/ks.gif')}}" width="15" height="15" /> <strong> Yan Yunjun, China</strong></div></br></br>
<div id="ks14" class="tabcontent" style="display: none;">
                                       <div style="float: right; margin-left: 30px; color: #666; margin-bottom: 10px;">
                      <img src="{{URL::asset('image/ci/ks14.jpg')}}" width="150" height="170" />
                      <br />
                      <span style="font-size: 15px;">
                      <center><strong>Yan Yunjun<br/>China</strong></center><br />
                    </span>
                    </div>
                    <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">

 Prof. Dr. <strong>Yunjun Yan </strong>majors in molecular biology, microbiology and aquatic ecology, received his PhD degree at Institute of Hydrobiology, the Chinese Academy of Sciences (CAS) in 1998. Subsequently, he became an associate professor, then a full professor of Huazhong University of Science and Technology (HUST). From 2000 to 2007, he was appointed as a consultant scientist of the Department of Rural and Social Development of the Ministry of Science and Technology of China. Then, he returned his university as a full professor. Now, he is the vice dean of College of Life Science and Technology, HUST and deputy director of Key Laboratory of Molecular Biophysics of the Ministry of Education. His main research interests are molecular microbiology, bio-energy, biorefinery, synthetic biology, and aquatic ecology.
           </p>

                  </div>

            

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