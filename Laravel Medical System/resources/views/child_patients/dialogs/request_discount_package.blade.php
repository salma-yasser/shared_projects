<div class="modal fade" id="request_discount_package" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">طلب خصم</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('child_discount_requests.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <!-- <input name="type" value="discount" hidden/> -->
            <div class="row form-row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-control-label" for="child_package_id">رقم الحجز<span class="text-danger">*</span></label>
                  <select id="child_package_id" class="form-control select form-control-alternative{{ $errors->request_discount_package->has('child_package_id') ? ' is-invalid' : '' }}" name="child_package_id" required>
                    @if(count($child_patient->active_packages) > 1)
                      <option disabled selected hidden value="">اختر</option>
                    @endif
                    @foreach ($child_patient->active_packages as $package)
                     <option value="{{ $package->id }}" {{ old('child_package_id') == $package->id?'selected':''}}>{{'('.$package->id.'#) '.($package->department_package->session_number==1?$package->department_package->name:$package->department_package->name.' '.$package->department_package->session_number.' جلسة') }}</option>
                    @endforeach
                  </select>
                  @if ($errors->request_discount_package->has('child_package_id'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->request_discount_package->first('child_package_id') }}</strong>
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
if ("{{count($errors->request_discount_package) > 0}}"){
    $('#request_discount_package').modal('show');
}

$(document).ready(function () {
  $("#request_discount_package form").submit(function (e) {
      $("#request_discount_package #text-btn").attr("hidden", true);
      $("#request_discount_package #text-loading").attr("hidden", false);
      $("#request_discount_package #save").attr("disabled", true);
      return true;
  });
});
</script>
