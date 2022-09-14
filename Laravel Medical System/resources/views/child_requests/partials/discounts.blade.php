<div class="card mb-0">
  <div class="card-body pt-0">
    <div class="table-responsive pt-3">
      <table id="table_discounts" class="datatable table table-hover table-center mb-0">
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
          @foreach ($discounts as $discount)
          <tr id="discount_{{$discount->id}}">
            <td>{{ $discount->id }}</td>
            <td>{{ $discount->child_package->department_package->department->name }}</td>
            <td>{{ $discount->child_package_id }}</td>
            <td>{{ is_null($discount->child_package->child_patient)?'--':$discount->child_package->child_patient->name }}</td>
            <td>
              <h2 class="table-avatar">
                <a href="{{ route('doctors.show', $discount->child_package->employee_id) }}" class="avatar avatar-sm mr-2">
                  <img class="avatar-img rounded-circle" src="{{ is_null($discount->child_package->employee)?'':$discount->child_package->employee->profile_photo_url }}">
                </a>
                <a href="{{ route('doctors.show', $discount->child_package->employee_id) }}">{{ is_null($discount->child_package->employee)?'--':$discount->child_package->employee->name }}</a>
              </h2>
            </td>
            <td>{!! config('enums.patient_package_status.'.$discount->child_package->status) !!}</td>
            <td>
               @if(!is_null($discount->status) && $discount->status==1)
                  <span class="badge badge-pill bg-success-light">مقبول</span>
               @elseif(!is_null($discount->status) && $discount->status==0)
                  <span class="badge badge-pill bg-danger-light">مرفوض</span>
               @endif
            </td>
            <td class="text-right">
              <div class="table-action">
                <a href="{{ route('child_discount_requests.show', $discount->id) }}" class="btn btn-sm bg-info-light">
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
<script>
$(document).ready(function() {
    $('#table_discounts').DataTable().order( [ 0, 'desc' ] ).draw();
});
</script>
