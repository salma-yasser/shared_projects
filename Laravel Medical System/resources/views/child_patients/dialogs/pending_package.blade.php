<div class="modal fade" id="pending_package" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">ايقاف حجز</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="pending_package_form" action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <input name="type" value="request_pending" hidden/>
            <div class="row form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="child_package">رقم الحجز<span class="text-danger">*</span></label>
                  <select id="child_package" class="form-control select form-control-alternative{{ $errors->pending_package->has('child_package') ? ' is-invalid' : '' }}" name="child_package" required>
                    <option disabled selected hidden value="">اختر</option>
                    @foreach ($child_patient->active_packages as $package)
                      @if($package->department_package->session_number>1)
                        <option value="{{ $package->id }}" {{ old('child_package') == $package?'selected':''}}>{{'('.$package->id.'#) '.($package->department_package->session_number==1?$package->department_package->name:$package->department_package->name.' '.$package->department_package->session_number.' جلسة') }}</option>
                      @endif
                    @endforeach
                  </select>
                  @if ($errors->pending_package->has('child_package'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->pending_package->first('child_package') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="file">تحميل ملف</label>
                  <input type="file" class="form-control file" value="{{ old('file') }}" name="file"/>
                  @if ($errors->pending_package->has('file'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->pending_package->first('file') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="reason">السبب</label>
                  <input id="reason" type="text" value="{{ old('reason') }}" class="form-control form-control-alternative{{ $errors->add_package->has('reason') ? ' is-invalid' : '' }}" name="reason"/>
                  @if ($errors->pending_package->has('reason'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->pending_package->first('reason') }}</strong>
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
if ("{{count($errors->pending_package) > 0}}"){
    $('#pending_package').modal('show');
}

$(document).ready(function() {
  $("#edit_apt_info form").submit(function (e) {

      return true;
  });

  $("#pending_package #pending_package_form").submit(function(e){
      var form = $(this);
      var url = '{{ route("child_packages.update", ":id") }}';
      url = url.replace(':id', $("#pending_package #child_package").val());
      form.attr('action', url);
      $("#pending_package #text-btn").attr("hidden", true);
      $("#pending_package #text-loading").attr("hidden", false);
      $("#pending_package #save").attr("disabled", true);
      return true;
    });
  });
</script>
