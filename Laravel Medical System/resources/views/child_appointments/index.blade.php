@extends('layouts.app')
@section('title','سجل مواعيد الأطفال')
@section('content')
@include('general.delete_confirmation_modal')
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">سجل مواعيد الأطفال</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">قسم الأطفال</li>
						<li class="breadcrumb-item active">سجل مواعيد الأطفال</li>
					</ul>
				</div>
        <div class="col-md-6 col-auto">
          <div class="col-12 col-sm-8 col-md-8 text-sm-right float-right">
            <h5 id="reportrange_label">Today</h5>
						<div id="reportrange" class="btn btn-white btn-sm mb-3">
							<i class="far fa-calendar-alt mr-2"></i>
							<span></span>
							<i class="fas fa-chevron-down ml-2"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div>
    @endif

    <div class="row">
      <div class="col-md-12">
      		<div class="card mb-0">
      			<div class="card-body">
              <div class="row">

              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
              			<div class="card-body">
                      <div class="table-responsive" style="overflow-x: unset;">
                        <!-- <div class="col-md-12 submit-section proceed-btn text-right">
                            <a href="#" data-toggle="modal" class="btn btn-primary submit-btn"><i class="fas fa-print"></i> طباعة</a>
                        </div> -->
                        <input id="appointment_status" type="text" value="{{ json_encode(config('enums.patient_appointment_status')) }}" hidden/>
                        <table id="table_appointment" class="datatable table table-hover table-center mb-0">
                          <thead>
                            <tr>
                                <th>الموعد</th>
                                <th>اسم المريض</th>
                                <th>نوع الحجز</th>
                                <th>الطبيب المعالج</th>
                                <th>الحضور</th>
                                <th>حالة الدفع</th>
                            </tr>
                          </thead>
                          <tbody id="table_appointment_body">
                            @foreach ($child_appointments as $child_appointment)
                             <tr>
                                 <td>
                                   {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $child_appointment->time)->format('Y/m/d') }}
                                   <span class="d-block text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $child_appointment->time)->format('a h:i') }}</span>
                                 </td>
                                 <td><h2 class="table-avatar"><a href="{{ route('child_patients.show', $child_appointment->child_patient_id) }}">{{ $child_appointment->child_patient->name }}</a></h2></td>
                                 <td>{{ is_null($child_appointment->department_package)?'--':$child_appointment->department_package->name.' '. (is_null($child_appointment->child_package)?'':$child_appointment->department_package->session_number.' ('.$child_appointment->name.')') }}</td>
                                 <td>
                                   <h2 class="table-avatar">
                                     <a href="{{ route('doctors.show', $child_appointment->employee_id) }}" class="avatar avatar-sm mr-2">
                                       <img class="avatar-img rounded-circle" src="{{ is_null($child_appointment->employee)?'':$child_appointment->employee->profile_photo_url }}">
                                     </a>
                                     <a href="{{ route('doctors.show', $child_appointment->employee_id) }}">{{ is_null($child_appointment->employee)?'--':$child_appointment->employee->name }}</a>
                                   </h2>
                                 </td>
                                 <td id="td_status_{{ $child_appointment->id }}">
                                   @if((Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $child_appointment->time)->startOfDay())->lte(Carbon\Carbon::now()->startOfDay()) && $child_appointment->status == 0)
                                      @foreach(config('enums.patient_appointment_status') as $key => $value)
                                         @if($key != 0)
                                           <div class="form-check text-center pl-0">
                                             <button type="button" id="status_{{$key}}" class="btn btn-block btn-light btn-sm" onclick="updateStatus('{{$child_appointment->id}}_{{$key}}_{{$value}}')">{!! $value !!}</button>
                                           </div>
                                         @endif
                                       @endforeach
                                   @else
                                     {!! config('enums.patient_appointment_status.'.$child_appointment->status) !!}
                                     @if(!is_null($child_appointment->medical_execuse_file) && !empty($child_appointment->medical_execuse_file))
                                       <a href="{{ route('download', $child_appointment->medical_execuse_file) }}" class="btn btn-sm bg-primary-light">
                                           <i class="fas fa-download"></i>
                                       </a>
                                     @endif
                                     @if($child_appointment->child_appointment_id > '0')
                                       <br/>تعويض
                                       ({{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $child_appointment->child_appointment->time)->format('Y/m/d') }})
                                       <span class="d-block text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $child_appointment->child_appointment->time)->format('a h:i') }}</span>
                                     @endif
                                   @endif
                                 </td>
                                 <td class="text-center">
                                   @if(is_null($child_appointment->child_package))
                                    @if($child_appointment->rest==0)
                                      <span class="badge badge-pill bg-success inv-badge">تم الدفع</span>
                                    @else
                                      {{ $child_appointment->rest }}
                                    @endif
                                  @else
                                    @if($child_appointment->child_package->rest==0)
                                      <span class="badge badge-pill bg-success inv-badge">تم الدفع</span>
                                    @else
                                      {{ $child_appointment->child_package->rest }}
                                    @endif
                                  @endif
                                 </td>
                             </tr>
                             @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div id="confirmMessage" class="modal fade" role="dialog"  aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- header modal -->
        <div class="modal-header">
            <h5 class="modal-title">تنبيه</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div>

        <!-- body modal -->
        <div class="modal-body text-center">
            <span id="message"></span>
            <form id="confirmForm" method="post" class="mt-3" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-md-12" id="medical_execuse_file" hidden>
                  <div class="form-group row">
                    <label for="medical_execuse_file" class="col-sm-4 col-form-label">ملف العذر الطبي<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control file" name="medical_execuse_file"/>
                    </div>
                  </div>
                </div>
                <input type="text" name="status" value="" hidden/>
                <input type="text" name="type" value="" hidden/>
                <button type="submit" value="confirm" class="btn btn-primary">متأكد</button>
            </form>
        </div>

    </div>
