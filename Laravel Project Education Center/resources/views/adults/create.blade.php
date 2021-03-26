@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">  
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
.state-icon {
    left: -5px;
}
/*.form-horizontal .form-group .radio{
  float: right;
}*/
.list-group-item-primary {
    color: rgb(255, 255, 255);
    background-color: rgb(66, 139, 202);
}

/* DEMO ONLY - REMOVES UNWANTED MARGIN */
.well .list-group {
    margin-bottom: 0px;
}

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
  <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> إستمارة التسجيل للكبار </h3>
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


<form role="form" action="{{ route('adults.store') }}" method="POST" class="form-horizontal mt-10">
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
      <div class="form-group @if($errors->has('national_id')) has-error @endif">
        <label class="control-label" for="national_id-field">الرقم القومي<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="national_id-field" name="national_id" class="form-control" value="{{ old('national_id') }}"/>
             @if($errors->has("national_id"))
              <span class="help-block">{{ $errors->first('national_id') }}</span>
             @endif
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
      <div class="form-group">
        <label class="control-label" for="gender-field">النوع<span class="asterisk"> *</span></label>
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
      <div class="form-group">
        <label class="control-label" for="how_know-field">كيف توصلت إلينا؟</label>
        <div class="col-sm-10">
          <select id="how_know-field" name="how_know" class="form-control" >
            <option value="0">كيف توصلت إلينا</option>
              @if(count($howKnows)>0)
                  @foreach($howKnows as $howKnow)
                    <option value="{{$howKnow->id}}" @if(old('how_know')==$howKnow->id) selected @endif>
                    {{$howKnow->name}}</option>
                  @endforeach
              @endif
          </select>
        </div>
      </div>
      <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
    </div>
  </div>
  <div class="row setup-content" id="step-2">
    <div class="form-body col-xs-8 col-md-offset-2">
      <h3>المعلومات الشخصية</h3>
      <div class="form-group @if($errors->has('address')) has-error @endif">
        <label class="control-label" for="address-field">العنوان<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="address-field" name="address" class="form-control" value="{{ old('address') }}"/>
           @if($errors->has("address"))
            <span class="help-block">{{ $errors->first('address') }}</span>
           @endif
        </div> 
      </div>
      <div class="form-group @if($errors->has('city')) has-error @endif">
        <label class="control-label" for="city-field">المدينه<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="city-field" name="city" class="form-control" value="{{ old('city') }}"/>
           @if($errors->has("city"))
            <span class="help-block">{{ $errors->first('city') }}</span>
           @endif
        </div> 
      </div>
      <div class="form-group @if($errors->has('mobile1')) has-error @endif">
        <label class="control-label" for="mobile1-field"> رقم الهاتف المحمول<span class="asterisk"> *</span></label>
        <div class="col-sm-10">
          <input required type="text" id="mobile1-field" name="mobile1" class="form-control" value="{{ old('mobile1') }}"/>
           @if($errors->has("mobile1"))
            <span class="help-block">{{ $errors->first('mobile1') }}</span>
           @endif
        </div>           
      </div>
      <div class="form-group @if($errors->has('mobile2')) has-error @endif">
        <label class="control-label" for="mobile2-field">رقم محمول بديل </label>
        <div class="col-sm-10">
          <input type="text" id="mobile2-field" name="mobile2" class="form-control" value="{{ old('mobile2') }}"/>
           @if($errors->has("mobile2"))
            <span class="help-block">{{ $errors->first('mobile2') }}</span>
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
      <div  class="form-group">
        <label class="control-label" for="job_status-field">الحالة الوظيفية</label>
        <div class="col-sm-10">
          <select id="job_status-field" name="job_status" class="form-control" value="{{ old('job_status') }}">      
            @if($jobs->count() >0 )
              @foreach($jobs as $job)
                <option value="{{$job->id}}">{{$job->name}}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="work-field">حالة وظيفية أخرى / طالب في</label>
        <div class="col-sm-10">
          <input type="text" id="work-field" name="work" class="form-control" value="{{ old('work') }}"/>
        </div>
      </div>
      <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3>البرنامج الذي تود اجتيازه</h3>
        <div class="form-group @if($errors->has('program_id')) has-error @endif">
        <label class="control-label">برامج Ugrow المتاحه<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            @foreach($programs as $program)
              <div class="rdio rdio-theme">
                <input id="rdio-{{$program->id}}" type="radio" value="{{$program->id}}" name="program_id" @if(old('program_id')==$program->id) checked @endif/>
                <label for="rdio-{{$program->id}}">{{$program->course->name}}</label>
              </div>
            @endforeach 
            @if($errors->has("program_id"))
            <span class="help-block">{{ $errors->first('program_id') }}</span>
            @endif  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="goals-field">الأهداف المرجوه من البرنامج</label>
          <div class="col-sm-10">
            <textarea class="form-control " id="goals-field" rows="3" name="goals">{{ old("goals") }}</textarea>
          </div>
        </div>
        <button class="btn btn-success btn-lg pull-left" type="submit">تسجيل</button>
      </div>
    </div>
  </form>
</div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
   $('#birthdate-field').datepicker({
    });
/*
    $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
*/

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
});


  </script>
@endsection