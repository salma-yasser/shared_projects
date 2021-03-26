@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <style type="text/css">
   /*=========================================================
  SPEAKERS
===========================================================*/

#speakers {
  background-color: #F9F9FA;
}

.speaker {
  position: relative;
  cursor: pointer;
  margin-bottom: 30px;
  overflow: hidden;
  -webkit-transition: 0.3s all;
  transition: 0.3s all;
}

.speaker:after {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  background-color: #000;
  opacity: 0;
  -webkit-transition: 0.3s all;
  transition: 0.3s all;
}
.speaker:hover:after {
  opacity: 0.1;
}
.speaker:hover{
  box-shadow: 0 9px 18px rgba(0,0,0,0.20), 0 5px 7px rgba(0,0,0,0.15);
}

.speaker:hover img {
    transform: rotate(1.8deg) scale(1.1);
    -webkit-transition: 0.3s all;
    transition: 0.3s all;
}


.speaker .speaker-img>img {
  width: 100%
}

.speaker .speaker-body {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  bottom: -55px;
  opacity: 0;
  -webkit-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.speaker:hover .speaker-body {
  bottom: 0;
  opacity: 0.9;
}
.speaker .speaker-content {
  position: relative;
  padding: 2px;
  padding-left: 10px;
  background: #e4a90f;
  text-align: left;
  z-index: 20;
  font-weight: bold;
  height: 55px;
}

.speaker .speaker-content>h2 {
  color: #FFF;
}

.speaker .speaker-content>span {
  color: #fff;
}

.speaker .speaker-content .speaker-title {font-size: 18px; margin-top: 2px; color: #9d2a02};
.speaker .speaker-content .speaker-country{ font-size: 15px; }

.speaker .speaker-social {
  position: absolute;
  top: 0;
  right: 0;
  -webkit-transform: translateY(0%);
  -ms-transform: translateY(0%);
  transform: translateY(0%);
  z-index: 5;
  -webkit-transition: 0.3s all;
  transition: 0.3s all;
}

.speaker .speaker-social>a {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  color: #FFF;
  background: #dd0a37;
  z-index: 15;
  -webkit-transition: 0.3s opacity;
  transition: 0.3s opacity;
}

.speaker .speaker-social a+a {
  margin-left: -4px;
  border-left: 1px solid #f8f8ff33;
}

.speaker .speaker-social a:hover {
  opacity: 0.8;
}

.speaker:hover .speaker-social {
  -webkit-transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  transform: translateY(-100%);
}


/*.container {
    width: 1000px !important;
}*/
/*----------------------------*\
  Speaker Modal
\*----------------------------*/

.speaker-modal .modal-dialog {
  width: 100%;
  max-width: 970px;
  margin-top: 90px;
  margin-bottom: 60px;
}

.speaker-modal .modal-content {
  border: none;
  border-radius: 2px;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
}

.speaker-modal .speaker-modal-close {
  position: absolute;
  right: -15px;
  top: -15px;
  width: 60px;
  height: 60px;
  line-height: 60px;
  text-align: center;
  background-color: #e4a90f !important;
  border-radius: 50%;
  padding: 0;
  color: #FFF;
  border: none;
  font-size: 24px;
  z-index: 50;
}

.speaker-modal .speaker-modal-close:after {
  content: "\f00d";
  font-family: FontAwesome;
}

.speaker-modal .modal-body {
  padding: 30px;
}

.speaker-modal .speaker-modal-img>img {
  width: 100%;
}

.speaker-modal .speaker-modal-content .speaker-name {
  display: inline-block;
  margin-right: 15px;
}

.speaker-modal .speaker-modal-content .speaker-job {
  color: #dd0a37;
}

.speaker-modal .speaker-modal-content .speaker-social {
  margin-top: 30px;
  margin-bottom: 30px;
}

.speaker-modal .speaker-modal-content .speaker-social>a {
  display: inline-block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  font-size: 14px;
  border-radius: 50%;
  background: #dd0a37;
  color: #fff;
  margin-right: 5px;
  -webkit-transition: 0.3s opacity;
  transition: 0.3s opacity;
}

.speaker-modal .speaker-modal-content .speaker-social>a:hover {
  opacity: 0.8;
}

.speaker-modal .speaker-modal-content .speaker-website {
  margin-top: 30px;
}

.speaker-modal .speaker-modal-content .speaker-events .speaker-event+.speaker-event {
  margin-top: 30px;
}

.speaker-modal .speaker-modal-content .speaker-events .speaker-event>span {
  display: block;
  margin-bottom: 10px;
  font-size: 12px;
}

.speaker-modal .speaker-modal-content .speaker-events .speaker-event>span strong {
  color: #dd0a37;
}

.modal-backdrop{
  display: none !important;
}

.modal-open .modal {
    background: rgba(0,0,0,0.7);
}




/* fix blank or flashing items on carousel */
.owl-carousel .item {
  position: relative;
  z-index: 100; 
  -webkit-backface-visibility: hidden; 
}

/* end fix */
.owl-nav > div {
  margin-top: -26px;
  position: absolute;
  top: 50%;
  color: #cdcbcd;
}

.owl-nav i {
  font-size: 52px;
}

.owl-nav .owl-prev {
  left: -30px;
}

.owl-nav .owl-next {
  right: -30px;
}

.padding-table-columns td
{
    padding:0 15px 0 0; /* Only right padding*/
}
</style>
<div class="main-wrap" style=" width: 1200px !important;">
          <!-- start slider -->
            <div id="slider" style=" width: 1200px !important;">      
                <!-- start nivo slider -->
                <div class="slider-wrapper theme-default">
                    <div id="sliderv" class="nivoSlider">
                        <img src="{{URL::asset('new/images/main_img7.jpg')}}" alt="">
                        <img src="{{URL::asset('new/images/main_img1.jpg')}}" alt="">
                        <img src="{{URL::asset('new/images/main_img2.jpg')}}" alt="">
                        <img src="{{URL::asset('new/images/main_img6.jpg')}}" alt="">
                        <img src="{{URL::asset('new/images/main_img3.jpg')}}" alt="">
                        <img src="{{URL::asset('new/images/main_img4.jpg')}}" alt="">
                        <img src="{{URL::asset('new/images/main_img5.jpg')}}" alt="">
                    </div>
                </div>
                <!-- <div id="htmlcaption" class="nivo-html-caption">
                    <h4>5<sup style="font-size: 20px;">th</sup> International Conference on Scientific Research ISR-2019
                    <br><span style="font-family: 'TitilliumText22LBold', Arial, sans-serif">RENEWABLE ENERGY & WATER SUSTAINABILITY</span>
                    <br>Sharm El Sheikh-Egypt
<br>
March 26-29 (Tus.- Fri.),2019</h4>
                </div> -->
            </div>
            <!-- end slider -->
            <div id="main_links">
                <div class='wrapper'>
                  <ul>
                    <li>
                      <a href='mypage'>
                        <i class='fa fa-list-alt'></i>
                        <div>Full Paper Submission</div>
                      </a>
                    </li>
                    <li>
                      <a href='topic'>
                        <i class='fa fa-tags'></i>
                        <div>Conference Topics</div>
                      </a>
                    </li>
                    <li>
                      <a href='#' onclick="MM_openBrWindow('download_center','down','width=500,height=450')">
                        <i class='fa fa-cloud-download'></i>
                        <div>Download Center</div>
                      </a>
                    </li>
                    <li>
                      <a href='registration'>
                        <i class='fa fa-calendar'></i>
                        <div>Registration</div>
                      </a>
                    </li>
                  </ul>
                  <span class="shadowHolderflat"><img src="{{URL::asset('new/images/big-shadow3.png')}}" alt=""></span>
                </div>

            </div>


            <!-- <div class="sep_lines"></div> -->
            
            <!-- start promo box -->
            <div class="promo-box" style="margin-top: 300px; border-bottom: 0; ">
                <h1 class="text-center">5<sup style="font-size: 20px;">th</sup> International Conference on Scientific Research ISR-2019
                    <br><span style="font-family: 'TitilliumText22LBold', Arial, sans-serif">RENEWABLE ENERGY & WATER SUSTAINABILITY</span>
                    <br>Sharm El Sheikh-Egypt
              <br> March 26-29 (Tu.- Fr.),2019 </h1>      
            </div><!-- end promo box -->
            
            <div class="clear20"></div>
        </div>
        
            
        <!-- <div class="clear20"></div> -->
        
        <div class="main-wrap">

            <div class="col-md-12" id="co_timeline" style="background: #fac029;">
           <div class='container'>
              <div class='timeline'>
                <div class='start'></div>
              </div>
              <div class='entries'>

                <div class='entry project'>
                  <div class='dot'></div>
                  <div class='label'>
                    <div class='time'>
                       July 1, 2018
                    </div>
                    <div class='detail'>
                      Start of abstract submission
                    </div>
                  </div>
                </div>

                <div class='entry study'>
                  <div class='dot'></div>
                  <div class='label'>
                    <div class='time'>
                      <span style="color: red;"> December 15, 2018</span>
                    </div>
                    <div class='detail'>
                      Deadline of abstract submission
                    </div>
                  </div>
                </div>

                <div class='entry app'>
                  <div class='dot'></div>
                  <div class='label'>
                    <div class='time'>
                      January 31 , 2019
                    </div>
                    <div class='detail'>
                      Deadline of full paper submission
                    </div>
                  </div>
                </div>
                
                <div class='entry life'>
                  <div class='dot'></div>
                  <div class='label'>
                    <div class='time'>
                      March 1, 2019
                    </div>
                    <div class='detail'>
                      Announcement of conference program
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
          <!-- Speakers Start -->

<div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
  <div class="clear20"></div>
    <div class="separator">
        <h4>Keynote Speakers</h4>
        <div class="sep_line"></div>
    </div>
    <div class="clear20"></div>
    <!-- Speakers -->
  <div id="speakers" class="section">

    <!-- container -->
    <div class="container" style="width: 1000px;">
      <!-- row -->
      <div class="row">
       
       <div class="owl-carousel">
   <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-10">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks8.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">A. S. BAHAJ</span><br>
                <span class ="speaker-country">UK</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

        <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-1" >
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks5.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Alex VAN DEN BOSSCHE</span><br>
                <span class ="speaker-country">Belgium</span>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /speaker -->
         

 <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-2" style="margin-left: 8px; ">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks6.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Andrew N. TYLER</span><br>
                <span class ="speaker-country">UK</span>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /speaker -->
      
         <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-4" >
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks9.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Curtis WOODCOCK</span><br>
                <span class="speaker-country">USA</span>
              </div>
            </div>
          </div>

        </div>
        <!-- /speaker -->
       

         <!-- speaker -->

        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-5">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks12.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Eman GHONEIM</span><br>
                <span class="speaker-country">USA</span>
              </div>
            </div>
          </div>

        </div>
        <!-- /speaker -->
    
         <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-7">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks13.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Jianzhong SUN</span><br>
                <span class ="speaker-country">China</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

         <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-8">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks15.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Hossam MOGHAZY</span><br>
                <span class ="speaker-country">Egypt</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

         <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-9">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks7.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Katsuaki KOIKE</span><br>
                <span class ="speaker-country">Japan</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

         <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-13">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks2.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Radisav D. VIDIC</span><br>
                <span class ="speaker-country">USA</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

          <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-14">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks11.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Ravishankar Sathyamurthy</span><br>
                <span class ="speaker-country">India</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

        <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-15">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks16.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Weilan SHAO</span><br>
                <span class ="speaker-country">China</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->

        <!-- speaker -->
        <div class="item">
          <div class="speaker" data-toggle="modal" data-target="#speaker-modal-16">
            <div class="speaker-img">
              <img src="{{URL::asset('image/ci/ks14.jpg')}}" height="250" alt="">
            </div>
            <div class="speaker-body">
              <div class="speaker-content">
                <span class="speaker-title">Yan Yunjun</span><br>
                <span class ="speaker-country">China</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /speaker -->
         
      </div>

        
      </div>
      <!-- /row -->


    </div>
    <!-- /container -->



<!-- Start Modal -->

    <!-- speaker modal -->
          <div id="speaker-modal-1" class="speaker-modal modal fade" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="speaker-modal-img">
                        <img src="{{URL::asset('image/ci/ks5.jpg')}}" height="350" alt="">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="speaker-modal-content">
                        <h2 class="speaker-name">Alex VAN DEN BOSSCHE</h2>
                        <span class="speaker-name">- Belgium</span>

                        <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                        Professor <strong>BOSSCHE</strong> has awarded his PhD degree from Ghent University in 1990. Currently he is serves as a professor in Department of Electrical Energy, Metals, Mechanical Constructions and Systems. Prof.<strong>BOSSCHE</strong> is interested in the research of alternative energy conversion, grid coupled converters, ultralight electric vehicles, DC-grids, direct use of PV, power electronic conversion, and energy saving. He has 7 patents in energy related subjects, in addition he published more than 183 research article. <span style="color: #ff0000;"> His Scopus h-index is 23.</span></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


           <div id="speaker-modal-2" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks6.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Andrew N. TYLER</h2>
                      <span class="speaker-name">- UK</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                      <strong>TYLER</strong> is a professor at Biological and Environmental Sciences, Faculty of Natural Sciences, University of Stirling, UK. He is also an associate Dean for Research to drive the research activity across the Faculty of Natural Sciences. <strong>TYLER</strong> is a specialist in environmental monitoring from in-situ to Earth Observation for the quantitative assessment and impact of environmental pollutants (radioactive &amp; nutrient) in aquatic and terrestrial environments from local to global scales. TYLER has granted many projects in monitoring water quality and environmental pollutants in aquatic and terrestrial environments. He published more than 54 articles.<span style="color: #ff0000;">  His Scopus h-index is 22.</span></p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="speaker-modal-4" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks9.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Curtis WOODCOCK</h2>
                      <span class="speaker-name">- USA</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                     Professor <strong>WOODCOCK</strong> has received his degrees PhD in Geography, from University of California, USA. He is a chief scientist of USGS Land Change Monitoring, Assessment and Projection. He is also a Member of NASA Senior Review and MODIS Science Team. His areas of specialization are Remote sensing, Land Cover and Land Use Change; Terrestrial Carbon Dynamics; Spatial modeling and analysis and Digital image processing. He published more than 240 peer-review papers, book chapters, reports and reviews and secured several millions of US dollars in research grants. Prof. Woodcock received numerus honors and awards including, the NASA Graduate Researchers Program (Johnson Space Center), Erasmus Mundus Visiting Scholar, Outstanding Contributions Award, Remote Sensing Specialty Group of the Association of American Geographers.</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



         <div id="speaker-modal-5" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks12.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Eman GHONEIM</h2>
                      <span class="speaker-name">- USA</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                      <strong>GHONEIM </strong>has received her PhD in Physical Geography from the Geography Department, Faculty of Science at the University of Southampton, United Kingdom 2002. <strong>GHONEIM </strong> is currently a Professor at Earth and Ocean Sciences, University of North Carolina, USA. She held a senior research position at the USA Center for Remote Sensing, Boston University in 2003 and become a faculty member at the UNCW-EOS and the Director of RSRL in 2010. Professor <strong>GHONEIM </strong> received several awards and recognitions including the UNCW Chancellor’s Teaching Excellence Award (2017), the Egyptian Ministry of Immigration and Expatriate Affairs during both the Egypt Can national summits in 2017 and 2018. In 2018, she is appointed as the Deputy Director of the UNCW-GEOINT Program. She has expertise in utilizing advanced geospatial technology in the study of natural resources and hazards. She published more than 80 peer-reviewed journals, book chapters and conference articles.</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="speaker-modal-7" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks13.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Jianzhong SUN</h2>
                      <span class="speaker-name">- China</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                      Prof. Dr. <strong>Jianzhong Sun </strong>is the Vice Dean, School of the Environmental and Safety Engineering, Jiangsu University, P. R. China. <strong>Sun</strong> has awarded his PhD degree from Louisiana State University, USA, 2002. <strong>Sun</strong> conduct research on Recycling, reuse, and recovery of waste biomass and other important lignocellulosic biomass resources for various value-added fuels and chemicals. Also he is interested in the research of advanced technology development for biomass-based plastics and other relevant bio-products. He published more than 49 international academic paper in these subjects.</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div id="speaker-modal-8" class="speaker-modal modal fade" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks15.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Hossam MOGHAZY</h2>
                      <span class="speaker-name">- Egypt</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                      <strong>Hossam Moghazy,</strong> the former Egyptian Minister&nbsp;for&nbsp;Water
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
                        and drainage engineering and protection of the aquatic environment.</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div id="speaker-modal-9" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks7.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Katsuaki KOIKE</h2>
                      <span class="speaker-name">- Japan</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                     <strong>KOIKE</strong> is a Professor of Environmental Geosphere Engineering, Chair of Earth Resource Sciences, Department of Urban Management, Graduate School of Engineering, Kyoto University, Japan. Professor <strong>KOIKE</strong> has got his PhD degree from Faculty of Engineering, Kyoto University, JAPAN (1995). He is interested in natural resources assessment devoted mainly to Energy &amp; Water, integrating Earth Observation data, Geoinformatics, and computer programming. Prof. Koike published more than 103 research articles in highly ranked Journals. He has been assigned as an editor in many editorial boards such as Computers &amp; Geosciences, Natural Resources Research, International Journal of Geoinformatics, and International Association for Mathematical Geosciences. <span style="color: #ff0000;"> His Scopus h-index is 18.</span></p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



         <div id="speaker-modal-10" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks8.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">A. S. BAHAJ</h2>
                      <span class="speaker-name">- UK</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                      Professor <strong>BAHAJ</strong> leads the 55-strong Energy and Climate Change Division and the Sustainable Energy Research Group at the University of Southampton, UK, where he completed his PhD, progressing from a researcher to a Personal Chair in Sustainable Energy.  For more than 25 years, Professor Bahaj has pioneered sustainable energy research and established the energy theme within the University. Professor Bahaj's work has resulted in over 300 articles, published in academic refereed journals and conference series of international standing. He founded the International Journal of Marine Energy for which he is the Editor-in-Chief. Prof Bahaj also holds visiting professorships at the Xi'an University, China, the Angstrom Laboratory and Engineering University of Uppsala, Sweden and King Abdulaziz University), KSA</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="speaker-modal-13" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks2.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Radisav D. VIDIC</h2>
                      <span class="speaker-name">- USA</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                     <strong>Professor</strong> VIDIC is currently the Chair of Department of Civil and Environmental Engineering, University of Pittsburgh, Pittsburgh, PA, USA. He has got his PhD degree from Environmental Engineering, University of Cincinnati, USA in 1992. <strong>Professor</strong> VIDIC authored and co-authored more than 150 research article. He is a specialist in Physical chemical processes for water, wastewater, hazardous waste, air treatment, and adsorption technologies for water treatment.  He is a member of Board of Directors, Shale Alliance for Energy Research (SAFER). In 2003 he has awarded Fulbright Scholarship from University of Belgrade, Serbia and Montenegro.<span style="color: #ff0000;"> His Scopus h-index is 35.</span></p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="speaker-modal-14" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks11.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Ravishankar Sathyamurthy</h2>
                      <span class="speaker-name">- India</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                     <strong>Ravishankar S</strong> born on 5/11/1988 in India. He is a recipient of Veltech Gold medal for excellence in merit. During the year 2010-2012 he presented several papers in National and International conferences. Bagged his gold medal in post graduate and got the university 1st rank with a CGPA of 9.8/10. His research interests include material science, refrigeration and air conditioning, solar drying techniques, solar still desalination, IC engines, Nano fluids in heat transfer applications, material characterization, Computational fluid dynamics, Heat transfer phenomenon, phase change materials, hybrid characterization, energy storage, Alternate fuels, heat and power engineering. He authored and co authored more than 70 international articles and presented 7 articles in international conferences. He served as reviewer for 80 International journals and reviewed 400 research and review article. He is presently working with Mechanical Power Engineering department, Faculty of Engineering, Tanta University, Egypt and Department of Automobile Engineering, Hindustan Institute of Technology and Science, Chennai.</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

         <div id="speaker-modal-15" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks16.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Weilan SHAO</h2>
                      <span class="speaker-name">- China</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
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
                      transfer in microbes.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div id="speaker-modal-16" class="speaker-modal modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="speaker-modal-img">
                      <img src="{{URL::asset('image/ci/ks14.jpg')}}" height="350" alt="">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="speaker-modal-content">
                      <h2 class="speaker-name">Yan Yunjun</h2>
                      <span class="speaker-name">- China</span>

                      <p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px; margin-top: 13px;">
                       Prof. Dr. <strong>Yunjun Yan </strong>majors in molecular biology, microbiology and aquatic ecology, received his PhD degree at Institute of Hydrobiology, the Chinese Academy of Sciences (CAS) in 1998. Subsequently, he became an associate professor, then a full professor of Huazhong University of Science and Technology (HUST). From 2000 to 2007, he was appointed as a consultant scientist of the Department of Rural and Social Development of the Ministry of Science and Technology of China. Then, he returned his university as a full professor. Now, he is the vice dean of College of Life Science and Technology, HUST and deputy director of Key Laboratory of Molecular Biophysics of the Ministry of Education. His main research interests are molecular microbiology, bio-energy, biorefinery, synthetic biology, and aquatic ecology.</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- /speaker modal -->
  </div>
  <!-- /Speakers -->
</div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
        <script type="text/javascript" src="http://isr.tanta.edu.eg/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
        <script type="text/javascript">
          $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [
              "<i class='fa fa-caret-left'></i>",
              "<i class='fa fa-caret-right'></i>"
            ],
            autoplay: true,
            autoplayTimeout:2000, 
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 3
              },
              1000: {
                items: 4
              }
            }
        })
        </script>
