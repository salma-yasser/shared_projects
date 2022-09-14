<div class="modal fade" id="rebook_appointment" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تعويض الموعد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="rebook_appointment_form" action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
            <input id="child_appointment" value="" hidden/>
            <input name="type" value="rebook_appointment" hidden/>
            <div class="row form-row">
              <div class="col-md-12" id="schedule_div">

              </div>
            </div>

            <button id="save_button" type="submit" class="btn btn-primary btn-block" disabled="true">
              <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            من فضلك انتظر...</span>
              <span id="text-btn" >حجز</span>
            </button>
            <!-- <button id="save_button" type="submit" class="btn btn-primary btn-block" disabled="true">حجز</button> -->
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
<style>
  #rebook_appointment #overlay{
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
</style>
<script>
if ("{{count($errors->rebook_appointment) > 0}}"){
    $('#rebook_appointment').modal('show');
}

function moveNextRebookAppointment(index){
  $("#rebook_appointment #schedule_div_"+(index-1)).attr('hidden',true);
  $("#rebook_appointment #schedule_div_"+index).attr('hidden',false);
  return false;
}
function movePreviousRebookAppointment(index){
  $("#rebook_appointment #schedule_div_"+(index+1)).attr('hidden',true);
  $("#rebook_appointment #schedule_div_"+index).attr('hidden',false);
  return false;
}

function addExtraAppointment(object, start_date){
    var appointments = $("input[name='appointments[]']").map(function(){return $(this).val();}).get();
    var max = 1;
    if(appointments.length<max){
      var appointment = moment(new Date (new Date(start_date).toDateString() + ' ' + object.children[0].innerHTML)).format("YYYY-MM-DD HH:mm:ss");
      $(object).append("<input name='appointments[]' value='"+appointment+"' hidden/>");
      $(object).addClass("selected");
      if(appointments.length==(max-1)){
        $("#rebook_appointment button[type='submit']").attr("disabled", false);
      }
    }else{
      alert("لقد وصلت للحد الأقصى من الجلسات");
    }
  return false;
}

$(document).ready(function () {

  $('#rebook_appointment').on('show.bs.modal', function(e) {
    var appointment = $(e.relatedTarget).data('item');
    var session_patient_number = $(e.relatedTarget).data('session_patient_number');
    var session_duration = $(e.relatedTarget).data('session_duration');
    var url = '{{ route("child_appointments.update", ":id") }}';
    url = url.replace(':id', appointment.id);
    $("#rebook_appointment form").attr("action", url);
    $("#rebook_appointment #child_appointment").val(JSON.stringify(appointment));
    $("#rebook_appointment #schedule_div").empty();

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
         $("#rebook_appointment #overlay").fadeIn(300);
       },
       complete: function(){
           setTimeout(function(){
           $("#rebook_appointment #overlay").fadeOut(300);
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
           $("#rebook_appointment #schedule_div").append('<div class="card booking-schedule schedule-widget" id="schedule_div_'+index+'" '+(index!=0?'hidden':'')+'>'
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

           $("#rebook_appointment #day_slot_"+index+" ul").append('<li class="left-arrow" '+(index==0?'hidden':'')+'>'
           +'					<a href="" onclick="return movePreviousRebookAppointment('+(index-1)+');">'
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
               $("#rebook_appointment #day_slot_"+index+" ul").append('<li>'
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
                       day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addExtraAppointment(this,'+start_date+')">'
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
                       day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addExtraAppointment(this,'+start_date+')">'
                         +'		<span>'+(new Date(attend_time.getTime() + (session_duration * hour)* 60000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                         +'	</a>';
                     }
                   }
                 }
               }
               $("#rebook_appointment #time_slot_"+index+" ul").append('<li>'
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
           $("#rebook_appointment #day_slot_"+index+" ul").append('<li class="right-arrow" '+(index==(Math.ceil(expire_duration/7)-1)?'hidden':'')+'>'
           +'					<a href="" onclick="return moveNextRebookAppointment('+(index+1)+');">'
           +'						<i class="fa fa-chevron-right"></i>'
           +'					</a>'
           +'				</li>');

         }
         // Add appointments
         for(var i = 0; i<doctor_appointments.length; i++){
           $($("#rebook_appointment a#date_"+((doctor_appointments[i].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing").not(".disabled")[0]).addClass("disabled");
         }
       }
      });
  });

  $("#rebook_appointment #rebook_appointment_form").submit(function (e) {
      $("#rebook_appointment #rebook_appointment_form #text-btn").attr("hidden", true);
      $("#rebook_appointment #rebook_appointment_form #text-loading").attr("hidden", false);
      $("#rebook_appointment #rebook_appointment_form #save_button").attr("disabled", true);
      return true;
  });
});
</script>
