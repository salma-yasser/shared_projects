<div class="modal fade" id="request_rebook_appointment" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">طلب تعويض اضافي</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" action="{{ route('child_extra_rebook_requests.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <input id="child_appointment_id" name="child_appointment_id" hidden/>
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <!-- <input name="type" value="rebook" hidden/> -->
            <div class="row form-row">
              <div class="col-md-12" id="schedule_div">

              </div>
            </div>

            <button id="save" type="submit" class="btn btn-primary btn-block" disabled="true">
              <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            من فضلك انتظر...</span>
            <span id="text-btn" >تأكيد</span>
          </button>
            <!-- <button id="save" type="submit" class="btn btn-primary btn-block" disabled="true">تأكيد</button> -->
          </form>
        </div>
      </div>
    </div>
    <div id="overlay">
    <div class="cv-spinner">
      <span class="spinner"></span>
    </div>
  </div>
</div>
<script>
if ("{{count($errors->request_extra_rebook_appointment) > 0}}"){
    $('#request_rebook_appointment').modal('show');
}

function moveNextExtraRebookAppointment(index){
  $("#request_rebook_appointment #schedule_div_"+(index-1)).attr('hidden',true);
  $("#request_rebook_appointment #schedule_div_"+index).attr('hidden',false);
  return false;
}
function movePreviousExtraRebookAppointment(index){
  $("#request_rebook_appointment #schedule_div_"+(index+1)).attr('hidden',true);
  $("#request_rebook_appointment #schedule_div_"+index).attr('hidden',false);
  return false;
}

function addExtraRequestAppointment(object, start_date){
    var appointments = $("input[name='appointments[]']").map(function(){return $(this).val();}).get();
    var max = 1;
    if(appointments.length<max){
      var appointment = moment(new Date (new Date(start_date).toDateString() + ' ' + object.children[0].innerHTML)).format("YYYY-MM-DD HH:mm:ss");
      $(object).append("<input name='appointments[]' value='"+appointment+"' hidden/>");
      $(object).addClass("selected");
      if(appointments.length==(max-1)){
        $("#request_rebook_appointment button[type='submit']").attr("disabled", false);
      }
    }else{
      alert("لقد وصلت للحد الأقصى من الجلسات");
    }
  return false;
}

$(document).ready(function () {

  $('#request_rebook_appointment').on('show.bs.modal', function(e) {
    var appointment = $(e.relatedTarget).data('item');
    var session_patient_number = $(e.relatedTarget).data('session_patient_number');
    var session_duration = $(e.relatedTarget).data('session_duration');
    $("#request_rebook_appointment #child_appointment_id").val(appointment.id);
    $("#request_rebook_appointment #schedule_div").empty();

    var doctor_sessions = [];
    var url = '{{ route("doctor_sessions_appointments", ":id") }}';
    url = url.replace(':id', appointment.employee_id);
    $.ajax({
      type:'POST',
      url: url,
      data: {
          _token: "{{ csrf_token() }}",
          from: moment().startOf('day').format('YYYY-MM-DD HH:mm:ss'),
          to: moment().startOf('day').add(30, 'd').format('YYYY-MM-DD HH:mm:ss')
       },
       beforeSend: function(){
         $("#request_rebook_appointment #overlay").fadeIn(300);
       },
       complete: function(){
           setTimeout(function(){
           $("#request_rebook_appointment #overlay").fadeOut(300);
         },500);
       },
       error: function (data) {
           console.log('Error:', data);
       },
       success: function (data) {
         var doctor_sessions = data.sessions;
         var doctor_appointments = data.appointments;

         var expire_duration = 30;
         var start_date = moment();
         var expire_date = moment().add(expire_duration, 'd');

         // var schedule_header = "";
         for(var index=0; index<Math.ceil(expire_duration/7); index++){
           $("#request_rebook_appointment #schedule_div").append('<div class="card booking-schedule schedule-widget" id="schedule_div_'+index+'" '+(index!=0?'hidden':'')+'>'
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

           $("#request_rebook_appointment #day_slot_"+index+" ul").append('<li class="left-arrow" '+(index==0?'hidden':'')+'>'
           +'					<a href="" onclick="return movePreviousExtraRebookAppointment('+(index-1)+');">'
           +'						<i class="fa fa-chevron-left"></i>'
           +'					</a>'
           +'				</li>');
           var day=0;
           var day_num = (parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1)>5?0:(parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1);
           while(day<6 && start_date.isBefore(expire_date.add(1, 'days'))){
             if(start_date.format("ddd")=='Fri'){
               start_date.add(1,'days');
               continue;
             }else{
               //Header
               $("#request_rebook_appointment #day_slot_"+index+" ul").append('<li>'
                 +'<span>'+start_date.format("ddd")+'</span>'
                 +'<span class="slot-date">'+start_date.format("DD/MM/YYYY")+'</span>'
                 +'</li>');

               //Body
               var day_sessions="";
               for(var doctor_session=0; doctor_session<doctor_sessions.length; doctor_session++){
                 if(doctor_sessions[doctor_session].type == 3){
                   var session_sc = doctor_sessions[doctor_session].emp_session_time_days;
                   for(var i=0; i<session_sc.length; i++){
                     if(eval('session_sc['+i+'].day_'+day_num) != null){
                       date = moment(new Date(new Date(start_date).toDateString() +' '+ eval('session_sc['+i+'].day_'+day_num))).format('YYYY-MM-DD_HH-mm-ss');
                       day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addExtraRequestAppointment(this,'+start_date+')">'
                         +'		<span>'+(new Date(new Date().toDateString() + ' ' + eval('session_sc['+i+'].day_'+day_num)).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                         +'	</a>';
                     }
                   }
                 }else{
                   var attend_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].attend_time);
                   var leave_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].leave_time);

                   for(var hour = 0; hour<((leave_time-attend_time)/1000/60/ session_duration) ; hour++){
                     for(var session = 0; session<session_patient_number; session++){
                       date = moment(new Date(new Date(start_date).toDateString() +' '+ new Date(attend_time.getTime() + (session_duration * hour)* 60000).toTimeString())).format('YYYY-MM-DD_HH-mm-ss');
                       day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addExtraRequestAppointment(this,'+start_date+')">'
                         +'		<span>'+(new Date(attend_time.getTime() + (session_duration * hour)* 60000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                         +'	</a>';
                     }
                   }
                 }
               }
               $("#request_rebook_appointment #time_slot_"+index+" ul").append('<li>'
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
           $("#request_rebook_appointment #day_slot_"+index+" ul").append('<li class="right-arrow" '+(index==(Math.ceil(expire_duration/7)-1)?'hidden':'')+'>'
           +'					<a href="" onclick="return moveNextExtraRebookAppointment('+(index+1)+');">'
           +'						<i class="fa fa-chevron-right"></i>'
           +'					</a>'
           +'				</li>');

         }
         // Add appointments
         for(var i = 0; i<doctor_appointments.length; i++){
           $($("#request_rebook_appointment a#date_"+((doctor_appointments[i].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing").not(".disabled")[0]).addClass("disabled");
         }
       }
      });
  });

  $("#request_rebook_appointment form").submit(function (e) {
      $("#request_rebook_appointment #text-btn").attr("hidden", true);
      $("#request_rebook_appointment #text-loading").attr("hidden", false);
      $("#request_rebook_appointment #save").attr("disabled", true);
      return true;
  });
});
</script>
