@extends('layouts.app')
@section('title','إضافة مريض جديد')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col">
          <h3 class="page-title">إضافة مريض جديد</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">قسم الأطفال</li>
            <li class="breadcrumb-item"><a href="{{ route('child_patients.index') }}">سجل المرضى</a></li>
            <li class="breadcrumb-item active">إضافة مريض جديد</li>
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
     <div class="col-md-12 col-lg-12 col-xl-12">
       <form id="child_patient_create_form" action="{{ route('child_patients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

             <!-- Child Information -->
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">بيانات المريض</h4>
                 <div class="row form-row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <div class="change-avatar">
                         <div class="profile-img">
                           <img id="photoPreview" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                         </div>
                         <div class="upload-img">
                           <div class="change-photo-btn">
                             <span><i class="fa fa-upload"></i> Upload Photo</span>
                             <input type="file" class="upload" value="{{ old('photo') }}" name="photo"
                                     onchange="
                                     file = this.files[0];
                                     if(file){
                                         var reader = new FileReader();
                                         reader.onload = function(){
                                             $('#photoPreview').attr('src', reader.result);
                                         }
                                         reader.readAsDataURL(file);
                                       }
                                     ">
                           </div>
                           <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                           @if ($errors->has('photo'))
                               <div class="invalid-feedback d-block">
                                   <strong>{{ $errors->first('photo') }}</strong>
                               </div>
                           @endif
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="fullname">الإسم <span class="text-danger">*</span></label>
                       <input id="fullname" type="text" value="{{ old('fullname') }}" class="form-control form-control-alternative{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" autocomplete="fullname" required/>
                       @if ($errors->has('fullname'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('fullname') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="kind">الجنس<span class="text-danger">*</span></label>
                       <select id="kind" class="form-control select form-control-alternative{{ $errors->has('kind') ? ' is-invalid' : '' }}" name="kind" required>
                         <option disabled selected hidden value="">اختر</option>
                         <option {{ old('kind') == 'ذكر'?'selected':''}} value="ذكر">ذكر</option>
                         <option {{ old('kind') == 'أنثى'?'selected':''}} value="أنثى">أنثى</option>
                       </select>
                       @if ($errors->has('kind'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('kind') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group mb-0">
                       <label class="form-control-label" for="birthdate">تاريخ الميلاد<span class="text-danger">*</span></label>
                       <input id="birthdate" type="text" value="{{ old('birthdate') }}" class="form-control datetimepicker form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" autocomplete="birthdate" required/>
                       @if ($errors->has('birthdate'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('birthdate') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="address">العنوان</label>
                       <input id="address" type="text" value="{{ old('address') }}" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" autocomplete="address"/>
                       @if ($errors->has('address'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('address') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="sa_id">رقم الهويه</label>
                       <input id="sa_id" type="text" value="{{ old('sa_id') }}" class="form-control form-control-alternative{{ $errors->has('sa_id') ? ' is-invalid' : '' }}"name="sa_id" autocomplete="sa_id"/>
                       @if ($errors->has('sa_id'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('sa_id') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="nationality_id">الجنسية<span class="text-danger">*</span></label>
                       <select id="nationality_id" class="form-control select form-control-alternative{{ $errors->has('nationality_id') ? ' is-invalid' : '' }}" name="nationality_id" required>
                         <option disabled selected hidden value="">اختر</option>
                         @foreach ($nationalities as $nationality)
                          <option value="{{ $nationality->id }}" {{ old('nationality_id') == $nationality->id ?'selected':''}}>{{$nationality->name}}</option>
                         @endforeach
                       </select>
                       @if ($errors->has('nationality_id'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('nationality_id') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="form-control-label" for="entry_date">تاريخ الدخول<span class="text-danger">*</span></label>
                       <input id="entry_date" type="text" value="{{ old('entry_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->has('entry_date') ? ' is-invalid' : '' }}" name="entry_date" autocomplete="entry_date" required/>
                       @if ($errors->has('entry_date'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('entry_date') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-8">
                     <div class="form-group">
                       <label class="form-control-label" for="previous_session">هل قام بعمل جلسات من قبل؟</label>
                          <div class="input-group">
    													<div class="input-group-prepend">
    														<span class="input-group-text">
    															<input type="checkbox" name="previous_session" {{ old('previous_session') == '1' ?'checked':''}}>
    														</span>
    													</div>
    													<input type="text" class="form-control" value="{{ old('previous_session_place') }}" placeholder="المكان" name="previous_session_place">
    													<input type="text" class="form-control col-md-4" value="{{ old('previous_session_number') }}" placeholder="مدة الجلسات" name="previous_session_number">
												</div>
                      </div>
                    </div>
                   <div class="col-md-6">
                     <div class="form-group mb-0">
                       <label class="form-control-label" for="department_id">القسم الموجه اليه<span class="text-danger">*</span></label>
                       @foreach ($departments as $department)
                         <div class="checkbox ml-5">
                           <label>
                             <input type="checkbox" name="department_id[]" value="{{ $department->id }}" {{ in_array($department->id, is_null(old('department_id'))?[]:old('department_id'))?'checked':''}}> {{$department->name}}
                           </label>
                         </div>
                       @endforeach
                     </div>
                       @if ($errors->has('department_id'))
                           <div class="text-danger">
                               <strong>{{ $errors->first('department_id') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                 </div>
               </div>
             <!-- /Child Information -->

             <!-- Parent Information -->
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">بيانات ولي الأمر</h4>
                 <div class="row form-row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="fullname_parent">الإسم <span class="text-danger">*</span></label>
                       <input id="fullname_parent" type="text" value="{{ old('fullname_parent') }}" class="form-control form-control-alternative{{ $errors->has('fullname_parent') ? ' is-invalid' : '' }}" name="fullname_parent" autocomplete="fullname_parent" required/>
                       @if ($errors->has('fullname_parent'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('fullname_parent') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="relation_parent">صلة القرابة</label>
                       <input id="relation_parent" type="relation_parent" value="{{ old('relation_parent') }}" class="form-control form-control-alternative{{ $errors->has('relation_parent') ? ' is-invalid' : '' }}" name="relation_parent" autocomplete="relation_parent"/>
                       @if ($errors->has('relation_parent'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('relation_parent') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="form-control-label" for="sa_id_parent">رقم الهويه<span class="text-danger">*</span></label>
                       <input id="sa_id_parent" type="text" value="{{ old('sa_id_parent') }}" class="form-control form-control-alternative{{ $errors->has('sa_id_parent') ? ' is-invalid' : '' }}"name="sa_id_parent" autocomplete="sa_id_parent" required/>
                       @if ($errors->has('sa_id_parent'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('sa_id_parent') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="form-control-label" for="mobile_1">رقم الجوال <span class="text-danger">*</span></label>
                       <input id="mobile_1" type="tel" value="{{ old('mobile_1') }}" pattern="^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$" class="form-control form-control-alternative{{ $errors->has('mobile_1') ? ' is-invalid' : '' }}" name="mobile_1" autocomplete="mobile_1" required/>
                       @if ($errors->has('mobile_1'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('mobile_1') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="form-control-label" for="mobile_2">رقم جوال آخر</label>
                       <input id="mobile_2" type="tel" value="{{ old('mobile_2') }}" pattern="^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$" class="form-control form-control-alternative{{ $errors->has('mobile_2') ? ' is-invalid' : '' }}" name="mobile_2" autocomplete="mobile_2"/>
                       @if ($errors->has('mobile_2'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('mobile_2') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="email">البريد الالكتروني </label>
                       <input id="email" type="email" value="{{ old('email') }}" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" autocomplete="email"/>
                       @if ($errors->has('email'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('email') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="form-control-label" for="work_parent">جهة العمل</label>
                       <input id="work_parent" type="text" value="{{ old('work_parent') }}" class="form-control form-control-alternative{{ $errors->has('work_parent') ? ' is-invalid' : '' }}" name="work_parent" autocomplete="work_parent"/>
                       @if ($errors->has('work_parent'))
                           <div class="invalid-feedback">
                               <strong>{{ $errors->first('work_parent') }}</strong>
                           </div>
                       @endif
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <!-- /Parent Information -->
             <div class="submit-section submit-btn-bottom mt-4">
               <button id="btn-submit" type="submit" class="btn btn-primary submit-btn">
                 <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               من فضلك انتظر...</span>
               <span id="text-btn" >حفظ</span>
             </button>
             </div>
           </form>
          </div>
   </div>
 </div>
</div>
<script>
$(document).ready(function () {
  $("#child_patient_create_form").submit(function (e) {
      $("#child_patient_create_form #text-btn").attr("hidden", true);
      $("#child_patient_create_form #text-loading").attr("hidden", false);
      $("#child_patient_create_form #btn-submit").attr("disabled", true);
      return true;
  });
});
</script>
@endsection