</div>
</div>
<div id="overlay">
<div class="cv-spinner">
  <span class="spinner"></span>
</div>
</div>
<style>
#table_appointment th, td { text-align: center; }
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
var start = moment();
var end = moment();
function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}
$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Today': [moment(), moment()],
       'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
       'This Week': [moment().startOf('week').subtract(1, 'days'), moment().endOf('week').subtract(1, 'days')],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
    }
}, cb);
cb(start, end);

$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
  var chosen_label = picker.chosenLabel;
  $.ajax({
    type:'POST',
    url: '{{ route("child_appointments.display") }}',
    data: {
        _token: "{{ csrf_token() }}",
        from: picker.startDate.format('YYYY-MM-DD HH:mm:ss'),
        to: picker.endDate.format('YYYY-MM-DD HH:mm:ss')
    },
    beforeSend: function(){
      $("#overlay").fadeIn(300);
    },
    complete: function(){
        setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
    },
    error: function (data) {
        console.log('Error:', data);
    },
    success: function (data) {
      $('#table_appointment').DataTable().clear().draw();
      $.each(data, function(i, obj){
        var child_patients_show = '{{ route("child_patients.show", ":id") }}';
        child_patients_show = child_patients_show.replace(':id', obj.child_patient_id);

        var download_url = '{{ route("download", ":id") }}';
        download_url = download_url.replace(':id', obj.medical_execuse_file);

        var column5 = '';
        if(moment(obj.time, "YYYY-MM-DD HH:mm:ss").startOf('day')<=moment().startOf('day') && obj.status == 0){
          $.each(JSON.parse($('#appointment_status').val()), function(key, value){
              if(key != 0){
                column5 += ''
                +'<div class="form-check text-center pl-0">'
                +' <button type="button" id="status_'+key+'" class="btn btn-block btn-light btn-sm" onclick="updateStatus(\''+obj.id+'_'+key+'_'+value.replace(/\"/g,'&quot;')+'\')">'+value+'</button>'
                +'</div>';
              }
            });
        }else{
          column5 += JSON.parse($('#appointment_status').val())[obj.status];
          if((obj.medical_execuse_file != null) && (obj.medical_execuse_file!='')){
            column5 += '	   <a href="'+download_url+'" class="btn btn-sm bg-primary-light">'
            +'		   <i class="fas fa-download"></i>'
            +'	   </a>';
          }
          if(obj.child_appointment_id > '0'){
            column5 +='<br/>تعويض'
            +'('+moment(obj.child_appointment.time, "YYYY-MM-DD HH:mm:ss").format("YYYY/MM/DD")+')'
            +'   <span class="d-block text-info">'+moment(obj.child_appointment.time ,"YYYY-MM-DD HH:mm:ss").format("a hh:mm")+'</span>';
          }
        }

        var column6 = '';
        if(obj.child_package == null){
          if(obj.rest==0){
            column6 += '	  <span class="badge badge-pill bg-success inv-badge">تم الدفع</span>';
          }else{
            column6 += obj.rest;
          }
        }else{
          if(obj.child_package.rest==0){
            column6 += '	  <span class="badge badge-pill bg-success inv-badge">تم الدفع</span>';
          }else{
            column6 += obj.child_package.rest;
          }
        }

        var doctor_profile = '{{ route("doctors.show", ":id") }}';
        doctor_profile = doctor_profile.replace(':id', obj.employee_id);

        var table = $('#table_appointment').DataTable();
        table.row.add([
          moment(obj.time,"YYYY-MM-DD HH:mm:ss").format("YYYY/MM/DD")
          +'   <span class="d-block text-info">'+moment(obj.time ,"YYYY-MM-DD HH:mm:ss").format("a hh:mm")+'</span>',

          '<h2 class="table-avatar"><a href="'+child_patients_show+'">'+obj.child_patient.name+'</a></h2>',

          (obj.department_package==null?'--':obj.department_package.name+' '+(obj.child_package==null?'':obj.department_package.session_number+' ('+obj.name+')')),

          '<h2 class="table-avatar">'
          +'	 <a href="'+doctor_profile+'" class="avatar avatar-sm mr-2">'
          +'	   <img class="avatar-img rounded-circle" src="'+(obj.employee==null?'':obj.employee.profile_photo_url)+'">'
          +'	 </a>'
          +'	 <a href="'+doctor_profile+'">'+(obj.employee==null?'--':obj.employee.name) +'</a>'
          +'   </h2>',

          column5,
          column6
        ]).node().children[4].id = 'td_status_'+obj.id;
        table.draw();

      });
      $('#reportrange_label').html(chosen_label);
    }
  });
});

