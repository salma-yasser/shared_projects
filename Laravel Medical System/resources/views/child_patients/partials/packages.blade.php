@include('child_patients.dialogs.add_package')
@include('child_patients.dialogs.edit_package')
@include('child_patients.dialogs.view_package')
@include('child_patients.dialogs.request_discount_package')
@include('child_patients.dialogs.request_cancel_package')
@include('child_patients.dialogs.pending_package')
@include('child_patients.dialogs.reactive_package')
<div class="card mb-0">
  <div class="card-body pt-0">
    <div class="col-md-12 submit-section proceed-btn text-right pt-3 pr-0 pl-0">
      <a href="#add_package" class="btn btn-primary submit-btn" data-toggle="modal"><i class="fas fa-plus-circle"></i> حجز جديد</a>
      <div class="float-left">
        <a href="#request_discount_package" class="btn btn-secondary submit-btn" data-toggle="modal"><i class="fa fa-percent"></i> طلب خصم</a>
        <a href="#request_cancel_package" class="btn btn-danger submit-btn" data-toggle="modal"><i class="fas fa-minus-circle"></i> طلب الغاء حجز</a>
        <a href="#pending_package" class="btn btn-warning submit-btn" data-toggle="modal"><i class="fas fa-ban"></i> ايقاف حجز</a>
      </div>
    </div>
    <div class="table-responsive pt-3">
      <input id="package_status" type="text" value="{{ json_encode(config('enums.patient_package_status')) }}" hidden/>
      <table id="table_packages" class="datatable table table-hover table-center mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th>قسم</th>
            <th>نوع الحجز</th>
            <th>الطبيب المعالج</th>
            <th>تاريخ الحجز</th>
            <th>تاريخ الانتهاء</th>
            <th>حالة الحجز</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($child_patient->child_packages as $package)
          <tr id="package_{{$package->id}}">
            <td>{{ $package->id }}</td>
            <td>{{ $package->department_package->department->name }}</td>
            <td>{{ is_null($package->department_package)?'--':$package->department_package->name.' '. ($package->department_package->session_number==1?'':$package->department_package->session_number.' جلسات') }}</td>
            <td>
              <h2 class="table-avatar">
                <a href="{{ route('doctors.show', $package->employee_id) }}" class="avatar avatar-sm mr-2">
                  <img class="avatar-img rounded-circle" src="{{ is_null($package->employee)?'':$package->employee->profile_photo_url }}">
                </a>
                <a href="{{ route('doctors.show', $package->employee_id) }}">{{ is_null($package->employee)?'--':$package->employee->name }}</a>
              </h2>
            </td>
            <td>{{ $package->supscription_date }}</td>
            <td>{{ $package->expire_date }}</td>
            <td>
              {!! config('enums.patient_package_status.'.$package->status) !!}
              @if($package->status == config('enums.patient_package_status_values.pending'))
                @if(!is_null($package->pending_file) && !empty($package->pending_file))
                  <a href="{{ route('download', $package->pending_file) }}" class="btn btn-sm bg-primary-light">
                      <i class="fas fa-download"></i>
                  </a>
                @endif
                @if(!is_null($package->pending_reason) && !empty($package->pending_reason))
                  <br/><span style="font-size:small;"> السبب: {{ $package->pending_reason }}</span>
                @endif
              @endif
            </td>
            <td class="text-right">
              <div class="table-action">
                <a id="edit_{{ $package->id }}" title="تعديل" data-toggle="modal" href="#edit_package" data-item="{{ $package }}" data-appointments="{{ $package->child_appointments }}" class="btn btn-sm bg-warning-light" {{$package->status == config('enums.patient_package_status_values.active')?'':'hidden'}}>
                  <i class="far fa-edit"></i>
                </a>
                <a id="reactive_{{ $package->id }}" title="اعادة تفعيل" data-toggle="modal" href="#reactive_package" data-item="{{ $package }}" data-appointments="{{ $package->child_appointments }}" class="btn btn-sm bg-danger-light"  {{$package->status == config('enums.patient_package_status_values.pending')?'':'hidden'}}>
                  <i class="fa fa-refresh"></i>
                </a>
                <a title="مشاهدة" data-toggle="modal" href="#view_package" data-item="{{ $package }}" data-appointments="{{ $package->child_appointments }}" class="btn btn-sm bg-info-light">
                  <i class="far fa-eye"></i>
                </a>
                <a href="{{ route('child_packages.show', $package->id) }}" onclick="e.preventDefault();" target="_blank" class="btn btn-sm bg-primary-light"  {{$package->status == config('enums.patient_package_status_values.active') || $package->status == config('enums.patient_package_status_values.completed')?'':'hidden'}}>
                  <i class="fas fa-print"></i>
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
<script>
$(document).ready(function() {
    $('#table_packages').DataTable().order( [ 0, 'desc' ] ).draw();
});
</script>
