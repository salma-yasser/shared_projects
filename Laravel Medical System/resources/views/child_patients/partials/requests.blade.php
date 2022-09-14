<div class="card mb-0">
  <div class="card-body pt-0">
    <div class="table-responsive pt-3">
      <table id="table_requests" class="datatable table table-hover table-center mb-0">
        <thead>
          <tr>
            <th>تاريخ الطلب</th>
            <th>رقم الطلب</th>
            <th>نوع الطلب</th>
            <th>حالة الطلب</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($child_patient->child_cancel_requests as $cancel)
                <tr id="{{$cancel->id}}">
                  <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cancel->created_at)->format('Y/m/d')}}</td>
                  <td>{{$cancel->id}}</td>
                  <td>
                    طلب الغاء/استرداد للحجز رقم #{{$cancel->child_package_id}}
                  </td>
                  <td>
                    @if(!is_null($cancel->status))
                      @if($cancel->status==0)
                        <span class="badge badge-pill bg-danger-light">مرفوض</span>
                      @elseif($cancel->status==1)
                        <span class="badge badge-pill bg-success-light">مقبول</span>
                      @endif
                    @else
                      <span class="badge badge-pill bg-warning-light">في الانتظار</span>
                    @endif
                  </td>
                  <td>
                    @if($cancel->status==1)
                      استرداد مبلغ {{$cancel->child_package->refund}}
                    @endif
                  </td>
                </tr>
            @endforeach
            @foreach($child_patient->child_discount_requests as $discount)
                <tr id="{{$discount->id}}">
                  <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $discount->created_at)->format('Y/m/d')}}</td>
                  <td>{{$discount->id}}</td>
                  <td>
                    طلب خصم لحجز رقم #{{$discount->child_package_id}}
                  </td>
                  <td>
                    @if(!is_null($discount->status))
                      @if($discount->status==0)
                        <span class="badge badge-pill bg-danger-light">مرفوض</span>
                      @elseif($discount->status==1)
                        <span class="badge badge-pill bg-success-light">مقبول</span>
                      @endif
                    @else
                      <span class="badge badge-pill bg-warning-light">في الانتظار</span>
                    @endif
                  </td>
                  <td>
                    @if($discount->status==1)
                      الموعد الجديد {{$discount->child_package->discount}}
                    @endif
                  </td>
                </tr>
            @endforeach
            @foreach($child_patient->child_change_appointment_requests as $change_appointment)
                <tr id="{{$change_appointment->id}}">
                  <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $change_appointment->created_at)->format('Y/m/d')}}</td>
                  <td>{{$change_appointment->id}}</td>
                  <td>
                    طلب تغيير الموعد <span class="d-block text-info">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $change_appointment->child_appointment->time)->format('Y/m/d h:i a')}}</span>
                  </td>
                  <td>
                    @if(!is_null($change_appointment->status))
                      @if($change_appointment->status==0)
                        <span class="badge badge-pill bg-danger-light">مرفوض</span>
                      @elseif($change_appointment->status==1)
                        <span class="badge badge-pill bg-success-light">مقبول</span>
                      @endif
                    @else
                      <span class="badge badge-pill bg-warning-light">في الانتظار</span>
                    @endif
                  </td>
                  <td>
                    @if($change_appointment->status==1)
                      الموعد الجديد <span class="d-block text-info">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $change_appointment->time)->format('Y/m/d h:i a')}}</span>
                    @endif
                  </td>
                </tr>
            @endforeach
            @foreach($child_patient->child_extra_rebook_requests as $extra_rebook)
                <tr id="{{$extra_rebook->id}}">
                  <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $extra_rebook->created_at)->format('Y/m/d')}}</td>
                  <td>{{$extra_rebook->id}}</td>
                  <td>
                    طلب تعويض اضافي للموعد <span class="d-block text-info">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $extra_rebook->child_appointment->time)->format('Y/m/d h:i a')}}</span>
                  </td>
                  <td>
                    @if(!is_null($extra_rebook->status))
                      @if($extra_rebook->status==0)
                        <span class="badge badge-pill bg-danger-light">مرفوض</span>
                      @elseif($extra_rebook->status==1)
                        <span class="badge badge-pill bg-success-light">مقبول</span>
                      @endif
                    @else
                      <span class="badge badge-pill bg-warning-light">في الانتظار</span>
                    @endif
                  </td>
                  <td>
                    @if($extra_rebook->status==1)
                      الموعد الجديد <span class="d-block text-info">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $extra_rebook->time)->format('Y/m/d h:i a')}}</span>
                    @endif
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<style>
#table_requests th, td { text-align: center; }
</style>
<script>
$(document).ready(function() {
    $('#table_requests').DataTable().order( [ 0, 'desc' ] ).draw();
});
</script>
