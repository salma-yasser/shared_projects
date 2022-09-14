<div class="modal fade" id="request_cancel_package" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">طلب الغاء حجز</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" action="{{ route('child_cancel_requests.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <!-- <input name="type" value="cancel" hidden/> -->
            <div class="row form-row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-control-label" for="child_package_id">رقم الحجز<span class="text-danger">*</span></label>
                  <select id="child_package_id" class="form-control select form-control-alternative{{ $errors->request_cancel_package->has('child_package_id') ? ' is-invalid' : '' }}" name="child_package_id" required>
                    @if(count($child_patient->child_packages) > 1)
                      <option disabled selected hidden value="">اختر</option>
                    @endif
                    @foreach ($child_patient->child_packages as $package)
                      @if($package->status == config('enums.patient_package_status_values.active') || $package->status == config('enums.patient_package_status_values.pending'))
                        <option value="{{ $package->id }}" {{ old('child_package_id') == $package->id?'selected':''}}>{{'('.$package->id.'#) '.($package->department_package->session_number==1?$package->department_package->name:$package->department_package->name.' '.$package->department_package->session_number.' جلسة') }}</option>
                     @endif
                    @endforeach
                  </select>
                  @if ($errors->request_cancel_package->has('child_package_id'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->request_cancel_package->first('child_package_id') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
          </div>
              <button id="save" type="submit" class="btn btn-primary btn-block">
                <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              من فضلك انتظر...</span>
              <span id="text-btn" >تأكيد</span>
            </button>
            <!-- <button id="save" type="submit" class="btn btn-primary btn-block">تأكيد</button> -->
          </form>
        </div>
        <div id="overlay">
        <div class="cv-spinner">
          <span class="spinner"></span>
        </div>
      </div>
      </div>
    </div>
  </div>
<script>
if ("{{count($errors->request_cancel_package) > 0}}"){
    $('#request_cancel_package').modal('show');
}

$(document).ready(function () {
  $("#request_cancel_package form").submit(function (e) {
      $("#request_cancel_package #text-btn").attr("hidden", true);
      $("#request_cancel_package #text-loading").attr("hidden", false);
      $("#request_cancel_package #save").attr("disabled", true);
      return true;
  });
});
</script>
