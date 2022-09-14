@include('child_patients.dialogs.edit_apt_info')
<div class="card">
  <div class="card-body">
    <div class="row form-row">
      <div class="col-md-12 mb-4">
        <div class="doctor-widget">
          <div class="doc-info-left">
            <div class="doctor-img" style="flex: 0 0 120px;">
              <img src="{{ is_null($child_patient->profile_photo_url)? asset('assets/img/doctors/doctor-thumb-02.jpg'):$child_patient->profile_photo_url}}" class="img-fluid" alt="User Image">
            </div>
            <div class="doc-info-cont">
              <h4 class="doc-name">{{ $child_patient->fullname }}</h4>
              <p class="doc-department"><i class="fas fa-user-tag"></i> قسم
                @foreach($child_patient->child_departments as $child_department)
                  {{ $child_department->department->name }}
                  @if(!$loop->last)
                       -
                  @endif
                @endforeach
              </p>
              <div class="about-text"><i class="fas fa-phone-square" style="margin-left:10px;"></i>{{ $child_patient->mobile_1 }}</div>
              <div class="about-text"><i class="fa fa-birthday-cake" style="margin-left:10px;"></i>{{ $child_patient->getAge() }} سنه</div>
            </div>
          </div>
          @if(in_array(Auth::user()->department_id, [1,2,9]))
          <div class="doc-info-right text-right">
              <a class="edit-link" data-toggle="modal" href="#edit_apt_info"><i class="fa fa-edit mr-1"></i>تعديل</a>
          </div>
          @endif
        </div>
      </div>
      <div>
    <div class="row form-row" style="border: 1px solid #f0f0f0; padding: 10px;">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="fullname">الإسم</label>
          <input id="fullname" type="text" value="{{ $child_patient->fullname }}" class="form-control" name="fullname" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="kind">الجنس</label>
          <input id="kind" type="text" value="{{ $child_patient->kind }}" class="form-control" name="kind" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-0">
          <label class="form-control-label" for="birthdate">تاريخ الميلاد</label>
          <input id="birthdate" type="text" value="{{ $child_patient->birthdate }}" class="form-control" name="birthdate" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="address">العنوان</label>
          <input id="address" type="text" value="{{ $child_patient->address }}" class="form-control" name="address" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="sa_id">رقم الهوية</label>
          <input id="sa_id" type="text" value="{{ $child_patient->sa_id }}" class="form-control" name="sa_id" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="nationality_id">الجنسية</label>
          <input id="nationality_id" type="text" value="{{ is_null($child_patient->nationality)?'':$child_patient->nationality->name }}" class="form-control" name="nationality_id" readonly/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="entry_date">تاريخ الدخول</label>
          <input id="entry_date" type="text" value="{{ $child_patient->entry_date }}" class="form-control datetimepicker" name="entry_date" readonly/>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group mb-0">
          <label class="form-control-label" for="previous_session">هل قام بعمل جلسات من قبل؟</label>
             <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text">
                     <input type="checkbox" name="previous_session" {{ $child_patient->previous_session == '1' ?'checked':''}} disabled>
                   </span>
                 </div>
                 <input type="text" class="form-control" value="{{ $child_patient->previous_session_place }}" placeholder="المكان" name="previous_session_place" readonly>
                 <input type="text" class="form-control col-md-4" value="{{ $child_patient->previous_session_number }}" placeholder="مدة الجلسات" name="previous_session_number" readonly>
           </div>
         </div>
       </div>
    </div>

    <h4 class="card-title mt-4 mb-4 text-center">بيانات ولي الأمر</h4>
    <div class="row form-row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="fullname_parent">الإسم</label>
          <input id="fullname_parent" type="text" value="{{ $child_patient->fullname_parent }}" class="form-control" name="fullname_parent" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="relation_parent">صلة القرابة</label>
          <input id="relation_parent" type="text" value="{{ $child_patient->relation_parent }}" class="form-control" name="relation_parent" readonly/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="sa_id_parent">رقم الهوية</label>
          <input id="sa_id_parent" type="text" value="{{ $child_patient->sa_id_parent }}" class="form-control" name="sa_id_parent" readonly/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="mobile_1">رقم الجوال</label>
          <input id="mobile_1" type="text" value="{{ $child_patient->mobile_1 }}" class="form-control" name="mobile_1" readonly/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="mobile_2">رقم جوال آخر</label>
          <input id="mobile_2" type="text" value="{{ $child_patient->mobile_2 }}" class="form-control" name="mobile_2" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="email">البريد الالكتروني</label>
          <input id="email" type="email" value="{{ $child_patient->email }}" class="form-control" name="email" readonly/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="work">جهة العمل</label>
          <input id="work" type="text" value="{{ $child_patient->work }}" class="form-control" name="work" readonly/>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
