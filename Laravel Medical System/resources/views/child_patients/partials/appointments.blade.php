@include('child_patients.dialogs.rebook_appointment')
@include('child_patients.dialogs.request_rebook_appointment')
@include('child_patients.dialogs.request_change_appointment')

<div class="card mb-0">
  <div class="card-body pt-0">
    <!-- <div class="col-md-12 submit-section proceed-btn text-right pt-3 pr-0">
      <a href="#add_appointment" class="btn btn-primary submit-btn" data-toggle="modal">حجز موعد (كشف/جلسة مفردة)</a>
    </div> -->
    <div class="table-responsive pt-3">
      <input id="appointment_status" type="text" value="{{ json_encode(config('enums.patient_appointment_status')) }}" hidden/>
      <table id="table_appointment" class="datatable table table-hover table-center mb-0">
        <thead>
          <tr>
            <th>الموعد</th>
            <th>القسم</th>
            <th>نوع الحجز</th>
            <th>رقم الجلسة</th>
            <th>الطبيب المعالج</th>
            <th>الحضور</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($child_patient->child_appointments as $appointment)
                <tr id="{{$appointment->id}}">
                  <td>
                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('Y/m/d') }}
                    <span class="d-block text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('a h:i') }}</span>
                  </td>
                  <td>{{ $appointment->department_package->department->name }}</td>
                  <td>{{ is_null($appointment->department_package)?'--':$appointment->department_package->name.' '. ($appointment->department_package->session_number==1?'':$appointment->department_package->session_number.' جلسة') }}</td>
                  <td>{{ $appointment->name }}</td>
                  <td>
                    <h2 class="table-avatar">
                      <a href="{{ route('doctors.show', $appointment->employee_id) }}" class="avatar avatar-sm mr-2">
                        <img class="avatar-img rounded-circle" src="{{ is_null($appointment->employee)?'':$appointment->employee->profile_photo_url }}">
                      </a>
                      <a href="{{ route('doctors.show', $appointment->employee_id) }}">{{ is_null($appointment->employee)?'--':$appointment->employee->name }}</a>
                    </h2>
                  </td>
                  <td id="td_status_{{ $appointment->id }}">
                  @if((Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->startOfDay())->lte(Carbon\Carbon::now()->startOfDay()) && $appointment->status == 0)
                    @foreach(config('enums.patient_appointment_status') as $key => $value)
                     @if($key != 0)
                       <div class="form-check text-center pl-0">
                         <button type="button" id="status_{{$key}}" class="btn btn-block btn-light btn-sm" onclick="updateStatus('{{$appointment->id}}_{{$key}}_{{$value}}')">{!! $value !!}</button>
                       </div>
                     @endif
                    @endforeach
                  @else
                    {!! config('enums.patient_appointment_status.'.$appointment->status) !!}
                    @if(!is_null($appointment->medical_execuse_file) && !empty($appointment->medical_execuse_file))
                      <a href="{{ route('download', $appointment->medical_execuse_file) }}" class="btn btn-sm bg-primary-light">
                          <i class="fas fa-download"></i>
                      </a>
                    @endif
                    @if($appointment->child_appointment_id > '0')
                      <br/>تعويض
                      ({{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->child_appointment->time)->format('Y/m/d') }})
                      <span class="d-block text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->child_appointment->time)->format('a h:i') }}</span>
                    @endif
                  @endif
                  </td>
                  <td class="text-right">
                    <div class="table-action">
                        @if($appointment->child_package->status != config('enums.patient_package_status_values.pending') && $appointment->status == config('enums.patient_appointment_status_values.attend'))
                            <a data-toggle="modal" href="#request_rebook_appointment" data-item="{{ $appointment }}" data-session_duration="{{ is_null($appointment->department_package->department->department_session_settings)?1:$appointment->department_package->department->department_session_settings[0]->session_duration }}" data-session_patient_number="{{ is_null($appointment->department_package->department->department_session_settings)?0:$appointment->department_package->department->department_session_settings[0]->session_patient_number }}" class="btn btn-sm bg-danger-light">
                                <i class="fa fa-refresh"></i> طلب تعويض
                            </a>
                        @elseif($appointment->child_package->status != config('enums.patient_package_status_values.pending') && $appointment->child_appointment_id == '0')
                          <a id="rebook_{{ $appointment->id }}" data-toggle="modal" href="#rebook_appointment" data-item="{{ $appointment }}" data-session_duration="{{ is_null($appointment->department_package->department->department_session_settings)?1:$appointment->department_package->department->department_session_settings[0]->session_duration }}" data-session_patient_number="{{ is_null($appointment->department_package->department->department_session_settings)?0:$appointment->department_package->department->department_session_settings[0]->session_patient_number }}" class="btn btn-sm bg-info-light">
                            <i class="fa fa-refresh"></i> تعويض
                          </a>
                      @elseif($appointment->child_package->status != config('enums.patient_package_status_values.pending') && is_null($appointment->child_appointment_id) && ($appointment->department_package->session_number>1) && ($appointment->status == config('enums.patient_appointment_status_values.absent') || $appointment->status == config('enums.patient_appointment_status_values.execuse_telephone')))
                        <a data-toggle="modal" href="#request_rebook_appointment" data-item="{{ $appointment }}" data-session_duration="{{ is_null($appointment->department_package->department->department_session_settings)?1:$appointment->department_package->department->department_session_settings[0]->session_duration }}" data-session_patient_number="{{ is_null($appointment->department_package->department->department_session_settings)?0:$appointment->department_package->department->department_session_settings[0]->session_patient_number }}" class="btn btn-sm bg-danger-light">
                          <i class="fa fa-refresh"></i> طلب تعويض
                        </a>
                      @endif
                      @if($appointment->status == config('enums.patient_appointment_status_values.notyet') && (Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->startOfDay())->gt(Carbon\Carbon::now()->startOfDay()))
                        <a data-toggle="modal" href="#request_change_appointment" data-item="{{ $appointment }}" data-session_duration="{{ is_null($appointment->department_package->department->department_session_settings)?1:$appointment->department_package->department->department_session_settings[0]->session_duration }}" data-session_patient_number="{{ is_null($appointment->department_package->department->department_session_settings)?0:$appointment->department_package->department->department_session_settings[0]->session_patient_number }}" class="btn btn-sm bg-warning-light">
                          <i class="far fa-edit"></i> تحديث موعد
                        </a>
                      @endif
                      <!-- <a data-toggle="modal" href="#edit_appointment" data-item="{{ $appointment }}" class="btn btn-sm bg-info-light">
                        <i class="far fa-edit"></i> Edit
                      </a> -->
                    </div>
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
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

                <button id="btn-submit" type="submit" value="confirm" class="btn btn-primary">
                  <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  من فضلك انتظر...</span>
                  <span id="text-btn" >متأكد</span>
                </button>
            </form>
        </div>
    </div>
</div>
</div>
<style>
#table_appointment th, td { text-align: center; }
</style>
<script>
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
    $("#confirmForm input[name='type']").val("status");
    $('#confirmMessage #message').html("هل انت متأكد من انه "+value[2]+"؟");
    var url = '{{ route("child_appointments.update", ":id") }}';
    url = url.replace(':id', appointment_id);
    $("#confirmForm").attr('action', url);
    $('#confirmMessage').modal('show');
}

$(document).ready(function() {
    $('#table_appointment').DataTable().order( [ 0, 'desc' ] ).draw(false);

    $("#confirmMessage form").submit(function (e) {
        $("#confirmMessage #text-btn").attr("hidden", true);
        $("#confirmMessage #text-loading").attr("hidden", false);
        $("#confirmMessage #btn-submit").attr("disabled", true);
        return true;
    });
});
</script>