<!-- Speakers End -->

            <div class="board col-md-6">
              <div class="clear20"></div>
                <div class="separator">
                    <h4>Under the Patronage of</h4>
                    <div class="sep_line"></div>
                </div>
                <div class="clear20"></div> 
                <div class="innerFullWidth">
                    <ul class="bullet2">
                        <li><p class="strong">Prof. Khaled A. Abd Elghafar</p> Minister of Higher Education and Research</li>
                        <li><p class="strong">Dr. Mohamed Shaker</p> Minister of Electricity and Renewable Energy </li>
                        <li><p class="strong">Dr. Hala El Saeed</p> Minister of Planning and Follow-Up and Reform Administrative </li>
                        <li><p class="strong">Dr. Mohamed Abdelaty</p> Minister of Water Resources and Irrigation </li>
                        <li><p class="strong">Dr. Yasmin S. Fouad</p> Minister of Environment </li>
                        <li><p class="strong">Eng. Tarek El Mulla</p> Minister of Petroleum </li>
                        <li><p class="strong">Ambassador/ Nabila Makram</p> Minister of Immigration and Egyptian Expatriates Affairs </li>
                        <li><p class="strong">Dr. Yasmine Fouad</p> Minister of Environment </li>
                        <li><p class="strong">Prof. Magdi A. Sabaa</p> President of Tanta University </li>
                    </ul>
                </div>
            </div>
            
            <div class="board col-md-6">
              <div class="clear20"></div>
                <div class="separator">
                    <h4>Conference Chair</h4>
                    <div class="sep_line"></div>
                </div>
                <div class="clear20"></div>
                <div class="innerFullWidth">
                    <ul class="bullet2">
                        <li><p class="strong">Prof. Mostafa M. El-Sheikh</p> Vice President of Tanta University for Post-Graduate Studies and Research</li>
                    </ul>
                </div>
            </div>

            <div class="board col-md-6">
                <div class="separator">
                    <h4>Conference Coordinator</h4>
                    <div class="sep_line"></div>
                </div>
                <div class="innerFullWidth">
                    <ul class="bullet2">
                        <li><p class="strong">Prof. Tarek A. Fayed</p> </li>
                    </ul>
                </div>
            </div>

            <div class="board col-md-6">
                <div class="separator">
                    <h4>External Conference Coordinator</h4>
                    <div class="sep_line"></div>
                </div>
                <div class="clear20"></div>
                <div class="innerFullWidth">
                    <ul class="bullet2">
                        <li><p class="strong">Prof. Eman M. Ghoneim</p> Director, Remote Sensing Research Lab., Wilmington-USA</li>
                    </ul>
                </div>
            </div>

            <div class="board col-md-6">
                
                <div class="separator">
                    <h4>Conference Secretary</h4>
                    <div class="sep_line"></div>
                </div>
                <div class="clear20"></div>
                <div class="innerFullWidth">
                    <ul class="bullet2">
                        <li><p class="strong">Prof. El-Refaie S. Kenawy</p> </li>
                        <li><p class="strong">Dr. Mohamed R. Berber</p> </li>
                        <li><p class="strong">Dr. Mohamed K. El-Nemr</p> </li>
                        <li><p class="strong">Dr. Diaa-Eldin A. Mansour</p> </li>
                    </ul>
                </div>
            </div>
   
