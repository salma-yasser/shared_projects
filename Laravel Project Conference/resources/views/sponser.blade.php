@extends('layouts.app')

@section('content')
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
                        <a href="welcome" class="item">Welcome Message</a>
                        <a href="committee" class="item">Committee</a>
                        <a href="scientific_committee" class="item">Scientific Committee</a>
                        <a href="overview" class="item">Overview</a>
                        <a href="topic" class="item">Conference Topics</a>
                        <a href="venue" class="item">Venue</a>
                        <a href="sponser" class="item left_on">Sponsers</a>
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
                    <td><div style="text-align:left;padding-bottom:20px;"><div><h1 style="font-weight: bold; color: #666;">Sponsers</h1></div></div></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
                <td valign="top">
<p style="font-family: calibri; font-size: 18px; color: #666; line-height: 23px;">
<table width="95%" border="0" cellpadding="10" cellspacing="0" align="left"><tbody>
<tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>الجهاز القومي لتنظيم الاتصالات</strong></span><br>
        <br/><strong>المهام والأهداف: </strong><br/>
      توقع وقيادة إصلاح سوق الاتصالات وتطوير صناعة الاتصالات مع الحفاظ على التوازن المطلوب بين جميع الأطراف المعنية ومختلف أصحاب المصالح وفقا لقواعد وأسس عادلة والحرص على حماية حقوق المستخدمين</p></td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/spon_1.jpg" width="200" height="100" style="position: absolute;"></td>
      </tr>
      <tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>نقابة المهن العلمية</strong></span><br>
        <br/>النقابة كأحد مؤسسات المجتمع تقوم بعدة أدوار يمكن إيجازها فى ثلاث محاور هي :-
        <br/><strong>أولاً الدور النقابي:</strong><br/></p>
        <ul style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;">
          <li style="list-style: inside; padding-right: 30px;">يصرف حافز العلميين للسادة العلميين العاملين بالحكومة والقطاع العام</li>
          <li style="list-style: inside; padding-right: 30px;">شهادات الخبرة وشهادة الاستشاري للسادة الأعضاء</li>
        </ul>
        <p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;">
        <strong>ثانياً الدور الخدمي: </strong>إعلاء مكانة العلميين لتكون سائدة<br/>
        <strong>ثالثاً الدور القومي: </strong>بناء منظومة علمية نهضوية واعدة
      </p></td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/spon_2.jpg" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
      <tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>نقابة العلميين وسط الدلتا</strong></span><br>
        <br/>النقابة كأحد مؤسسات المجتمع تقوم بعدة أدوار يمكن إيجازها فى ثلاث محاور هي :- 
        <br/><strong>أولاً الدور النقابى:</strong><br/></p>
        <ul style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;">
          <li style="list-style: inside; padding-right: 30px;">يصرف حافز العلميين للسادة العلميين العاملين بالحكومة والقطاع العام</li>
          <li style="list-style: inside; padding-right: 30px;">شهادات الخبرة وشهادة الاستشاري للسادة الأعضاء.</li>
        </ul>
        <p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;">
        <strong>ثانياً الدور الخدمي:</strong> إعلاء مكانة العلميين لتكون سائدة<br/>
        <strong>ثالثاً الدور القومي:</strong> بناء منظومة علمية نهضوية واعدة
      </p></td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/spon_3.jpg" width="200" height="100" style="position: absolute;"></td>
      </tr>
      <tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>بدائل للطاقة الشمسية والمتجددة</strong></span><br>
        <br/><strong>النشاط:</strong></p>
        <ul style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;">
          <li style="list-style: inside; padding-right: 30px;">عمل محطات طاقة شمسية</li>
          <li style="list-style: inside; padding-right: 30px;">عمل أنظمة الطاقة الشمسية off grid </li>
          <li style="list-style: inside; padding-right: 30px;">عمل مضخات ميام solar pump</li>
          <li style="list-style: inside; padding-right: 30px;">عمل سخانات شمسية</li>
        </ul></td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/spon_4.jpg" width="110" height="110" style="position: absolute;margin-left: 60px;"></td>
      </tr>
<tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>الهيئة العربية للتصنيع</strong></span><br><br>
               الهيئة العربية للتصنيع هي إحدى ركائز الصناعة العسكرية في مصر، حيث تشرف على تسعة مصانع عسكرية تنتج سلع مدنية وكذلك منتجات عسكرية. وتنفرد بكونها الأولى من نوعها من حيث تصنيع الطائرات فى مصر والوطن العربىفضلا عن تصميم وتصنيع العربات المدرعة "فهد" والعربات العسكرية "جيب" والعديد من الأسلحة والصواريخ
<br>
وتقوم الهيئة بإنتاج محطات تحلية مياه البحر و تنقية مياه الشرب ومعالجة مياه الآبار والصرف الصحى والصرف الصناعى ، كذلك تصنيع معدات توليد الكهرباء باستخدام الطاقة المتجددة (الطاقة الشمسية / طاقة الرياح) ، والمعدات والأجهزة الإلكترونية كشاشات العرض العملاقة بالطرق السريعة والإستادات و شاشات  SMART / 3D) LED) و أجهزة التابلت
</td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/sponser_n1.jpg" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
<tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px; margin-bottom: 40px;"><span style="font-size: 17px; color: #d16819"><strong>نقابة المهندسين بالغربية</strong></span><br><br>
نقابة المهندسين بالغربيه تعتبر الهيئة الممثلة للمهندسين بالغربيه وتعتبر هيئة استشارية للدولة فى مجال تخصصها ومقرها بطنطا </td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/sponser_n2.jpg" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
<tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>شركة قناة السويس للتأمين</strong></span><br><br>
              تحقق الشركة النموذج الامثل والخبرة الشاملة في تقديم الخدمات التأمينية المتميزة للمشروعات القومية ومشروعات القطاع الخاص و الإستثمارى وغيرهم 
<br>
دعما وحرصا على سلامة الاقتصاد القومي لتحقيق أعلى درجات النجاح والتفوق وتقوم الشركة بمزاولة عمليات التأمين وإعادة التأمين لمختلف أنواع التأمين مثل:- الحريق ، النقل البحري ، النقل الداخلي ، أجسام السفن( الوحدات بحرية) ، الحوادث المتنوعة ، الهندسي ، السيارات التكميلي.</td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/sponser_n3.jpg" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
<tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;"><span style="font-size: 17px; color: #d16819"><strong>شركة قناة السويس لتأمينات الحياة</strong></span><br><br>قوم شركة قناة السويس لتأمينات الحياة من خلال شبكة متكاملة من الفروع والوكلاء بمد خدماتها إلى مختلف أنحاء الجمهورية وذلك بأحدث الأساليب 
<br>التقنية في الإصدار وتسوية التعويضات مع إعتماد المزيد من الوثائق الجديدة التي تخدم العملاء بمختلف شرائحهم دعماً لصناعة سوق التأمين المصري وفي خدمة أقتصادنا الوطني .</td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/sponser_n4.png" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>

      <tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;padding-top: 55px;
    padding-bottom: 25px;
"><span style="font-size: 17px; color: #d16819"><strong>قطاع شؤن خدمة المجتمع والبيئة جامعة طنطا</strong></span><br><br>
        </td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/spon_0.jpeg" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
        <tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;padding-top: 55px;
    padding-bottom: 25px;
"><span style="font-size: 17px; color: #d16819"><strong>مؤسسة مصر الخير</strong></span><br><br>
        </td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/sponser_n0.jpeg" width="100" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
      <tr>
       
        <td width="75%" valign="center" style="direction: rtl;border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd;"><p style="font-family: calibri; font-size: 17px; color: #666; line-height: 23px;margin-right: 15px;padding-top: 55px;
    padding-bottom: 25px;
"><span style="font-size: 17px; color: #d16819"><strong>نقابة المهندسين بالغربية</strong></span><br><br>
        </td>
       <td width="25%" valign="center" style="border-bottom : 1px solid #dedcdd; border-top : 1px solid #dedcdd; padding-top: 15px;"><img src="image/common/sponser_n5.jpeg" width="130" height="100" style="position: absolute;margin-left: 60px;"></td>
      </tr>
</tbody>
</table></p>
</td>
              </tr>


</tbody>
</table></p>
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
@endsection