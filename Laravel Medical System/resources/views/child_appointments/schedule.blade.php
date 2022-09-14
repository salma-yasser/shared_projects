@extends('layouts.app')
@section('title','جدول مواعيد الأطفال اليوم')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">جدول مواعيد الأطفال اليوم</h3>
                    <h3 class="page-title-print">جدول مواعيد الأطفال اليوم {{Carbon\Carbon::now()->format('Y/m/d')}}</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">قسم الأطفال</li>
						<li class="breadcrumb-item active">جدول مواعيد الأطفال اليوم {{Carbon\Carbon::now()->format('Y/m/d')}}</li>
					</ul>
				</div>
        <div class="col-md-6 col-auto">
          <div class="submit-section proceed-btn text-right mt-4">
							<a href="" id="print" onclick="event.preventDefault();window.print();" class="btn btn-primary submit-btn"><i class="fas fa-print"></i> طباعة</a>
						</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        @php
          $day = 'day_'.((Carbon\Carbon::now()->dayOfWeek+1)>5?0:(Carbon\Carbon::now()->dayOfWeek+1));
        @endphp
        @foreach($doctors as $doctor)
        <!-- Schedule Widget -->
            <div class="card booking-schedule schedule-widget">

              <!-- Schedule Content -->
              <div class="schedule-cont">
                <div class="row">
                  <div class="col-md-12">

                    <!-- Time Slot -->
                    <div class="time-slot">
                      <div class="row" style="margin-bottom: 5px;">
                          <div class="col-md-2" style="text-align:center; padding:10px;">{{ $doctor->name }}<br/><h7 style="color:grey;">قسم ({{ $doctor->department->name }})</h7></div>
                          <div class="col-md-10">
                            <div class="row">
                              @foreach($doctor->emp_session_times() as $session_time)
                                @if($session_time->type == 3)
                                  @foreach($session_time->emp_session_time_days->pluck($day) as $time)
                                    @if(is_null($time))
                                      @continue
                                    @endif
                                    @for($sesion_patient_number = 0; $sesion_patient_number < $doctor->department->department_session_settings[0]->session_patient_number; $sesion_patient_number++)
                                    <div class="timing">
                                      <span style="font-size: 15px;font-weight: bold;"> {{ Carbon\Carbon::parse($time)->format('h:i a') }} </span></br></br>
                                      @foreach($doctor->child_appointments as $key => $appointment)
                                        @if(Carbon\Carbon::parse($time) ==  Carbon\Carbon::parse($appointment->time))
                                            <span>{{ $appointment->child_patient->name }}</span>
                                            @php
                                              $doctor->child_appointments->forget($key);
                                            @endphp
                                            @break;
                                        @endif
                                      @endforeach
                                    </div>
                                    @endfor
                                  @endforeach
                                @else
                                  @php
                                    $time = Carbon\Carbon::parse($session_time->attend_time);
                                  @endphp
                                  @while($time <= Carbon\Carbon::parse($session_time->leave_time))
                                  @for($sesion_patient_number = 0; $sesion_patient_number < $doctor->department->department_session_settings[0]->session_patient_number; $sesion_patient_number++)
                                  <div class="timing">
                                    <span style="font-size: 15px;font-weight: bold;"> {{ $time->format('h:i a') }} </span></br></br>
                                    @foreach($doctor->child_appointments as $key => $appointment)
                                      @if(Carbon\Carbon::parse($time) ==  Carbon\Carbon::parse($appointment->time))
                                          <span>{{ $appointment->child_patient->name }}</span>
                                          @php
                                            $doctor->child_appointments->forget($key);
                                          @endphp
                                          @break;
                                      @endif
                                    @endforeach
                                  </div>
                                  @endfor
                                    @php
                                      $time->addMinutes($doctor->department->department_session_settings[0]->session_duration);
                                    @endphp
                                  @endwhile
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- /Time Slot -->

                  </div>
              </div>
              <!-- /Schedule Content -->
            </div>
        </div>
        <!-- /Schedule Widget -->
        @endforeach
      </div>
    </div>
</div>
</div>
<style>
.time-slot {
  float: unset;
  padding-top: 0px;
  padding-bottom: 0px;
  width: 100%;
  padding-right: 2px;
  display: block;
}
.time-slot .timing{
	width: 100px;
	height: 100px;
	background-color: #e9e9e9;
	border: 1px solid #e9e9e9;
	border-radius: 3px;
	color: #757575;
	font-size: 14px;
	margin-right: 5px;
  margin-bottom: 5px;
	padding: 5px 5px;
	text-align: center;
	position: relative;
}

.page-title-print{
    display:none !important;
}
*{ -webkit-print-color-adjust: exact !important;}
    @media print {
        @page {
            size: A4 landscape;
            margin: 0;
        }
        .header, .sidebar, .page-title, .breadcrumb, #print{
            display:none !important;
        }
        .page-title-print{
            display:block !important;
        }
        .page-wrapper{
            margin-right: 0;
            padding-top: 0;
        }
    }
</style>
@endsection
