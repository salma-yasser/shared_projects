<div class="modal fade" id="edit_appointment" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تحديث الموعد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
               @csrf
            <input id="child_appointment" value="" hidden/>
            <input name="type" value="default_edit" hidden/>
            <div class="row form-row">
              <div class="col-md-4">
                <div class="row form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="appointment_type">نوع الحجز<span class="text-danger">*</span></label>
                      <select id="appointment_type" class="form-control select form-control-alternative{{ $errors->edit_appointment->has('appointment_type') ? ' is-invalid' : '' }}" name="appointment_type" required disabled>
                        <option disabled selected hidden value="">اختر</option>
                        @foreach ($appointment_types as $appointment_type)
                         <option value="{{ $appointment_type }}" {{ old('appointment_type') == $appointment_type?'selected':''}}>{{ $appointment_type->name }}</option>
                        @endforeach
                      </select>
                      @if ($errors->edit_appointment->has('appointment_type'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->edit_appointment->first('appointment_type') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="cost">السعر<span class="text-danger">*</span></label>
                      <input id="cost" type="text" value="{{ old('cost') }}" class="form-control form-control-alternative{{ $errors->edit_appointment->has('cost') ? ' is-invalid' : '' }}" name="cost" readonly/>
                      @if ($errors->edit_appointment->has('cost'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->edit_appointment->first('cost') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="paid">المبلغ المدفوع<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <input id="paid" type="text" value="{{ old('paid') }}" class="form-control form-control-alternative{{ $errors->edit_appointment->has('paid') ? ' is-invalid' : '' }}" name="paid" autocomplete="paid" required/>
                        <div class="input-group-append w-25">
                          <select id="paid_type" class="form-control select form-control-alternative{{ $errors->add_package->has('paid_type') ? ' is-invalid' : '' }}" name="paid_type" required>
                            <option disabled selected hidden value="">اختر</option>
                            <option value="0" {{ old('paid_type') == 0?'selected':''}}>نقداً</option>
                            <option value="1" {{ old('paid_type') == 1?'selected':''}}>شبكة</option>
                          </select>
                        </div>
                      </div>
                      @if ($errors->edit_appointment->has('paid'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->edit_appointment->first('paid') }}</strong>
                          </div>
                      @endif
                      @if ($errors->edit_appointment->has('paid_type'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->edit_appointment->first('paid_type') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="rest">المتبقي<span class="text-danger">*</span></label>
                      <input id="rest" type="text" value="{{ old('rest') }}" class="form-control form-control-alternative{{ $errors->edit_appointment->has('rest') ? ' is-invalid' : '' }}" name="rest" readonly/>
                      @if ($errors->edit_appointment->has('rest'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->edit_appointment->first('rest') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="employee_id">الطبيب المعالج<span class="text-danger">*</span></label>
                      <select id="employee_id" class="form-control select form-control-alternative{{ $errors->edit_appointment->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" required>
                        <option disabled selected hidden value="">اختر</option>
                        @foreach ($child_patient->department->employees as $doctor)
                         <option value="{{ $doctor }}" {{ old('employee_id') == $doctor ?'selected':''}}>{{$doctor->name}}</option>
                        @endforeach
                      </select>
                      @if ($errors->edit_appointment->has('employee_id'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->edit_appointment->first('employee_id') }}</strong>
                          </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="col-md-12" id="schedule_div">
              </div>
            </div>
          </div>

            <button id="save_button" type="submit" class="btn btn-primary btn-block" disabled="true">حجز</button>
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
<style>
  #overlay{
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% {
    transform: rotate(360deg);
  }
}
.is-hide{
  display:none;
}
</style>
<script>
if ("{{count($errors->edit_appointment) > 0}}"){
    $('#edit_appointment').modal('show');
}

function moveNextEditAppointment(index){
  $("#edit_appointment #schedule_div_"+(index-1)).attr('hidden',true);
  $("#edit_appointment #schedule_div_"+index).attr('hidden',false);
  return false;
}
function movePreviousEditAppointment(index){
  $("#edit_appointment #schedule_div_"+(index+1)).attr('hidden',true);
  $("#edit_appointment #schedule_div_"+index).attr('hidden',false);
  return false;
}
function editAppointment(object, start_date){
  if($("#edit_appointment .time").length != 0){
    $($("#edit_appointment .time")[0]).parent().removeClass("selected").removeClass("disabled");
    $($("#edit_appointment .time")[0]).remove();
  }
  var appointment = moment(new Date (new Date(start_date).toDateString() + ' ' + object.children[0].innerHTML)).format("YYYY-MM-DD HH:mm:ss");
  $(object).append("<input class='time' name='time' value='"+appointment+"' hidden/>");
  $(object).addClass("selected");
  $("#edit_appointment #save_button").attr("disabled", false);
  return false;
}

$(document).ready(function () {
  $('#edit_appointment').on('show.bs.modal', function(e) {

    var appointment_data = $(e.relatedTarget).data('item');
    var url = '{{ route("child_appointments.update", ":id") }}';
    url = url.replace(':id', appointment_data.id);
    $("#edit_appointment form").attr("action", url);
    $("#edit_appointment #child_appointment").val(JSON.stringify(appointment_data));

    $("#edit_appointment #paid").val(appointment_data.paid);
    $("#edit_appointment #paid_type").val(appointment_data.paid_type).change();

    $("#edit_appointment #appointment_type option").each(function(){
      if(($(this).val()!="") && (JSON.parse($(this).val()).id == appointment_data.department_package.id)){
        $(this).attr("selected","selected").change();
      }
    });

    $("#edit_appointment #employee_id option").each(function(){
      if(($(this).val()!="") && (JSON.parse($(this).val()).id == appointment_data.employee.id)){
        $(this).attr("selected","selected").change();
      }
    });

  });

  $("#edit_appointment #appointment_type").on('change', function () {
    if("{{ $child_patient->nationality_id == 1 }}")
    {
      $("#edit_appointment #cost").val(JSON.parse(this.value).cost);
    }else{
      $("#edit_appointment #cost").val((JSON.parse(this.value).cost*15/100) + (JSON.parse(this.value).cost*1));
    }
    $("#edit_appointment #paid").trigger("keyup");
  });

  $("#edit_appointment #paid").on('keyup', function () {
    if((parseFloat($("#edit_appointment #paid").val()) || 0) <=  parseFloat($("#edit_appointment #cost").val())){
      $("#edit_appointment #rest").val($("#edit_appointment #cost").val() - this.value);
    }else{
      $("#edit_appointment #paid").val(0);
      $("#edit_appointment #rest").val($("#edit_appointment #cost").val() - this.value);
      alert("برجاء مراجعة المبلغ المدفوع")
    }
  });

  $('#edit_appointment #employee_id').on('change', function () {
    var doctor = JSON.parse(this.value);
    var doctor_sessions = [];
    var url = '{{ route("doctor_sessions_appointments", ":id") }}';
    url = url.replace(':id', doctor.id);
    $.ajax({
      type:'POST',
      url: url,
      data: {
          _token: "{{ csrf_token() }}",
          from: moment().startOf('day').format('YYYY-MM-DD HH:mm:ss'),
          to: moment().add(30,'days').format('YYYY-MM-DD HH:mm:ss')
      },
      beforeSend: function(){
        $("#edit_appointment #overlay").fadeIn(300);
      },
      complete: function(){
          setTimeout(function(){
          $("#edit_appointment #overlay").fadeOut(300);
        },500);
      },
      error: function (data) {
          console.log('Error:', data);
      },
      success: function (data) {
        var doctor_sessions = data.sessions;
        var doctor_appointments = data.appointments;

        var expire_duration = 31;
        var start_date = moment();
        $("#edit_appointment #schedule_div").empty();
        // var schedule_header = "";
        for(var index=0; index<Math.ceil(expire_duration/7); index++){
          $("#edit_appointment #schedule_div").append('<div class="card booking-schedule schedule-widget" id="schedule_div_'+index+'" '+(index!=0?'hidden':'')+'>'
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

          $("#edit_appointment #day_slot_"+index+" ul").append('<li class="left-arrow" '+(index==0?'hidden':'')+'>'
          +'					<a href="" onclick="return movePreviousEditAppointment('+(index-1)+');">'
          +'						<i class="fa fa-chevron-left"></i>'
          +'					</a>'
          +'				</li>');
          var day=0;
          while(day<6 && start_date.isBefore(moment().add(30, 'days'))){
            if(moment(start_date, 'DD/MM/YYYY').format("ddd")=='Fri'){
              start_date.add(1,'days');
              continue;
            }else{
              //Header
              $("#edit_appointment #day_slot_"+index+" ul").append('<li>'
                +'<span>'+moment(start_date, "DD/MM/YYYY").format("ddd")+'</span>'
                +'<span class="slot-date">'+moment(start_date, 'DD/MM/YYYY').format("DD/MM/YYYY")+'</span>'
                +'</li>');

              //Body
              var day_sessions="";
              for(var doctor_session=0; doctor_session<doctor_sessions.length; doctor_session++){
                var attend_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].attend_time);
                var leave_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].leave_time);

                for(var hour = 0; hour<((leave_time-attend_time)/1000/60/ '{{(is_null($child_patient->department->department_session_settings)?1:$child_patient->department->department_session_settings[0]->session_duration) }}') ; hour++){
                  for(var session = 0; session<'{{ is_null($child_patient->department->department_session_settings)?0:$child_patient->department->department_session_settings[0]->session_patient_number }}' ; session++){
                    date = moment(new Date(new Date(start_date).toDateString() +' '+ new Date(attend_time.getTime() + ('{{(is_null($child_patient->department->department_session_settings)?1:$child_patient->department->department_session_settings[0]->session_duration) }}' * hour)* 60000).toTimeString())).format('YYYY-MM-DD_HH-mm-ss');
                    day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return editAppointment(this,'+start_date+')">'
                      +'		<span>'+(new Date(attend_time.getTime() + ('{{(is_null($child_patient->department->department_session_settings)?1:$child_patient->department->department_session_settings[0]->session_duration) }}' * hour)* 60000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                      +'	</a>';
                  }
                }
              }
              $("#edit_appointment #time_slot_"+index+" ul").append('<li>'
              +(day_sessions==""?'<a style="background-color: white;border-color: white;" class="timing"></a>':day_sessions)
              +'</li>');

              start_date.add(1,'days');
            }
            day++;
          }
          $("#edit_appointment #day_slot_"+index+" ul").append('<li class="right-arrow" '+(index==(Math.ceil(expire_duration/7)-1)?'hidden':'')+'>'
          +'					<a href="" onclick="return moveNextEditAppointment('+(index+1)+');">'
          +'						<i class="fa fa-chevron-right"></i>'
          +'					</a>'
          +'				</li>');

        }
        // Add appointments
        for(var i = 0; i<doctor_appointments.length; i++){
          $($("#edit_appointment a#date_"+((doctor_appointments[i].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing").not(".disabled")[0]).addClass("disabled");
        }

        var child_appointment = JSON.parse($("#edit_appointment #child_appointment").val());
        $($("#edit_appointment a#date_"+((child_appointment.time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing")[0]).addClass("selected").append("<input class='time' name='time' value='"+child_appointment.time+"' hidden/>");
        $("#edit_appointment #save_button").attr("disabled", false);
      }
     });
  });
});
</script>
