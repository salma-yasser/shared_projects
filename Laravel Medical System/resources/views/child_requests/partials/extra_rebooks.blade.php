<div class="card mb-0">
  <div class="card-body pt-0">
    <div class="table-responsive pt-3">
      <table id="table_extra_rebooks" class="datatable table table-hover table-center mb-0">
        <thead>
          <tr>
            <th>رقم الطلب</th>
            <th>القسم</th>
            <th>رقم الحجز</th>
            <th>اسم المريض</th>
            <th>الطبيب المعالج</th>
            <th>حالة الحجز</th>
            <th>حالة الطلب</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($extra_rebooks as $extra_rebook)
          <tr id="extra_rebook_{{$extra_rebook->id}}">
            <td>{{ $extra_rebook->id }}</td>
            <td>{{ $extra_rebook->child_appointment->department_package->department->name }}</td>
            <td>{{ $extra_rebook->child_appointment_id }}</td>
            <td>{{ is_null($extra_rebook->child_appointment->child_patient)?'--':$extra_rebook->child_appointment->child_patient->name }}</td>
            <td>
              <h2 class="table-avatar">
                <a href="{{ route('doctors.show', $extra_rebook->child_appointment->employee_id) }}" class="avatar avatar-sm mr-2">
                  <img class="avatar-img rounded-circle" src="{{ is_null($extra_rebook->child_appointment->employee)?'':$extra_rebook->child_appointment->employee->profile_photo_url }}">
                </a>
                <a href="{{ route('doctors.show', $extra_rebook->child_appointment->employee_id) }}">{{ is_null($extra_rebook->child_appointment->employee)?'--':$extra_rebook->child_appointment->employee->name }}</a>
              </h2>
            </td>
            <td>{!! config('enums.patient_package_status.'.$extra_rebook->child_appointment->child_package->status) !!}</td>
            <td>
               @if(!is_null($extra_rebook->status) && $extra_rebook->status==1)
                  <span class="badge badge-pill bg-success-light">مقبول</span>
               @elseif(!is_null($extra_rebook->status) && $extra_rebook->status==0)
                  <span class="badge badge-pill bg-danger-light">مرفوض</span>
               @endif
            </td>
            <td class="text-right">
              <div class="table-action">
                <a href="{{ route('child_extra_rebook_requests.show', $extra_rebook->id) }}" class="btn btn-sm bg-info-light">
                  <i class="far fa-eye"></i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<style>
#table_extra_rebooks th, td { text-align: center; }
</style>
<script>
$(document).ready(function() {
    $('#table_extra_rebooks').DataTable().order( [ 0, 'desc' ] ).draw();
});
</script>
