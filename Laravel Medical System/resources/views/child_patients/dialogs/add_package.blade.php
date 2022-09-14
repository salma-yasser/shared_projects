<div class="modal fade" id="add_package" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">حجز جديد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('child_packages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <div class="row form-row">
              <div class="col-md-4">
                <div class="row form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="department">القسم<span class="text-danger">*</span></label>
                      <select id="department" class="form-control select form-control-alternative{{ $errors->add_package->has('department') ? ' is-invalid' : '' }}" name="department" required>
                        <option disabled selected hidden value="">اختر</option>
                        @foreach ($child_patient->child_departments as $child_department)
                         <option value="{{ $child_department->department }}" {{ (old('department') == $child_department->department)?'selected':''}}>{{ $child_department->department->name }}</option>
                        @endforeach
                      </select>
                      @if ($errors->add_package->has('department'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->add_package->first('department') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="department_package">نوع الحجز<span class="text-danger">*</span></label>
                      <select id="department_package" class="form-control select form-control-alternative{{ $errors->add_package->has('department_package') ? ' is-invalid' : '' }}" name="department_package" required>
                        <option disabled selected hidden value="">اختر</option>
                      </select>
                      @if ($errors->add_package->has('department_package'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->add_package->first('department_package') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="cost">السعر<span class="text-danger">*</span></label>
                      <input id="cost" type="text" value="{{ old('cost') }}" class="form-control form-control-alternative{{ $errors->add_package->has('cost') ? ' is-invalid' : '' }}" name="cost" readonly/>
                      @if ($errors->add_package->has('cost'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->add_package->first('cost') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label" for="paid">المبلــــغ المدفـــوع <span class="text-danger">*</span></label>
                        <div class="d-flex">
                            <div class="input-group">
                                <input id="paid_cash" type="text" value="{{ old('paid_cash') }}" class="form-control form-control-alternative{{ $errors->add_package->has('paid_cash') ? ' is-invalid' : '' }}" name="paid_cash" autocomplete="paid_cash"/>
                                <div class="input-group-append" style="width: 35%">
                                    <input id="paid_type_cash" type="text" value="نقداً" class="form-control form-control-alternative{{ $errors->add_package->has('paid_type_cash') ? ' is-invalid' : '' }}" name="paid_type_cash" disabled>
                                </div>
                            </div>
                            <div class="input-group">
                                <input id="paid_net" type="text" value="{{ old('paid_net') }}" class="form-control form-control-alternative{{ $errors->add_package->has('paid_net') ? ' is-invalid' : '' }}" name="paid_net" autocomplete="paid_net"/>
                                <div class="input-group-append" style="width: 35%">
                                    <input id="paid_type_net" type="text" value="شبكة" class="form-control form-control-alternative{{ $errors->add_package->has('paid_type_net') ? ' is-invalid' : '' }}" name="paid_type_net" disabled>
                                </div>
                            </div>
                        </div>
                        <input id="paid" type="text" value="{{ old('paid') }}" class="form-control form-control-alternative{{ $errors->add_package->has('paid') ? ' is-invalid' : '' }}" name="paid" readonly required/>
                        @if ($errors->add_package->has('paid'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->add_package->first('paid') }}</strong>
                            </div>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="rest">المتبقي<span class="text-danger">*</span></label>
                      <input id="rest" type="text" value="{{ old('rest') }}" class="form-control form-control-alternative{{ $errors->add_package->has('rest') ? ' is-invalid' : '' }}" name="rest" readonly/>
                      @if ($errors->add_package->has('rest'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->add_package->first('rest') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="supscription_date">تاريخ الحجز<span class="text-danger">*</span></label>
                      <input id="supscription_date" type="text" value="{{ old('supscription_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->add_package->has('supscription_date') ? ' is-invalid' : '' }}" name="supscription_date" autocomplete="supscription_date" required/>
                      @if ($errors->add_package->has('supscription_date'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->add_package->first('supscription_date') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="expire_date">تاريخ الانتهاء<span class="text-danger">*</span></label>
                      <input id="expire_date" type="text" value="{{ old('expire_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->add_package->has('expire_date') ? ' is-invalid' : '' }}" name="expire_date" autocomplete="expire_date" required readonly/>
                      @if ($errors->add_package->has('expire_date'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->add_package->first('expire_date') }}</strong>
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
                    <select id="employee_id" class="form-control select form-control-alternative{{ $errors->add_package->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" required>
                      <option disabled selected hidden value="">اختر</option>
                    </select>
                    @if ($errors->add_package->has('employee_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->add_package->first('employee_id') }}</strong>
                        </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-12" id="schedule_div">

              </div>
            </div>
          </div>
              <button id="save" type="submit" class="btn btn-primary btn-block" disabled="true">
                <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              من فضلك انتظر...</span>
              <span id="text-btn" >حجز</span>
            </button>
            <!-- <button id="save" type="submit" class="btn btn-primary btn-block" disabled="true">حجز</button> -->
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
if ("{{count($errors->add_package) > 0}}"){
    $('#add_package').modal('show');
}

function moveNextAddPackage(index){
  $("#add_package #schedule_div_"+(index-1)).attr('hidden',true);
  $("#add_package #schedule_div_"+index).attr('hidden',false);
  return false;
}
function movePreviousAddPackage(index){
  $("#add_package #schedule_div_"+(index+1)).attr('hidden',true);
  $("#add_package #schedule_div_"+index).attr('hidden',false);
  return false;
}
function addTime(object, start_date){
  if($(object).hasClass("selected")){    //remove selected
    $(object).find("input").remove();
    $(object).removeClass("selected");
    $("#add_package #save").attr("disabled", true);
  }else{  // add appointment
    var appointments = $("#add_package input[name='appointments[]']").map(function(){return $(this).val();}).get();
    var max = JSON.parse($("#add_package #department_package").val()).session_number;
    if(appointments.length<max){
      var appointment = moment(new Date (new Date(start_date).toDateString() + ' ' + object.children[0].innerHTML)).format("YYYY-MM-DD HH:mm:ss");
      $(object).append("<input name='appointments[]' value='"+appointment+"' hidden/>");
      $(object).addClass("selected");
      if(appointments.length==(max-1)){
        $("#add_package #save").attr("disabled", false);
      }
    }else{
      alert("لقد وصلت للحد الأقصى من الجلسات");
    }
  }
  return false;
}

$(document).ready(function () {
  $("#add_package #department").on('change', function () {
    if($("#add_package #department").val() != null && $("#add_package #department").val() != ''){
        var department = JSON.parse($('#add_package #department').val());

        $('#add_package #cost').val(0);
        $("#add_package #paid_net").val(null);
        $("#add_package #paid_cash").val(null);
        $('#add_package #paid').val(null);
        $('#add_package #rest').val(null);
        $('#add_package #supscription_date').val(null);
        $('#add_package #expire_date').val(null);
        $('#add_package input[name=appointments\\[\\]]').remove()

        $('#add_package #department_package option').remove();
        optionList = '';
        optionList += "<option disabled selected hidden value=''>اختر</option>";
        $.each(department.department_packages, function( key, value ) {
            optionList += "<option value='"+JSON.stringify(value)+"'>"+(value.session_number==1?value.name:value.name+" "+value.session_number+" جلسة")+"</option>";
        });
        $('#add_package #department_package').append(optionList);

        $('#add_package #employee_id option').remove();
        optionList = '';
        optionList += "<option disabled selected hidden value=''>اختر</option>";
        $.each(department.doctors, function( key, value ) {
            optionList += "<option value='"+JSON.stringify(value)+"'>"+(value.name)+"</option>";
        });
        // $("#add_package #paid_net").trigger("keyup");
        // $("#add_package #paid_cash").trigger("keyup");
        // $("#add_package #paid").trigger("keyup");
        $('#add_package #employee_id').append(optionList);
      }
  });

  $("#add_package #department_package").on('change', function () {
    if("{{ $child_patient->nationality_id == 1 }}")
    {
      $("#add_package #cost").val(JSON.parse(this.value).cost);
    }else{
      $("#add_package #cost").val((JSON.parse(this.value).cost*15/100) + (JSON.parse(this.value).cost*1));
    }
    $("#add_package #paid_net").val(null);
    $("#add_package #paid_cash").val(null);
    $('#add_package #paid').val(null);
    $('#add_package #rest').val(null);
    // $("#add_package #paid").trigger("keyup");
    $("#add_package #supscription_date").trigger("dp.change");
  });

    $("#add_package #paid_cash").on('keyup', function () {
        let sum = Number($("#add_package #paid_net").val()) + Number( $("#add_package #paid_cash").val());
        if(sum <=  Number($("#add_package #cost").val())){
            $("#add_package #paid").val(sum);
            $("#add_package #rest").val($("#add_package #cost").val() - sum);
        }else{
            $("#add_package #paid_cash").val(null);
            $("#add_package #paid").val($("#add_package #paid_net").val());
            $("#add_package #rest").val($("#add_package #cost").val() - $("#add_package #paid").val());
            alert("برجاء مراجعة المبلغ المدفوع")
        }
    });

    $("#add_package #paid_net").on('keyup', function () {
        let sum = Number($("#add_package #paid_net").val()) + Number( $("#add_package #paid_cash").val());
        if(sum <=  Number($("#add_package #cost").val())){
            $("#add_package #paid").val(sum);
            $("#add_package #rest").val($("#add_package #cost").val() - sum);
        }else{
            $("#add_package #paid_net").val(null);
            $("#add_package #paid").val($("#add_package #paid_cash").val());
            $("#add_package #rest").val($("#add_package #cost").val() - $("#add_package #paid").val());
            alert("برجاء مراجعة المبلغ المدفوع")
        }
    });

  $("#add_package #supscription_date").on('dp.change', function (e) {
    if($("#add_package #supscription_date").val() != null && $("#add_package #supscription_date").val() != ''){
      var expire_duration = JSON.parse($("#add_package #department_package").val()).expire_duration;
      $("#add_package #expire_date").val(moment($("#add_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days').format('DD/MM/YYYY'));
      $('#add_package #employee_id').trigger("change");
    }
  });

  $("#add_package #supscription_date").on('dp.change', function (e) {
    if($("#add_package #supscription_date").val() != null && $("#add_package #supscription_date").val() != ''){
      var expire_duration = JSON.parse($("#add_package #department_package").val()).expire_duration;
      $("#add_package #expire_date").val(moment($("#add_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days').format('DD/MM/YYYY'));
      $('#add_package #employee_id').trigger("change");
    }
  });

  $('#add_package #employee_id').on('change', function () {
    if($("#add_package #employee_id").val() != null && $("#add_package #employee_id").val() != ''){
        var doctor = JSON.parse($('#add_package #employee_id').val());
        var doctor_sessions = [];
        var url = '{{ route("doctor_sessions_appointments", ":id") }}';
        url = url.replace(':id', doctor.id);
        $.ajax({
          type:'POST',
          url: url,
          data: {
              _token: "{{ csrf_token() }}",
              from: moment($("#add_package #supscription_date").val(), 'DD/MM/YYYY').format('YYYY-MM-DD HH:mm:ss'),
              to: moment($("#add_package #supscription_date").val(),'DD/MM/YYYY').add((JSON.parse($("#add_package #department_package").val()).expire_duration)*2,'days').format('YYYY-MM-DD HH:mm:ss')
          },
          beforeSend: function(){
            $("#add_package #overlay").fadeIn(300);
          },
          complete: function(){
              setTimeout(function(){
              $("#add_package #overlay").fadeOut(300);
            },500);
          },
          error: function (data) {
              console.log('Error:', data);
          },
          success: function (data) {
            var doctor_sessions = data.sessions;
            var doctor_appointments = data.appointments;
            var selected_department = JSON.parse($("#add_package #department").val());

            var expire_duration = ((JSON.parse($("#add_package #department_package").val()).expire_duration)*2)+1;
            var start_date = moment($("#add_package #supscription_date").val(), 'DD/MM/YYYY');
            $("#add_package #schedule_div").empty();
            // var schedule_header = "";
            for(var index=0; index<Math.ceil(expire_duration/7); index++){
              $("#add_package #schedule_div").append('<div class="card booking-schedule schedule-widget" id="schedule_div_'+index+'" '+(index!=0?'hidden':'')+'>'
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

              $("#add_package #day_slot_"+index+" ul").append('<li class="left-arrow" '+(index==0?'hidden':'')+'>'
              +'					<a href="" onclick="return movePreviousAddPackage('+(index-1)+');">'
              +'						<i class="fa fa-chevron-left"></i>'
              +'					</a>'
              +'				</li>');
              var day=0;
              var day_num = (parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1)>5?0:(parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1);
              var end_date = moment($("#add_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days');
              while(day<6 && start_date.isBefore(end_date)){
                if(moment(start_date, 'DD/MM/YYYY').format("ddd")=='Fri'){
                  start_date.add(1,'days');
                  continue;
                }else{
                  //Header
                  $("#add_package #day_slot_"+index+" ul").append('<li>'
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
                          day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addTime(this,'+start_date+')">'
                            +'		<span>'+(new Date(attend_time.getTime() + ((selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration) * hour)* 60000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                            +'	</a>';
                        }
                      }
                    }
                  }
                  $("#add_package #time_slot_"+index+" ul").append('<li>'
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
              $("#add_package #day_slot_"+index+" ul").append('<li class="right-arrow" '+(index==(Math.ceil(expire_duration/7)-1)?'hidden':'')+'>'
              +'					<a href="" onclick="return moveNextAddPackage('+(index+1)+');">'
              +'						<i class="fa fa-chevron-right"></i>'
              +'					</a>'
              +'				</li>');

            }
            // Add appointments
            for(var i = 0; i<doctor_appointments.length; i++){
              $($("#add_package a#date_"+((doctor_appointments[i].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing").not(".disabled")[0]).addClass("disabled");
            }
          }
       });
       $("#add_package #save").attr("disabled", true);
     }
  });

  $("#add_package form").submit(function (e) {
      $("#add_package #text-btn").attr("hidden", true);
      $("#add_package #text-loading").attr("hidden", false);
      $("#add_package #save").attr("disabled", true);
      return true;
  });
});
</script>
