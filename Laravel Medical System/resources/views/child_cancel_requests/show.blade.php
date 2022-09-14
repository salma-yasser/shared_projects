@extends('layouts.app')
@section('title','طلب الغاء/استرداد حجز')
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col">
            <h3 class="page-title">طلب الغاء/استرداد حجز</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">قسم الأطفال</li>
              <li class="breadcrumb-item active">رقم الطلب : {{ $childCancelRequest->id }}
                @if(!is_null($childCancelRequest->status))
                  @if($childCancelRequest->status==0)
                    <span class="badge badge-pill bg-danger-light">مرفوض</span>
                  @elseif($childCancelRequest->status==1)
                    <span class="badge badge-pill bg-success-light">مقبول</span>
                  @endif
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

		<div class="row">
			<div class="col-12">
        <form id="form" action="{{ route('child_cancel_requests.update', $childCancelRequest->id ) }}" method="POST">
            @method('PUT')
            @csrf
				<div class="card">
					<div class="card-body">
						<div class="booking-doc-info">
							<a href="{{ route('child_patients.show', $childCancelRequest->child_package->child_patient_id) }}" class="booking-doc-img">
								<img src="{{ is_null($childCancelRequest->child_package->child_patient->profile_photo_url)? asset('assets/img/doctors/doctor-thumb-02.jpg'):$childCancelRequest->profile_photo_url}}" alt="User Image">
							</a>
							<div class="booking-info">
								<h4><a class="text-muted" href="{{ route('child_patients.show', $childCancelRequest->child_package->child_patient_id) }}">{{$childCancelRequest->child_package->child_patient->fullname}}</a></h4>
                <p class="doc-department mb-0"><i class="fas fa-user-tag"></i> قسم {{ $childCancelRequest->child_package->department_package->department->name }}</p>
								<p class="text-muted mb-0"><i class="fas fa-user-md"></i> {{$childCancelRequest->child_package->employee->name}}</p>
							</div>
						</div>
					</div>
				</div>
        <div class="card">
					<div class="card-body">
            <div class="row form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="child_package">رقم الحجز - نوع الحجز</label>
                  <input id="child_package" type="text" value="{{'('.$childCancelRequest->child_package_id.'#) - '.($childCancelRequest->child_package->department_package->session_number==1?$childCancelRequest->child_package->department_package->name:$childCancelRequest->child_package->department_package->name.' '.$childCancelRequest->child_package->department_package->session_number.' جلسة') }}" class="form-control" name="child_package" readonly/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="rest_session_number">عدد الجلسات المتبقيه</label>
                  <input id="rest_session_number" type="text" value="{{ $childCancelRequest->child_package->rest_session_number }}" class="form-control" name="rest_session_number" readonly/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="supscription_date">تاريخ الاشتراك</label>
                  <input id="supscription_date" type="text" value="{{ $childCancelRequest->child_package->supscription_date }}" class="form-control" name="supscription_date" readonly/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="expire_date">تاريخ الانتهاء</label>
                  <input id="expire_date" type="text" value="{{ $childCancelRequest->child_package->expire_date }}" class="form-control {{(Carbon\Carbon::createFromFormat('d/m/Y', $childCancelRequest->child_package->expire_date))->lte(Carbon\Carbon::now())?'text-danger':''}}" name="expire_date" readonly/>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="cost">سعر الحجز</label>
                  <input id="cost-" type="text" value="{{ $childCancelRequest->child_package->cost }}" class="form-control" name="cost" readonly/>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="paid">المدفوع</label>
                  <input id="paid" type="text" value="{{ $childCancelRequest->child_package->paid }}" class="form-control" name="paid" readonly/>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="rest">المتبقي</label>
                  <input id="rest" type="text" value="{{ $childCancelRequest->child_package->rest }}" class="form-control" name="rest" readonly/>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="refund">المبلغ المسترد</label>
                  <input id="refund" type="text" value="{{ ($childCancelRequest->child_package->paid - (($childCancelRequest->child_package->department_package->session_number - $childCancelRequest->child_package->rest_session_number) * 150))<0?0:($childCancelRequest->child_package->paid - (($childCancelRequest->child_package->department_package->session_number - $childCancelRequest->child_package->rest_session_number) * 150)) }}" class="form-control" name="refund" readonly/>
                </div>
              </div>
            </div>
          </div>
        </div>

				<!-- Schedule Widget -->
        <div class="card mb-0">
          <div class="card-body pt-0">
            <div class="col-md-12 pt-3 pr-0 pl-0">
              <span class="float-left h3">مواعيد الحجز</span>
              <span class="text-muted float-right h5 mb-0">حالة الحجز: {!! config('enums.patient_package_status.'.$childCancelRequest->child_package->status) !!}</span>
            </div>
            <div class="table-responsive pt-3">
              <table id="table_appointment" class="datatable table table-hover table-center mb-0">
                <thead>
                  <tr>
                    <th>الموعد</th>
                    <th>رقم الجلسة</th>
                    <th>الطبيب المعالج</th>
                    <th>الحضور</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($childCancelRequest->child_package->child_appointments as $appointment)
                  <tr id="{{$appointment->id}}">
                    <td>
                      {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('Y/m/d') }}
                      <span class="d-block text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('a h:i') }}</span>
                    </td>
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
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
				<!-- /Schedule Widget -->

				<!-- Submit Section -->
          @if(is_null($childCancelRequest->status))
            <input id="status" name="status" value="" hidden/>
    				<div class="submit-section text-center mb-3 mt-2">
              <a href="" onclick="return setStatus(1);" class="btn btn-success submit-btn float-none">مقبول</a>
              <a href="" onclick="return setStatus(0);" class="btn btn-danger submit-btn float-none">مرفوض</a>
    				</div>
          @endif
        </form>
				<!-- /Submit Section -->

			</div>
		</div>
	</div>

</div>
<style>
#table_appointment th, td { text-align: center; }
</style>
<script>
  function setStatus(status){
    $("#form #status").val(status);
    $("#form").submit();
    return false;
  }
</script>
@endsection
