<div class="modal fade" id="add_outcome" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">استرداد حجز</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="add_outcome_form" action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <input name="type" value="add_outcome" hidden/>
            <div class="row form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="child_package">رقم الحجز<span class="text-danger">*</span></label>
                  <select id="child_package" class="form-control select form-control-alternative{{ $errors->add_outcome->has('child_package') ? ' is-invalid' : '' }}" name="child_package" required>
                    @if(count($child_patient->not_refunded_packages) > 1)
                      <option disabled selected hidden value="">اختر</option>
                    @endif
                    @foreach ($child_patient->not_refunded_packages as $package)
                     <option value="{{ $package->id }}" {{ old('child_package') == $package->id?'selected':''}}>{{'('.$package->id.'#) '.($package->department_package->session_number==1?$package->department_package->name:$package->department_package->name.' '.$package->department_package->session_number.' جلسة') }}</option>
                    @endforeach
                  </select>
                  @if ($errors->add_outcome->has('child_package'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->add_outcome->first('child_package') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="paid"><span class="text-danger">*</span>المبلغ</label>
                  <input id="paid" type="text" value="{{ old('paid') }}" class="form-control form-control-alternative{{ $errors->add_outcome->has('paid') ? ' is-invalid' : '' }}" name="paid" required/>
                  @if ($errors->add_outcome->has('paid'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->add_outcome->first('paid') }}</strong>
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
if ("{{count($errors->add_outcome) > 0}}"){
    $('#add_outcome').modal('show');
}

$(document).ready(function() {
  $("#add_outcome #add_outcome_form").submit(function(e){
      var form = $(this);
      var url = '{{ route("child_packages.update", ":id") }}';
      url = url.replace(':id', $("#add_outcome #child_package").val());
      form.attr('action', url);
      $("#add_outcome #text-btn").attr("hidden", true);
      $("#add_outcome #text-loading").attr("hidden", false);
      $("#add_outcome #save").attr("disabled", true);
    });
  });
</script>
