<div class="modal fade" id="view_package" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">عرض حجز</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="view_form" action="" method="POST" enctype="multipart/form-data">
             @method('PUT')
             @csrf
            <input id="child_package" value="" hidden/>
            <input id="old_department_package" value="" hidden/>
            <input id="old_appointments" value="" hidden/>

            <!-- <input name="type" value="default_edit" hidden/> -->
            <div class="row form-row">
              <div class="col-md-4">
                <div class="row form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="department">القسم<span class="text-danger">*</span></label>
                      <select id="department" class="form-control select form-control-alternative{{ $errors->view_package->has('department') ? ' is-invalid' : '' }}" name="department" required disabled>
                        <option disabled selected hidden value="">اختر</option>
                        @foreach ($child_patient->child_departments as $child_department)
                         <option value="{{ $child_department->department }}" {{ (old('department') == $child_department->department)?'selected':''}}>{{ $child_department->department->name }}</option>
                        @endforeach
                      </select>
                      @if ($errors->view_package->has('department'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('department') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="department_package">باقة الحجز<span class="text-danger">*</span></label>
                      <select id="department_package" class="form-control select form-control-alternative{{ $errors->view_package->has('department_package') ? ' is-invalid' : '' }}" name="department_package" required disabled>
                        <option disabled selected hidden value="">اختر</option>
                      </select>
                      @if ($errors->view_package->has('department_package'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('department_package') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="cost">السعر<span class="text-danger">*</span></label>
                      <input id="cost" type="text" value="{{ old('cost') }}" class="form-control form-control-alternative{{ $errors->view_package->has('cost') ? ' is-invalid' : '' }}" name="cost" readonly/>
                      @if ($errors->view_package->has('cost'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('cost') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="discount">خصم</label>
                      <input id="discount" type="text" value="{{ old('discount') }}" class="form-control form-control-alternative{{ $errors->view_package->has('discount') ? ' is-invalid' : '' }}" name="discount" readonly/>
                      @if ($errors->view_package->has('discount'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('discount') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="paid">المبلغ المدفوع<span class="text-danger">*</span></label>
                      <div class="input-group">
                      	<input id="paid" type="text" value="{{ old('paid') }}" class="form-control form-control-alternative{{ $errors->view_package->has('paid') ? ' is-invalid' : '' }}" name="paid" autocomplete="paid" required readonly/>
                      	<div class="input-group-append w-25">
                          <select id="paid_type" class="form-control select form-control-alternative{{ $errors->view_package->has('paid_type') ? ' is-invalid' : '' }}" name="paid_type" required disabled>
                            <option disabled selected hidden value="">اختر</option>
                            <option value="0" {{ old('paid_type') == 0?'selected':''}}>نقداً</option>
                            <option value="1" {{ old('paid_type') == 1?'selected':''}}>شبكة</option>
                          </select>
                      	</div>
                      </div>
                      @if ($errors->view_package->has('paid'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('paid') }}</strong>
                          </div>
                      @endif
                      @if ($errors->view_package->has('paid_type'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('paid_type') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="rest">المتبقي<span class="text-danger">*</span></label>
                      <input id="rest" type="text" value="{{ old('rest') }}" class="form-control form-control-alternative{{ $errors->view_package->has('rest') ? ' is-invalid' : '' }}" name="rest" readonly/>
                      @if ($errors->view_package->has('rest'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('rest') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="supscription_date">تاريخ الحجز<span class="text-danger">*</span></label>
                      <input id="supscription_date" type="text" value="{{ old('supscription_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->view_package->has('supscription_date') ? ' is-invalid' : '' }}" name="supscription_date" autocomplete="supscription_date" required readonly/>
                      @if ($errors->view_package->has('supscription_date'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('supscription_date') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="expire_date">تاريخ الانتهاء<span class="text-danger">*</span></label>
                      <input id="expire_date" type="text" value="{{ old('expire_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->view_package->has('expire_date') ? ' is-invalid' : '' }}" name="expire_date" autocomplete="expire_date" required readonly/>
                      @if ($errors->view_package->has('expire_date'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->view_package->first('expire_date') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="employee_id">الطبيب المعالج<span class="text-danger">*</span></label>
                    <select id="employee_id" class="form-control select form-control-alternative{{ $errors->view_package->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" required disabled>
                      <option disabled selected hidden value="">اختر</option>
                    </select>
                    @if ($errors->view_package->has('employee_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->view_package->first('employee_id') }}</strong>
                        </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-12" id="schedule_div">

              </div>
            </div>
          </div>
          </form>
        </div>
        <div id="overlay">
        <div class="cv-spinner">
          <span class="spinner"></span>
        </div>
      </div>
      </div>
    </div>
  </div>
<script>
if ("{{count($errors->view_package) > 0}}"){
    $('#view_package').modal('show');
}

function moveNextViewPackage(index){
  $("#view_package #schedule_div_"+(index-1)).attr('hidden',true);
  $("#view_package #schedule_div_"+index).attr('hidden',false);
  return false;
}
function movePreviousViewPackage(index){
  $("#view_package #schedule_div_"+(index+1)).attr('hidden',true);
  $("#view_package #schedule_div_"+index).attr('hidden',false);
  return false;
}

$(document).ready(function () {
  $('#view_package').on('show.bs.modal', function(e) {
    var package_data = $(e.relatedTarget).data('item');
    var old_appointments = $(e.relatedTarget).data('appointments');
    var url = '{{ route("child_packages.update", ":id") }}';
    url = url.replace(':id', package_data.id);
    $("#view_package form").attr("action", url);
    $("#view_package #child_package").val(JSON.stringify(package_data));
    $("#view_package #old_department_package").val(JSON.stringify(package_data.department_package));
    $("#view_package #old_appointments").val(JSON.stringify(old_appointments));

    $("#view_package #paid").val(package_data.paid);
    $("#view_package #paid_type").val(package_data.paid_type).change();
    $("#view_package #cost").val(package_data.cost);
    $("#view_package #discount").val(package_data.discount);

    $("#view_package #supscription_date").val(package_data.supscription_date);
    $("#view_package #expire_date").val(package_data.expire_date);

    $("#view_package #department option").each(function(){
      if(($(this).val()!="") && (JSON.parse($(this).val()).id == package_data.department_package.department.id)){
        $("#view_package #department").val($(this).val()).change();
      }
    });

    var department = JSON.parse($('#view_package #department').val());

    $('#view_package #department_package option').remove();
    optionList = '';
    optionList += "<option disabled selected hidden value=''>اختر</option>";
    $.each(department.department_packages, function( key, value ) {
        optionList += "<option value='"+JSON.stringify(value)+"'>"+(value.session_number==1?value.name:value.name+" "+value.session_number+" جلسة")+"</option>";
    });
    $('#view_package #department_package').append(optionList);
    $("#view_package #department_package option").each(function(){
      if(($(this).val()!="") && (JSON.parse($(this).val()).id == package_data.department_package.id)){
        $("#view_package #department_package").val($(this).val()).change();
      }else if(($(this).val()!="") && (JSON.parse($(this).val()).session_number < package_data.department_package.session_number)){
        $(this).attr("disabled",true);
      }
    });

    $('#view_package #employee_id option').remove();
    optionList = '';
    optionList += "<option disabled selected hidden value=''>اختر</option>";
    $.each(department.doctors, function( key, value ) {
        optionList += "<option value='"+JSON.stringify(value)+"'>"+(value.name)+"</option>";
    });
    $('#view_package #employee_id').append(optionList);
    $("#view_package #employee_id option").each(function(){
      if(($(this).val()!="") && (JSON.parse($(this).val()).id == package_data.employee.id)){
        $("#view_package #employee_id").val($(this).val()).change();
      }
    });
  });

  $('#view_package #view_form').bind('submit', function () {
   $('#view_package #employee_id').attr('disabled', false);
  });

  $("#view_package #department_package").on('change', function () {
    if(JSON.parse(this.value).session_number > JSON.parse($("#view_package #old_department_package").val()).session_number){
      $("#view_package #save").attr("disabled", true);
    }else{
      $("#view_package input[name='appointments[]']").each(function(){
        $(this).parent().removeClass("selected");
        $(this).remove();
      });
      $("#view_package #save").attr("disabled", false);
    }
    if("{{ $child_patient->nationality_id == 1 }}")
    {
      $("#view_package #cost").val(JSON.parse(this.value).cost);
    }else{
      $("#view_package #cost").val((JSON.parse(this.value).cost*15/100) + (JSON.parse(this.value).cost*1));
    }
    $("#view_package #paid").trigger("keyup");
    // $("#view_package #supscription_date").trigger("dp.change");
  });

  $("#view_package #paid").on('keyup', function () {
      if((parseFloat($("#view_package #paid").val()) || 0) <= parseFloat($("#view_package #cost").val())){
        $("#view_package #rest").val($("#view_package #cost").val() - this.value);
      }else{
        $("#view_package #paid").val(0);
        $("#view_package #rest").val($("#view_package #cost").val() - this.value);
        alert("برجاء مراجعة المبلغ المدفوع")
      }
  });

  $("#view_package #supscription_date").on('dp.change', function (e) {
    var expire_duration = JSON.parse($("#view_package #department_package").val()).expire_duration;
    $("#view_package #expire_date").val(moment($("#view_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days').format('DD/MM/YYYY'));
    $('#view_package #employee_id').trigger("change");
  });

  $('#view_package #employee_id').on('change', function () {
    var doctor = JSON.parse(this.value);
    var doctor_sessions = [];
    var url = '{{ route("doctor_sessions_appointments", ":id") }}';
    url = url.replace(':id', doctor.id);
    $.ajax({
      type:'POST',
      url: url,
      data: {
          _token: "{{ csrf_token() }}",
          from: moment($("#view_package #supscription_date").val(), 'DD/MM/YYYY').format('YYYY-MM-DD HH:mm:ss'),
          to: moment($("#view_package #supscription_date").val(),'DD/MM/YYYY').add((JSON.parse($("#view_package #department_package").val()).expire_duration)*2,'days').format('YYYY-MM-DD HH:mm:ss')
      },
      beforeSend: function(){
        $("#view_package #overlay").fadeIn(300);
      },
      complete: function(){
          setTimeout(function(){
          $("#view_package #overlay").fadeOut(300);
        },500);
      },
      error: function (data) {
          console.log('Error:', data);
      },
      success: function (data) {
        var doctor_sessions = data.sessions;
        var doctor_appointments = data.appointments;
        var selected_department = JSON.parse($("#view_package #department").val());

        var expire_duration = (moment($("#view_package #expire_date").val(), 'DD/MM/YYYY').diff(moment($("#view_package #supscription_date").val(), 'DD/MM/YYYY'), 'days')*2)+1;
        var start_date = moment($("#view_package #supscription_date").val(), 'DD/MM/YYYY');
        $("#view_package #schedule_div").empty();
        // var schedule_header = "";
        for(var index=0; index<Math.ceil(expire_duration/7); index++){
          $("#view_package #schedule_div").append('<div class="card booking-schedule schedule-widget" id="schedule_div_'+index+'" '+(index!=0?'hidden':'')+'>'
          +'	<!-- Schedule Header -->'
          +'	<div class="schedule-header">'
          +'	  <div class="row">'
          +'		<div class="col-md-12">'
          +'		  <!-- Day Slot -->'
          +'		  <div class="day-slot" id="day_slot_'+index+'">'
          +'			<ul>'
          +'			</ul>'
          +'		  </div>'
          +'		  <!-- /Day Slot -->'
          +'		</div>'
          +'	  </div>'
          +'	</div>'
          +'	<!-- /Schedule Header -->'
          +'	<!-- Schedule Content -->'
          +'	<div class="schedule-cont">'
          +'	  <div class="row">'
          +'		<div class="col-md-12">'
          +'		  <!-- Time Slot -->'
          +'		  <div class="time-slot" id="time_slot_'+index+'">'
          +'			<ul class="clearfix">'
          +'			</ul>'
          +'		  </div>'
          +'		  <!-- /Time Slot -->'
          +'		</div>'
          +'	  </div>'
          +'	</div>'
          +'	<!-- /Schedule Content -->'
          +'  <div></div></div>'
        );

          $("#view_package #day_slot_"+index+" ul").append('<li class="left-arrow" '+(index==0?'hidden':'')+'>'
          +'					<a href="" onclick="return movePreviousViewPackage('+(index-1)+');">'
          +'						<i class="fa fa-chevron-left"></i>'
          +'					</a>'
          +'				</li>');
          var day=0;
          var day_num = (parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1)>5?0:(parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1);
          var end_date = moment($("#view_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days');
          while(day<6 && start_date.isBefore(end_date)){
            if(moment(start_date, 'DD/MM/YYYY').format("ddd")=='Fri'){
              start_date.add(1,'days');
              continue;
            }else{
              //Header
              $("#view_package #day_slot_"+index+" ul").append('<li>'
                +'<span>'+moment(start_date, "DD/MM/YYYY").format("ddd")+'</span>'
                +'<span class="slot-date">'+moment(start_date, 'DD/MM/YYYY').format("DD/MM/YYYY")+'</span>'
                +'</li>');

              //Body
              var day_sessions="";
              for(var doctor_session=0; doctor_session<doctor_sessions.length; doctor_session++){
                if(doctor_sessions[doctor_session].type == 3){
                  var session_sc = doctor_sessions[doctor_session].emp_session_time_days;
                  for(var i=0; i<session_sc.length; i++){
                    if(eval('session_sc['+i+'].day_'+day_num) != null){
                      date = moment(new Date(new Date(start_date).toDateString() +' '+ eval('session_sc['+i+'].day_'+day_num))).format('YYYY-MM-DD_HH-mm-ss');
                      day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addTime(this,'+start_date+')">'
                        +'		<span>'+(new Date(new Date().toDateString() + ' ' + eval('session_sc['+i+'].day_'+day_num)).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                        +'	</a>';
                    }
                  }
                }else{
                  var attend_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].attend_time);
                  var leave_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].leave_time);

                  for(var hour = 0; hour<((leave_time-attend_time)/1000/60/(selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration)) ; hour++){
                    for(var session = 0; session<(selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_patient_number) ; session++){
                      date = moment(new Date(new Date(start_date).toDateString() +' '+ new Date(attend_time.getTime() + ((selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration) * hour)* 60000).toTimeString())).format('YYYY-MM-DD_HH-mm-ss');
                      day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return false;">'
                        +'		<span>'+(new Date(attend_time.getTime() + ((selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration) * hour)* 60000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                        +'	</a>';
                    }
                  }
                }
              }
              $("#view_package #time_slot_"+index+" ul").append('<li>'
              +(day_sessions==""?'<a style="background-color: white;border-color: white;" class="timing"></a>':day_sessions)
              +'</li>');

              day_num ++;
              if(day_num > 5){
                day_num = 0;
              }
              start_date.add(1,'days');
            }
            day++;
          }
          $("#view_package #day_slot_"+index+" ul").append('<li class="right-arrow" '+(index==(Math.ceil(expire_duration/7)-1)?'hidden':'')+'>'
          +'					<a href="" onclick="return moveNextViewPackage('+(index+1)+');">'
          +'						<i class="fa fa-chevron-right"></i>'
          +'					</a>'
          +'				</li>');

        }
        // Add appointments
        for(var i = 0; i<doctor_appointments.length; i++){
          $($("#view_package a#date_"+((doctor_appointments[i].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing").not(".disabled")[0]).addClass("disabled");
        }
        var child_appointments = JSON.parse($("#view_package #old_appointments").val());
        for(var x = 0; x<child_appointments.length; x++){
          $($("#view_package a#date_"+((child_appointments[x].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing")[0]).addClass("selected");
        }
        if(JSON.parse($("#view_package #department_package").val()).id != JSON.parse($("#view_package #child_package").val()).department_package_id){
          $("#view_package #save").attr("disabled", true);
        }else{
          $("#view_package #save").attr("disabled", false);
        }
      }
     });
  });

});
</script>
