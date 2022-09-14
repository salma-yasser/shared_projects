@extends('layouts.app')
@section('title','سجل مرضى الأطفال')
@section('content')
@include('general.delete_confirmation_modal')
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">سجل مرضى الأطفال</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">قسم الأطفال</li>
						<li class="breadcrumb-item active">سجل مرضى الأطفال</li>
					</ul>
				</div>
        @if(in_array(Auth::user()->department_id, [1,2,9]))
        <div class="col-md-6 col-auto">
          <div class="submit-section proceed-btn text-right mt-4">
  								<a href="{{ route('child_patients.create')}}" class="btn btn-primary submit-btn"><i class="fas fa-plus-circle"></i> إضافة مريض </a>
  							</div>
				</div>
        @endif
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
                        <table id="child_patients_table" class="datatable table table-hover table-center mb-0">
                          <thead>
                            <tr>
                                <th>رقم الملف</th>
                                <th>اسم المريض</th>
                                <th>القسم</th>
                                <th>رقم الهوية</th>
                                <th>رقم الجوال</th>
                                <th>العمر</th>
                                <th>الجنسية</th>
                                <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($child_patients as $child_patient)
                            <tr>
                                <td><h2 class="table-avatar"><a href="{{ route('child_patients.show', $child_patient->id) }}">{{ $child_patient->id }}</a></h2></td>
                                <td><h2 class="table-avatar"><a href="{{ route('child_patients.show', $child_patient->id) }}">{{ $child_patient->name }}</a></h2></td>
                                <td>
                                  @foreach($child_patient->child_departments as $child_department)
                                    {{ $child_department->department->name }}
                                    @if(!$loop->last)
                                      </br>
                                    @endif
                                  @endforeach
                                </td>
                                <td>{{ $child_patient->sa_id }}</td>
                                <td>{{ $child_patient->mobile_1 }}</td>
                                <td>{{ $child_patient->getAge() }}</td>
                                <td>{{ is_null($child_patient->nationality)?'--':$child_patient->nationality->name }}</td>
                                <td class="text-right pt-1 pb-1">
                                  <a href="{{ route('child_patients.show', $child_patient->id) }}" class="btn btn-sm bg-info-light">
                                    <i class="far fa-eye"></i> تفاصيل
                                  </a>
                                  @if(in_array(Auth::user()->department_id, [1,2,9]))
                                    <a data-toggle="modal" data-item_id="{{ $child_patient->id }}" data-message="انت على وشك حذف المريض <{{$child_patient->fullname}}>، هل انت متأكد؟" data-action="{{ route('child_patients.destroy', $child_patient->id) }}" data-target="#confirmDelete" class="btn btn-sm bg-danger-light">
                                      <i class="far fa-trash-alt"></i> حذف
                                    </a>
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
@endsection
