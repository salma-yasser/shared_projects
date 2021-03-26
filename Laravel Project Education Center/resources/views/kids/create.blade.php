@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
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
    .state-icon {
    left: -5px;
}
.form-horizontal .form-group .radio{
  float: right;
}
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
  <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> إستمارة التسجيل للأطفال </h3>
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
    </div>
  </div>


  <form role="form" action="{{ route('kids.store') }}" method="POST" class="form-horizontal mt-10">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row setup-content" id="step-1">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3>بيانات الطالب الشخصية</h3>
          
        <div class="form-group @if($errors->has('name')) has-error @endif">
          <label class="control-label" for="name-field">الإسم<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
               @if($errors->has("name"))
                <span class="help-block">{{ $errors->first("name") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('nationality')) has-error @endif">
          <label class="control-label" for="nationality-field">الجنسية<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="nationality-field" name="nationality" class="form-control" value="{{ old("nationality") }}"/>
               @if($errors->has("nationality"))
                <span class="help-block">{{ $errors->first("nationality") }}</span>
               @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('national_id')) has-error @endif">
          <label class="control-label" for="national_id-field">الرقم القومي<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="national_id-field" name="national_id" class="form-control" value="{{ old("national_id") }}"/>
               @if($errors->has("national_id"))
                <span class="help-block">{{ $errors->first("national_id") }}</span>
               @endif
          </div>
        </div>
        
        <div class="form-group  @if($errors->has('birthdate')) has-error @endif" >
          <label class="control-label" for="birthdate-field">تاريخ الميلاد<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="birthdate-field" name="birthdate" data-date-format="yyyy-m-dd" class="form-control datepicker " value="{{ old("birthdate") }}" />
               @if($errors->has("birthdate"))
                <span class="help-block">{{ $errors->first("birthdate") }}</span>
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

        <div class="form-group @if($errors->has('mobile')) has-error @endif">
          <label class="control-label" for="mobile-field">رقم الموبايل إن وجد</label>
          <div class="col-sm-10">
            <input type="text" id="mobile-field" name="mobile" class="form-control" value="{{ old("mobile") }}"/>
               @if($errors->has("mobile"))
                <span class="help-block">{{ $errors->first("mobile") }}</span>
               @endif
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="how_know-field">كيف توصلت إلينا</label>
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
        <h3> المدرسه</h3>

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
            <input required type="text" id="school_address-field" name="school_address" class="form-control" value="{{ old("school_address") }}"/>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="year-field">العام<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="year-field" name="year" class="form-control" value="{{ old("year") }}"/>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="level-field">الصف الدراسي الحالي<span class="asterisk"> *</span></label>
          <div class="col-sm-10">
            <input required type="text" id="level-field" name="level" class="form-control" value="{{ old("level") }}"/>
          </div>
        </div>
        
        <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>

  <div class="row setup-content" id="step-3">
    <div class="form-body col-xs-8 col-md-offset-2">
        <h3>ولي الأمر</h3>
        
        <div class="form-group @if($errors->has('name')) has-error @endif">
          <label class="control-label" for="name-field">إسم ولي الأمر</label>
          <div class="col-sm-10">
            <input type="text" id="name-field" name="parent_name[]" class="form-control" value="{{ old("name") }}"/>
               @if($errors->has("name"))
                <span class="help-block">{{ $errors->first("name") }}</span>
               @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('relative')) has-error @endif">
          <label class="control-label" for="relative-field">درجة القرابة</label>
          <div class="col-sm-10">
            <input type="text" id="relative-field" name="relative[]" class="form-control" value="{{ old("relative") }}"/>
             @if($errors->has("relative"))
              <span class="help-block">{{ $errors->first("relative") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('mobile1')) has-error @endif">
          <label class="control-label" for="mobile1-field">رقم الهاتف</label>
          <div class="col-sm-10">
            <input type="text" id="mobile1-field" name="parent_mobile1[]" class="form-control" value="{{ old("mobile1") }}"/>
             @if($errors->has("mobile1"))
              <span class="help-block">{{ $errors->first("mobile1") }}</span>
             @endif
          </div>
        </div>
      
        <div class="form-group @if($errors->has('mobile2')) has-error @endif">
          <label class="control-label" for="mobile2-field">رقم هاتف أخر</label>
          <div class="col-sm-10">
            <input type="text" id="mobile2-field" name="parent_mobile2[]" class="form-control" value="{{ old("mobile2") }}"/>
             @if($errors->has("mobile2"))
              <span class="help-block">{{ $errors->first("mobile2") }}</span>
             @endif
          </div>
        </div>
  
        <div class="form-group @if($errors->has('phone')) has-error @endif">
          <label class="control-label" for="phone-field">رقم المنزل</label>
          <div class="col-sm-10">
            <input type="text" id="phone-field" name="phone_parent[]" class="form-control" value="{{ old("phone") }}"/>
             @if($errors->has("phone"))
              <span class="help-block">{{ $errors->first("phone") }}</span>
             @endif
          </div>
        </div>
  
        <div class="form-group @if($errors->has('address')) has-error @endif">
          <label class="control-label" for="address-field">العنوان</label>
          <div class="col-sm-10">
            <input type="text" id="address-field" name="address_parent[]" class="form-control" value="{{ old("address") }}"/>
             @if($errors->has("address"))
              <span class="help-block">{{ $errors->first("address") }}</span>
             @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('email')) has-error @endif">
         <label class="control-label" for="email-field">البريد الإلكتروني</label>
         <div class="col-sm-10">
            <input type="text" id="email-field" name="email_parent[]" class="form-control" value="{{ old("email") }}"/>
             @if($errors->has("email"))
              <span class="help-block">{{ $errors->first("email") }}</span>
             @endif
          </div>
        </div>

        <h3> ولي الأمر 2 إن وجد</h3>

        <div class="form-group @if($errors->has('name')) has-error @endif">
          <label class="control-label" for="name-field">إسم ولي الأمر</label>
          <div class="col-sm-10">
            <input type="text" id="name-field" name="parent_name[]" class="form-control" value="{{ old("name") }}"/>
             @if($errors->has("name"))
              <span class="help-block">{{ $errors->first("name") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('relative')) has-error @endif">
          <label class="control-label" for="relative-field">درجة القرابة</label>
          <div class="col-sm-10">
            <input type="text" id="relative-field" name="relative[]" class="form-control" value="{{ old("relative") }}"/>
             @if($errors->has("relative"))
              <span class="help-block">{{ $errors->first("relative") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('mobile1')) has-error @endif">
          <label class="control-label" for="mobile1-field">رقم الهاتف</label>
          <div class="col-sm-10">
            <input type="text" id="mobile1-field" name="parent_mobile1[]" class="form-control" value="{{ old("mobile1") }}"/>
             @if($errors->has("mobile1"))
              <span class="help-block">{{ $errors->first("mobile1") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('mobile2')) has-error @endif">
          <label class="control-label" for="mobile2-field">رقم هاتف أخر</label>
          <div class="col-sm-10">
            <input type="text" id="mobile2-field" name="parent_mobile2[]" class="form-control" value="{{ old("mobile2") }}"/>
             @if($errors->has("mobile2"))
              <span class="help-block">{{ $errors->first("mobile2") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('phone')) has-error @endif">
          <label class="control-label" for="phone-field">رقم المنزل</label>
          <div class="col-sm-10">
            <input type="text" id="phone-field" name="phone_parent[]" class="form-control" value="{{ old("phone") }}"/>
             @if($errors->has("phone"))
              <span class="help-block">{{ $errors->first("phone") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('address')) has-error @endif">
          <label class="control-label" for="address-field">العنوان</label>
          <div class="col-sm-10">
            <input type="text" id="address-field" name="address_parent[]" class="form-control" value="{{ old("address") }}"/>
             @if($errors->has("address"))
              <span class="help-block">{{ $errors->first("address") }}</span>
             @endif
          </div>
        </div>
        
        <div class="form-group @if($errors->has('email')) has-error @endif">
          <label class="control-label" for="email-field">البريد الإلكتروني</label>
          <div class="col-sm-10">
            <input type="text" id="email-field" name="email_parent[]" class="form-control" value="{{ old("email") }}"/>
             @if($errors->has("email"))
              <span class="help-block">{{ $errors->first("email") }}</span>
             @endif
          </div>
        </div>

        <button class="btn btn-primary nextBtn btn-lg pull-left" type="button" >التالي</button>
      </div>
    </div>

    <div class="row setup-content" id="step-4">
      <div class="form-body col-xs-8 col-md-offset-2">
        <h3>إختر الكورس المناسب</h3>

        <div class="form-group @if($errors->has('goals')) has-error @endif">
          <label class="control-label" for="program-field">برامج Ugrow المتاحه</label>
          @foreach($programs as $program)
            <div class="col-sm-10">
              <input type="checkbox" class="radio" value="{{$program->id}}"  name="program_id[]" />
              <label>{{$program->course->name}}</label>
          </div>
          @endforeach
        </div>

        <div class="form-group @if($errors->has('goals')) has-error @endif">
          <label class="control-label" for="goals-field">الأهداف المرجوه</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="goals-field" rows="3" name="goals">{{ old("goals") }}</textarea>
             @if($errors->has("goals"))
              <span class="help-block">{{ $errors->first("goals") }}</span>
             @endif
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


  $('.list-group.checked-list-box .list-group-item').each(function () {
        
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" class="hidden" />'),
            color = ($widget.data('color') ? $widget.data('color') : "primary"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
    $('#get-checked-data').on('click', function(event) {
        event.preventDefault(); 
        var checkedItems = {}, counter = 0;
        $("#check-list-box li.active").each(function(idx, li) {
            checkedItems[counter] = $(li).text();
            counter++;
        });
        $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
    });
  </script>
@endsection