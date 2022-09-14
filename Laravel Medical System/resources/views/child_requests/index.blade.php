@extends('layouts.app')
@section('title','سجل طلبات المرضى')
@section('content')
@include('general.delete_confirmation_modal')

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col">
            <h3 class="page-title">سجل طلبات المرضى</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">قسم الأطفال</li>
              <li class="breadcrumb-item active">سجل طلبات المرضى</li>
            </ul>
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
              <div class="card">
								<div class="card-body pt-0">
									<div class="user-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                      <li class="nav-item">
                        <a class="nav-link @if($tabindex==1) active @endif" href="#cancels" data-toggle="tab">طلبات الغاء/استرداد حجز</a>
											</li>
                      <li class="nav-item">
												<a class="nav-link @if($tabindex==2) active @endif" href="#discounts" data-toggle="tab">طلبات خصم حجز</a>
											</li>
                     <!-- <li class="nav-item">
												<a class="nav-link @if($tabindex==3) active @endif" href="#change_appointments" data-toggle="tab">طلبات تغيير موعد</a>
											</li>-->
											<li class="nav-item">
												<a class="nav-link @if($tabindex==4) active @endif" href="#extra_rebooks" data-toggle="tab">طلبات تعويض موعد اضافي</a>
											</li>
										</ul>
									</div>
									<div class="tab-content">

                    <!-- Cancel Tab -->
										<div id="cancels" class="tab-pane fade @if($tabindex==1) show active @endif">
                      @include('child_requests.partials.cancels')
                    </div>

										<!-- Discount Tab -->
										<div id="discounts" class="tab-pane fade @if($tabindex==2) show active @endif">
                      @include('child_requests.partials.discounts')
										</div>
										<!-- /Discount Tab -->

                    <!-- Change Appointment Tab -->
								<!--		<div id="change_appointments" class="tab-pane fade @if($tabindex==3) show active @endif">
                      @include('child_requests.partials.change_appointments')
										</div>-->
										<!-- /Change Appointment Tab -->

										<!-- Extra Rebook Tab -->
										<div id="extra_rebooks" class="tab-pane fade @if($tabindex==4) show active @endif">
                      @include('child_requests.partials.extra_rebooks')
										</div>
										<!-- /Extra Rebook Tab -->

									</div>
								</div>
							</div>
			</div>
		</div>
	</div>
</div>
@endsection
