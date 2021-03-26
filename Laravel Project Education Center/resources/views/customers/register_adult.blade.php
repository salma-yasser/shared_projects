@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">

@endsection
@section('header')
  <i class="glyphicon glyphicon-plus"></i> New Customers
@endsection

@section('content')
    @include('error')


<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>


<form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 1</h3>
          <div class="form-group">
            <label class="control-label">First Name</label>
            <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
          </div>
          <div class="form-group">
            <label class="control-label">Last Name</label>
            <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Address</label>
            <textarea required="required" class="form-control" placeholder="Enter your address" ></textarea>
          </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 2</h3>
          <div class="form-group">
            <label class="control-label">Company Name</label>
            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Company Address</label>
            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
          </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 3</h3>
          <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
  
</div>
<!--


    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">بيانات الطالب الأساسية</a></li>
        <li><a href="#tab2" data-toggle="tab">بيانات للطالب البالغين</a></li>
        <li><a href="#tab3" data-toggle="tab">بينات البرنامج المراد</a></li>
    </ul>
    <div class="tab-content">

         


        <div class="tab-pane active" id="tab1">
           <form action="{{ URL::asset('customers_adult) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label class="col-sm-2 control-label" for="name-field">الإسم</label>
                    <input type="text" id="name-field" name="name" class="form-control txt-new" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label class="col-sm-2 control-label" for="email-field">البريد الإلكتروني</label>
                    <input type="text" id="email-field" name="email" class="form-control txt-new" value="{{ old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('nationality')) has-error @endif">
                       <label class="col-sm-2 control-label" for="nationality-field">الجنسية</label>
                    <input type="text" id="nationality-field" name="nationality" class="form-control txt-new" value="{{ old("nationality") }}"/>
                       @if($errors->has("nationality"))
                        <span class="help-block">{{ $errors->first("nationality") }}</span>
                       @endif
                    </div>

                      <div class="form-group @if($errors->has('national_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="national_id-field">الرقم القومي</label>
                    <input type="text" id="national_id-field" name="national_id" class="form-control txt-new" value="{{ old("national_id") }}"/>
                       @if($errors->has("national_id"))
                        <span class="help-block">{{ $errors->first("national_id") }}</span>
                       @endif
                    </div>

                    <div class="form-group  @if($errors->has('birthdate')) has-error @endif" >
                       <label class="col-sm-2 control-label" for="birthdate-field">تاريخ الميلاد</label>
                    <input type="text" id="birthdate-field" name="birthdate" data-date-format="yyyy-m-dd" class="form-control datepicker txt-new " value="{{ old("birthdate") }}" />
                  
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label class="col-sm-2 control-label" for="gender-field">الجنس</label>
                    <select id="gender-field" name="gender" class="form-control txt-new" >
                          <option value="0">إختر النوع</option>

                    <option value="Male">ذكر</option>
                    <option value="Female">أنثي</option>
                    </select>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                   
                 <div class="form-group @if($errors->has('how_know')) has-error @endif">
                       <label class="col-sm-2 control-label" for="how_know-field">كيف توصلت إلينا</label>
                    <select id="how_know-field" name="how_know" class="form-control txt-new" >
                          <option value="0">كيف توصلت إلينا</option>

                      @if(count($howKnows)>0)
                          @foreach($howKnows as $howKnow)
                            <option value="{{$howKnow->id}}">{{$howKnow->name}}</option>

                          @endforeach

                       @endif

                    </select>
                       @if($errors->has("how_know"))
                        <span class="help-block">{{ $errors->first("how_know") }}</span>
                       @endif
                    </div>
  


                     <div class="form-group @if($errors->has('type')) has-error @endif">
                       <label class="col-sm-2 control-label" for="type-field">نوع المتقدم من حيث السن </label>
                        <select id="type-field" name="type" class="form-control txt-new" value="{{ old('type') }}" data-style="btn-success">
                          <option value="0">اختار النوع</option>
                          <option value="1">شخص بالغ</option>
                          <option value="2">طفل</option>
                        </select>
                       @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                       @endif
                    </div>

           


            <a class="btn btn-primary btnNext" >التالي</a>
        </div>
        <div class="tab-pane" id="tab2">



        <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label class="col-sm-2 control-label" for="address-field">Address</label>
                    <input type="text" id="address-field" name="address" class="form-control txt-new" value="{{ old("address") }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile1')) has-error @endif">
                       <label class="col-sm-2 control-label" for="mobile1-field"> First Mobile No. </label>
                    <input type="text" id="mobile1-field" name="mobile1" class="form-control txt-new" value="{{ old("mobile1") }}"/>
                       @if($errors->has("mobile1"))
                        <span class="help-block">{{ $errors->first("mobile1") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile2')) has-error @endif">
                       <label class="col-sm-2 control-label" for="mobile2-field">Second Mobile No. </label>
                    <input type="text" id="mobile2-field" name="mobile2" class="form-control txt-new" value="{{ old("mobile2") }}"/>
                       @if($errors->has("mobile2"))
                        <span class="help-block">{{ $errors->first("mobile2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label class="col-sm-2 control-label" for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control txt-new" value="{{ old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label class="col-sm-2 control-label" for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control txt-new" value="{{ old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('job_status')) has-error @endif">
                       <label class="col-sm-2 control-label" for="job_status-field">Job_status</label>
                    <select id="job_status-field" name="job_status" class=" selectpicker txt-new" value="{{ old("job_status") }}">
                      
                      @if($jobs->count() >0 )

                        @foreach($jobs as $job)
                          <option value="{{$job->id}}">{{$job->name}}</option>
                        @endforeach
                        @endif
                    </select>
                       @if($errors->has("job_status"))
                        <span class="help-block">{{ $errors->first("job_status") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('work')) has-error @endif">
                       <label class="col-sm-2 control-label" for="work-field">Work</label>
                    <input type="text" id="work-field" name="work" class="form-control txt-new" value="{{ old("work") }}"/>
                       @if($errors->has("work"))
                        <span class="help-block">{{ $errors->first("work") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('qualification')) has-error @endif">
                       <label class="col-sm-2 control-label" for="qualification-field">qualification</label>
                    <input type="text" id="qualification-field" name="qualification" class="form-control txt-new" value="{{ old("qualification") }}"/>
                       @if($errors->has("qualification"))
                        <span class="help-block">{{ $errors->first("qualification") }}</span>
                       @endif
                    </div>
            <a class="btn btn-primary btnNext" >التالي</a>
            <a class="btn btn-primary btnPrevious" >السابق</a>
        </div>
        <div class="tab-pane" id="tab3">


        <div hidden class="form-group @if($errors->has('customer_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="customer_id-field">Customer_id</label>
                    <input type="text" id="customer_id-field" name="customer_id" class="form-control txt-new" value="{{ old("customer_id") }}"/>
                       @if($errors->has("customer_id"))
                        <span class="help-block">{{ $errors->first("customer_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('program_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="program_id-field">Program</label>
                    <select id="program_id-field" name="program_id" class="txt-new" >
                      @if($programs->count() >0)
                        @foreach($programs as $program)
                          <option value="{{$program->id}}"> {{$program->course->name}}</option>
                        @endforeach
                      @endif
                    </select>
                       @if($errors->has("program_id"))
                        <span class="help-block">{{ $errors->first("program_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('goals')) has-error @endif">
                       <label class="col-sm-2 control-label" for="goals-field">Goals</label>
                    <textarea class="form-control txt-new" id="goals-field" rows="3" name="goals">{{ old("goals") }}</textarea>
                       @if($errors->has("goals"))
                        <span class="help-block">{{ $errors->first("goals") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label class="col-sm-2 control-label" for="status-field">Status</label>
                    <input type="text" id="status-field" name="status" class="form-control txt-new" value="{{ old("status") }}"/>
                       @if($errors->has("status"))
                        <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
            <a class="btn btn-primary btnPrevious" >السابق</a>

             </form>
        </div>
    </div>


    -->
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
   /* $('#birthdate-field').datepicker({
    });

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
          $target.find('input:eq(0)').focus();
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