function updateStatus(data){
    var value = data.split("_");
    var appointment_id = value[0];
    var status = value[1];
    if(status == "{{config('enums.patient_appointment_status_values.execuse_medical')}}"){
      $("#confirmMessage #medical_execuse_file").attr("hidden", false);
      $("#confirmMessage #medical_execuse_file input[type='file']").attr("required", true);
    }else{
      $("#confirmMessage #medical_execuse_file").attr("hidden", true);
      $("#confirmMessage #medical_execuse_file input[type='file']").attr("required", false);
    }
    $("#confirmForm input[name='status']").val(status);
    $("#confirmForm input[name='type']").val("status_ajax");
    $('#confirmMessage #message').html("هل انت متأكد من انه "+value[2]+"؟");
    var url = '{{ route("child_appointments.update", ":id") }}';
    url = url.replace(':id', appointment_id);
    $("#confirmForm").attr('action', url);
    $('#confirmMessage').modal('show');
}

$(document).ready(function() {
    // $('#table_appointment').DataTable().order( [ 3, 'asc' ] ).draw();
    $('#table_packages').DataTable().order( [ 0, 'desc' ] ).draw();

    $("#confirmForm").submit(function(e){
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var data = new FormData();
        // var data = form.serializeArray();

        //Form data
        var form_data = form.serializeArray();
        $.each(form_data, function (key, input) {
            data.append(input.name, input.value);
        });

        //File data
        var file_data = $('#confirmForm input[name="medical_execuse_file"]')[0].files;
        if(file_data.length>0){
          data.append('medical_execuse_file', file_data[0]);
        }

        $.ajax({
          type:'POST',
          url: url,
          data: data,
          processData: false,
          contentType: false,
          beforeSend: function(){
            $("#overlay").fadeIn(300);
            $('#confirmMessage').modal('hide');
          },
          complete: function(){
              setTimeout(function(){
              $("#overlay").fadeOut(300);
            },500);
          },
          error: function (data) {
              console.log('Error:', data);
          },
          success: function (data) {
              var status_data = '';
              status_data += JSON.parse($('#appointment_status').val())[data.status];
              if((data.medical_execuse_file != null) && (data.medical_execuse_file!='')){
                var download_url = '{{ route("download", ":id") }}';
                download_url = download_url.replace(':id', data.medical_execuse_file);
                status_data += '	   <a href="'+download_url+'" class="btn btn-sm bg-primary-light">'
                +'		   <i class="fas fa-download"></i>'
                +'	   </a>';
              }
            $('#table_appointment').DataTable().cell("#td_status_"+data.id).data(status_data).draw();
          }
        });
      });
});
</script>
@endsection
