@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="/assets/global/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet">
  <link href="/assets/global/plugins/bower_components/jasny-bootstrap-fileinput/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.min.css') }}" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
.rdio label {
  padding-right: 25px;
}
.rdio label:before{
  right: 0px;
}
.rdio input[type=radio]:checked + label::after{
  right: 5px;
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
  <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> New Adult Application </h3>
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
    </div>
  </div>
  
  <form role="form" action="{{ route('adult.application.store') }}" method="POST" class="form-horizontal mt-10">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
    <div class="row setup-content" id="step-1">
    <div class="form-body col-xs-8 col-md-offset-2">
      <h3>المعلومات الشخصية</h3>
      
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
      
      <div class="form-group @if($errors->has('email')) has-error @endif">
        <label class="control-label" for="email-field">البريد الإلكتروني<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="email-field" name="email" class="form-control" value="{{ old('email') }}" placeholder="example@domain.com" style="direction: ltr"/>
             @if($errors->has("email"))
              <span class="help-block">{{ $errors->first('email') }}</span>
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
      
      <div class="form-group @if($errors->has('address')) has-error @endif">
        <label class="control-label" for="address-field">العنوان<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="address-field" name="address" class="form-control" value="{{ old('address') }}"/>
           @if($errors->has("address"))
            <span class="help-block">{{ $errors->first('address') }}</span>
           @endif
        </div> 
      </div>
      
      <div class="form-group @if($errors->has('mobile')) has-error @endif">
        <label class="control-label" for="mobile-field"> رقم الهاتف المحمول<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="mobile-field" name="mobile" class="form-control" value="{{ old('mobile') }}"/>
           @if($errors->has("mobile"))
            <span class="help-block">{{ $errors->first('mobile') }}</span>
           @endif
        </div>           
      </div>
      
      <div class="form-group @if($errors->has('phone')) has-error @endif">
        <label class="control-label" for="phone-field">رقم الهاتف الأرضي</label>
        <div class="col-sm-10">
          <input type="text" id="phone-field" name="phone" class="form-control" value="{{ old('phone') }}"/>
           @if($errors->has("phone"))
            <span class="help-block">{{ $errors->first('phone') }}</span>
           @endif
        </div>
      </div>

      <div class="form-group @if($errors->has('qualification')) has-error @endif">
        <label class="control-label" for="qualification-field">المؤهل<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="qualification-field" name="qualification" class="form-control" value="{{ old('qualification') }}"/>
          @if($errors->has("qualification"))
            <span class="help-block">{{ $errors->first('qualification') }}</span>
           @endif
        </div>
      </div>

      <div class="form-group">
        <label class="control-label" for="work-field">الوظيفة الحالية</label>
        <div class="col-sm-10">
          <input type="text" id="work-field" name="work" class="form-control" value="{{ old('work') }}"/>
        </div>
      </div>

      <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
    </div>
  </div>

  <div class="row setup-content" id="step-2">
    <div class="form-body col-xs-8 col-md-offset-2">
      <h3> البرامج المستهدفه</h3>
      
      <div class="form-group">
        <div class="col-sm-10" style="direction: ltr;">
          <select data-placeholder="إختر البرامج المفضله" name="courses[]" multiple class="chosen-select chosen-rtl mb-15" tabindex="4" >
            @if(is_null(old('courses[]'))) <!--New Form-->
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
  

  <div class="row setup-content" id="step-3">
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