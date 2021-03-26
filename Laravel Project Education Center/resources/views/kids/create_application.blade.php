@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="/assets/global/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet">
  <link href="/assets/global/plugins/bower_components/jasny-bootstrap-fileinput/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.min.css') }}" />
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
.ckbox label,.rdio label {
  padding-right: 25px;
}
.ckbox label:before,.rdio label:before{
  right: 0px;
}
.rdio input[type=radio]:checked + label::after{
  right: 5px;
}
.ckbox input[type=checkbox]:checked + label::after{
  right: 0px;
}
/************************************************/
      .stepwizard-step p {
        margin-top: 10px;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 50%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
  </style>
@endsection
@section('header')
  <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i>New Kids Application </h3>
@endsection

@section('content')
  @include('error')

  <div class="stepwizard col-md-offset-3 pull-left">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
      </div>
      <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
      </div>
      <div class="stepwizard-step">
        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
      </div>
      <div class="stepwizard-step">
        <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
      </div>
    </div>
  </div>
  
  <form role="form" action="{{ route('kid.application.store') }}" method="POST" class="form-horizontal mt-10">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="row setup-content" id="step-1">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3>بيانات العميل</h3>
        
        <div class="form-group @if($errors->has('name')) has-error @endif">
          <label class="control-label" for="name-field">الإسم <span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="name-field" name="name" class="form-control" value="{{ old('name') }}"/>
               @if($errors->has("name"))
                <span class="help-block">{{ $errors->first('name') }}</span>
               @endif
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="gender-field">النوع</label>
          <div class="col-sm-10">
            <div class="rdio rdio-theme circle radio-inline">
              <input id="radio-male" type="radio" name="gender" value="Male" checked>
              <label for="radio-male">ذكر</label>
            </div>
            <div class="rdio rdio-theme circle radio-inline">
              <input id="radio-female" type="radio" name="gender" value="Female" @if(old('gender')=='Female') checked @endif>
              <label for="radio-female">أنثى</label>  
            </div>
          </div>
        </div>
      
        <div class="form-group  @if($errors->has('birthdate')) has-error @endif" >
          <label class="control-label" for="birthdate-field">تاريخ الميلاد<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="birthdate-field" name="birthdate" data-date-format="yyyy-m-dd" class="form-control datepicker" value="{{ old('birthdate') }}" />
               @if($errors->has("birthdate"))
                <span class="help-block">{{ $errors->first('birthdate') }}</span>
               @endif
          </div>
        </div>
      
        <div class="form-group @if($errors->has('nationality')) has-error @endif">
          <label class="control-label" for="nationality-field">الجنسية<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="nationality-field" name="nationality" class="form-control" value="{{ old('nationality') }}"/>
               @if($errors->has("nationality"))
                <span class="help-block">{{ $errors->first('nationality') }}</span>
               @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('school_name')) has-error @endif">
          <label class="control-label" for="school_name-field">إسم المدرسة<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="school_name-field" name="school_name" class="form-control" value="{{ old("school_name") }}"/>
             @if($errors->has("school_name"))
              <span class="help-block">{{ $errors->first("school_name") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="school_type">نوع المدرسة<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <div class="rdio rdio-theme circle radio-inline">
              <input id="radio-public" type="radio" name="school_type" value="Public" checked>
              <label for="radio-public">حكومية</label>
            </div>
            <div class="rdio rdio-theme circle radio-inline">
              <input id="radio-private" type="radio" name="school_type" value="Private" @if(old('school_type')=='Private') checked @endif>
              <label for="radio-private">خاصة</label>  
            </div>
          </div>
        </div>  
        
        <div class="form-group">
          <label class="control-label" for="school_address-field">عنوان المدرسة</label>
          <div class="col-sm-10">
            <input type="text" id="school_address-field" name="school_address" class="form-control" value="{{ old("school_address") }}"/>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="year-field">العام<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="year-field" name="school_year" class="form-control" value="{{ old("school_year") }}"/>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="school-level-field">الصف الدراسي الحالي<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="school-level-field" name="school_level" class="form-control" value="{{ old("school_level") }}"/>
          </div>
        </div>
        
        <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>

    <div class="row setup-content" id="step-2">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3>ولي الأمر</h3>
      
        <div class="form-group @if($errors->has('parent_name')) has-error @endif">
          <label class="control-label" for="parent-name-field">إسم ولي الأمر<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="parent-name-field" name="parent_name" class="form-control" value="{{ old("parent_name") }}"/>
               @if($errors->has("parent_name"))
                <span class="help-block">{{ $errors->first("parent_name") }}</span>
               @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('relative')) has-error @endif">
          <label class="control-label" for="relative-field">درجة القرابة<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="relative-field" name="relative" class="form-control" value="{{ old("relative") }}"/>
             @if($errors->has("relative"))
              <span class="help-block">{{ $errors->first("relative") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('parent_mobile1')) has-error @endif">
          <label class="control-label" for="mobile1-field">رقم الهاتف<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="mobile1-field" name="parent_mobile1" class="form-control" value="{{ old("parent_mobile1") }}"/>
             @if($errors->has("parent_mobile1"))
              <span class="help-block">{{ $errors->first("parent_mobile1") }}</span>
             @endif
          </div>
        </div>
      
        <div class="form-group @if($errors->has('parent_mobile2')) has-error @endif">
          <label class="control-label" for="mobile2-field">رقم هاتف أخر</label>
          <div class="col-sm-10">
            <input type="text" id="mobile2-field" name="parent_mobile2" class="form-control" value="{{ old("parent_mobile2") }}"/>
             @if($errors->has("parent_mobile2"))
              <span class="help-block">{{ $errors->first("parent_mobile2") }}</span>
             @endif
          </div>
        </div>
  
        <div class="form-group @if($errors->has('phone_parent')) has-error @endif">
          <label class="control-label" for="phone-field">رقم المنزل</label>
          <div class="col-sm-10">
            <input type="text" id="phone-field" name="phone_parent" class="form-control" value="{{ old("phone_parent") }}"/>
             @if($errors->has("phone_parent"))
              <span class="help-block">{{ $errors->first("phphone_parentone") }}</span>
             @endif
          </div>
        </div>
  
        <div class="form-group @if($errors->has('address_parent')) has-error @endif">
          <label class="control-label" for="address-parent-field">العنوان<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="address-parent-field" name="address_parent" class="form-control" value="{{ old("address_parent") }}"/>
             @if($errors->has("address_parent"))
              <span class="help-block">{{ $errors->first("address_parent") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('email_parent')) has-error @endif">
         <label class="control-label" for="email-parent-field">البريد الإلكتروني</label>
         <div class="col-sm-10">
            <input type="text" id="email-parent-field" name="email_parent" class="form-control" value="{{ old('email_parent') }}" placeholder="example@domain.com" style="direction: ltr"/>
             @if($errors->has("email_parent"))
              <span class="help-block">{{ $errors->first("email_parent") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="work-parent-field">الوظيفة الحالية</label>
          <div class="col-sm-10">
            <input type="text" id="work-parent-field" name="work_parent" class="form-control" value="{{ old('work_parent') }}"/>
          </div>
        </div>

        <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>

    <div class="row setup-content" id="step-3">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3>وكيل ولي الامر </h3>
    
        <div class="form-group @if($errors->has('parent_name_2')) has-error @endif">
          <label class="control-label" for="parent-name-2-field">إسم ولي الأمر</label>
          <div class="col-sm-10">
            <input type="text" id="parent-name-2-field" name="parent_name_2" class="form-control" value="{{ old("parent_name_2") }}"/>
               @if($errors->has("parent_name_2"))
                <span class="help-block">{{ $errors->first("parent_name_2") }}</span>
               @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('relative_2')) has-error @endif">
          <label class="control-label" for="relative-2-field">درجة القرابة</label>
          <div class="col-sm-10">
            <input type="text" id="relative-2-field" name="relative_2" class="form-control" value="{{ old("relative_2") }}"/>
             @if($errors->has("relative_2"))
              <span class="help-block">{{ $errors->first("relative_2") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('parent_mobile1_2')) has-error @endif">
          <label class="control-label" for="mobile1-2-field">رقم الهاتف</label>
          <div class="col-sm-10">
            <input type="text" id="mobile1-2-field" name="parent_mobile1_2" class="form-control" value="{{ old("parent_mobile1_2") }}"/>
             @if($errors->has("parent_mobile1_2"))
              <span class="help-block">{{ $errors->first("parent_mobile1_2") }}</span>
             @endif
          </div>
        </div>
      
        <div class="form-group @if($errors->has('parent_mobile2_2')) has-error @endif">
          <label class="control-label" for="mobile2-2-field">رقم هاتف أخر</label>
          <div class="col-sm-10">
            <input type="text" id="mobile2-2-field" name="parent_mobile2_2" class="form-control" value="{{ old("parent_mobile2_2") }}"/>
             @if($errors->has("parent_mobile2_2"))
              <span class="help-block">{{ $errors->first("parent_mobile2_2") }}</span>
             @endif
          </div>
        </div>
        
        <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>

    <div class="row setup-content" id="step-4">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3> البرامج المستهدفه</h3>
        
        <div class="form-group">
          <div class="col-sm-10" style="direction: ltr;">
            <select data-placeholder="إختر البرامج المفضله" name="courses[]" multiple class="chosen-select chosen-rtl mb-15" tabindex="4" >
              @if(old('courses[]') == null ) <!--New Form-->
                @foreach($courses as $course)
                  <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
              @else
                @foreach($courses as $course)
                  <option value="{{$course->id}}" @if(in_array($course->id,old('courses[]'))) selected @endif>{{$course->name}}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label">أخرى</label>
          <div class="col-sm-10">
            <input id="other-field" name="other" type="text" maxlength="100" class="form-control" value="{{ old('other') }}"/>
          </div>
        </div>

        <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>

    <div class="row setup-content" id="step-5">
      <div class="form-body col-xs-8 col-md-offset-2">
          <h3>مواعيد مقترحة<h3>
        
          <div class="form-group">
            <label class="control-label">أيام</label>
            <div class="col-sm-10">
              <div class="ckbox ckbox-theme checkbox-inline">
                <input id="ckbox-day1" type="checkbox" name="day" value="day1">
                <label for="ckbox-day1">السبت - الثلاثاء</label>
              </div>
              <div class="ckbox ckbox-theme checkbox-inline">
                <input id="ckbox-day2" type="checkbox" name="day" value="day2">
                <label for="ckbox-day2">الأحد - الأربعاء</label>
              </div>
              <div class="ckbox ckbox-theme checkbox-inline">
                <input id="ckbox-day3" type="checkbox" name="day" value="day3">
                <label for="ckbox-day3">الأثنين - الخميس</label>
              </div>
            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label">أوقات</label>
            <div class="col-sm-10">
              <div class="ckbox ckbox-theme checkbox-inline">
                <input id="ckbox-time1" type="checkbox" name="time" value="time1">
                <label for="ckbox-time1">من الساعة 4 الى الساعة 6 مساءا</label>
              </div>
              <div class="ckbox ckbox-theme checkbox-inline">
                <input id="ckbox-time2" type="checkbox" name="time" value="time2">
                <label for="ckbox-time2">من الساعة 6 الى الساعة 8 مساءا</label>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label">ملاحظات ترغب في ذكرها عن الطالب (حركية - نفسيه - صحية - ............)</label>
            <div class="col-sm-10">
              <textarea id="notes-field" name="notes" rows="5" class="form-control"></textarea>
            </div>
          </div>
          
          <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
        </div>
      </div>

    <div class="row setup-content" id="step-6">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3> الدورات السابقة</h3>
        
        <div class="form-group">
          <label class="control-label">هل قمت بإجتياز دروات سابقه؟</label>
          <div class="col-sm-10">
            <div class="rdio rdio-theme circle radio-inline">
                <input id="radio-no" type="radio" name="courses_before" value="No" checked class="no-courses-before">
                <label for="radio-no">لا</label>
            </div>
            <div class="rdio rdio-theme circle radio-inline">
                <input id="radio-yes" type="radio" name="courses_before" value="Yes" class="yes-courses-before" @if(old('courses_before')=='Yes') checked @endif>
                <label for="radio-yes">نعم</label>
            </div>
          </div>
        </div>

        <div class="form-group courses-before-details">
          <label class="control-label">إسم الدورة</label>
          <div class="col-sm-10">
            <input id="course_name-field" name="course_name" type="text" maxlength="100" class="form-control" value="{{ old('course_name') }}"/>
          </div>
        </div>
        
        <div class="form-group courses-before-details">
          <label class="control-label">المستوى</label>
          <div class="col-sm-10">
            <input id="leve-field" name="level" type="text" maxlength="100" class="form-control" value="{{ old('level') }}"/>
          </div>
        </div>

        <div class="form-group courses-before-details">
          <label class="control-label">المكان</label>
          <div class="col-sm-10">
            <input id="place-field" name="place" type="text" maxlength="100" class="form-control" value="{{ old('place') }}"/>
          </div>
        </div>

        <button class="btn btn-success btn-lg pull-left" type="submit">تسجيل</button>
      </div>
    </div>
  </form>
  
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ URL::asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.jquery.min.js') }}"></script>
  <script>
      if($('.chosen-select').length){
          $('.chosen-select').chosen();
      }
  </script>
  <script>
    $('#birthdate-field').datepicker({
    });
  </script>
  <script>
    $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    //Check if customer take courses before
    if($('.yes-courses-before').attr('checked')){
      $('.courses-before-details').show();
    }else{
       $('.courses-before-details').hide();
    }
    $('.no-courses-before').change(function(){
       $('.courses-before-details').hide();
    });
    $('.yes-courses-before').change(function(){
       $('.courses-before-details').show();
    });
    //End Check
  });
</script>
@endsection