<!-- Sponsers-->
        <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
  <div class="clear20"></div>
    <div class="separator">
        <h4>Sponsers</h4>
        <div class="sep_line"></div>
    </div>
    <div class="clear20"></div>
    <!-- Sponsers -->
  <div id="Sponsers" class="section">

    <!-- container -->
    <div class="container" style="width: 1000px;">
      <!-- row -->
      <div class="row">
      <table class="padding-table-columns">
        <tr>
          <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/spon_0.jpeg')}}" height="115" width="115" alt=""></a>
            </div>
          </div>
        </div>
        </td>
          <td>
         <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/spon_1.jpg')}}" height="100" width="200" alt=""></a>
            </div>
          </div>
        </div>
      </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/spon_2.jpg')}}" height="100" width="100" alt=""></a>
            </div>
          </div>
        </div>
        </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/spon_3.jpg')}}" height="100" width="200" alt=""></a>
            </div>
          </div>
        </div>
        </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/spon_4.jpg')}}" height="100" width="100" alt=""></a>
            </div>
          </div>
        </div>
      </td>
      </tr>
      </table>

        </div>
      <!-- /row -->
<!-- row -->
      <div class="row">
      <table class="padding-table-columns">
        <tr>
          <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/sponser_n0.jpeg')}}" height="100" width="100" alt=""></a>
            </div>
          </div>
        </div>
        </td>
          <td>
         <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/sponser_n1.jpg')}}" height="100" width="200" alt=""></a>
            </div>
          </div>
        </div>
      </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/sponser_n2.jpg')}}" height="100" width="100" alt=""></a>
            </div>
          </div>
        </div>
        </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/sponser_n3.jpg')}}" height="100" width="200" alt=""></a>
            </div>
          </div>
        </div>
        </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/sponser_n4.png')}}" height="110" width="110" alt=""></a>
            </div>
          </div>
        </div>
      </td>
      <td>
        <div class="item">
          <div class="sponser">
            <div class="sponser-img">
              <a href="sponser"><img src="{{URL::asset('image/common/sponser_n5.jpeg')}}" height="100" width="130" alt=""></a>
            </div>
          </div>
        </div>
      </td>
      </tr>
      </table>

        </div>
      <!-- /row -->


    </div>
    <!-- /container -->

    </div>
  <!-- /Sponsers -->
</div>

 <div class="clear20"></div>

        </div><!-- end main wrap -->
        <!-- <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script> -->
        @endsection