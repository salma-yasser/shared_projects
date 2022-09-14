@extends('layouts.app')
@section('title','ملف المريض')
@section('content')
@include('general.delete_confirmation_modal')

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col">
            <h3 class="page-title">ملف المريض</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">قسم الأطفال</li>
              <li class="breadcrumb-item"><a href="{{ route('child_patients.index') }}">سجل المرضى</a></li>
              <li class="breadcrumb-item active">ملف المريض رقم {{ $child_patient->id }}</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('success')  !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
      @endif

					<div class="row">
						<div class="col-md-12">
              <div class="card">
								<div class="card-body pt-0">
									<div class="user-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                      <li class="nav-item">
												<a class="nav-link @if($tabindex==1) active @endif" href="#inf" data-toggle="tab">الملف الشخصي</a>
											</li>
                      @if(in_array(Auth::user()->department_id, [1,2,9]))
                      <li class="nav-item">
												<a class="nav-link @if($tabindex==2) active @endif" href="#appointments" data-toggle="tab">المواعيد</a>
											</li>
                      <li class="nav-item">
												<a class="nav-link @if($tabindex==3) active @endif" href="#packages" data-toggle="tab">الحجوزات</a>
											</li>
                      <li class="nav-item">
												<a class="nav-link @if($tabindex==4) active @endif" href="#requests" data-toggle="tab">الطلبات</a>
											</li>
                      @endif
											<li class="nav-item">
												<a class="nav-link @if($tabindex==5) active @endif" href="#medical" data-toggle="tab">التقييم</a>
											</li>
                      @if(in_array(Auth::user()->department_id, [1,2,9]))
											<li class="nav-item">
												<a class="nav-link @if($tabindex==6) active @endif" href="#billing" data-toggle="tab">الحسابات</a>
											</li>
                      @endif

					                          <li class="nav-item">
						                       <a class="nav-link @if($tabindex==7) active @endif" href="#notes" data-toggle="tab">ملاحظات المريض</a>
					                        </li>
					</ul>
									</div>
									<div class="tab-content">

                    <!-- Info Tab -->
										<div id="inf" class="tab-pane fade @if($tabindex==1) show active @endif">
                      @include('child_patients.partials.info')
                    </div>

										<!-- Appointment Tab -->
										<div id="appointments" class="tab-pane fade @if($tabindex==2) show active @endif">
                      @include('child_patients.partials.appointments')
										</div>
										<!-- /Appointment Tab -->

                    <!-- Subcriptions Tab -->
										<div id="packages" class="tab-pane fade @if($tabindex==3) show active @endif">
                      @include('child_patients.partials.packages')
										</div>
										<!-- /Subcriptions Tab -->

                    <!-- Requests Tab -->
										<div id="requests" class="tab-pane fade @if($tabindex==4) show active @endif">
                      @include('child_patients.partials.requests')
										</div>
										<!-- /Requests Tab -->

										<!-- Medical Records Tab -->
										<div id="medical" class="tab-pane fade @if($tabindex==5) show active @endif">
                      @include('child_patients.partials.medical')
										</div>
										<!-- /Medical Records Tab -->

										<!-- Billing Tab -->
										<div id="billing" class="tab-pane fade @if($tabindex==6) show active @endif">
                      @include('child_patients.partials.billing')
										</div>
										<!-- Billing Tab -->
										<div id="notes" class="tab-pane fade @if($tabindex==7) show active @endif">
											@include('child_patients.partials.notes')
															  </div>

									</div>
								</div>
							</div>
			</div>
		</div>
	</div>
</div>
@endsection
