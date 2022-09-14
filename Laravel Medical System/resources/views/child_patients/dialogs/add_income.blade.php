<div class="modal fade" id="add_income" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">دفع حجز</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="add_income_form" action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <input name="type" value="add_income" hidden/>
            <div class="row form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="child_package">رقم الحجز<span class="text-danger">*</span></label>
                  <select id="child_package" class="form-control select form-control-alternative{{ $errors->add_income->has('child_package') ? ' is-invalid' : '' }}" name="child_package" required>
                    <option disabled selected hidden value="">اختر</option>
                    @foreach ($child_patient->active_packages as $package)
                     <option value="{{ $package }}" {{ old('child_package') == $package?'selected':''}}>{{'('.$package->id.'#) '.($package->department_package->session_number==1?$package->department_package->name:$package->department_package->name.' '.$package->department_package->session_number.' جلسة') }}</option>
                    @endforeach
                  </select>
                  @if ($errors->add_income->has('child_package'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->add_income->first('child_package') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="rest">المتبقي</label>
                  <input id="rest" type="text" value="{{ old('rest') }}" class="form-control form-control-alternative{{ $errors->add_income->has('rest') ? ' is-invalid' : '' }}" name="rest" readonly/>
                  @if ($errors->add_income->has('rest'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->add_income->first('rest') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label" for="paid">المبلــــغ المدفـــوع <span class="text-danger">*</span></label>
                        <div class="d-flex">
                            <div class="input-group">
                                <input id="paid_cash" type="text" value="{{ old('paid_cash') }}" class="form-control form-control-alternative{{ $errors->add_package->has('paid_cash') ? ' is-invalid' : '' }}" name="paid_cash" autocomplete="paid_cash"/>
                                <div class="input-group-append" style="width: 35%">
                                    <input id="paid_type_cash" type="text" value="نقداً" class="form-control form-control-alternative{{ $errors->add_package->has('paid_type_cash') ? ' is-invalid' : '' }}" name="paid_type_cash" disabled>
                                </div>
                            </div>
                            <div class="input-group">
                                <input id="paid_net" type="text" value="{{ old('paid_net') }}" class="form-control form-control-alternative{{ $errors->add_package->has('paid_net') ? ' is-invalid' : '' }}" name="paid_net" autocomplete="paid_net"/>
                                <div class="input-group-append" style="width: 35%">
                                    <input id="paid_type_net" type="text" value="شبكة" class="form-control form-control-alternative{{ $errors->add_package->has('paid_type_net') ? ' is-invalid' : '' }}" name="paid_type_net" disabled>
                                </div>
                            </div>
                        </div>
                        <input id="paid" type="text" value="{{ old('paid') }}" class="form-control form-control-alternative{{ $errors->add_package->has('paid') ? ' is-invalid' : '' }}" name="paid" readonly required/>
                        @if ($errors->add_package->has('paid'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->add_package->first('paid') }}</strong>
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
if ("{{count($errors->add_income) > 0}}"){
    $('#add_income').modal('show');
}

$(document).ready(function() {
  $("#add_income #add_income_form").submit(function(e){
      var form = $(this);
      var url = '{{ route("child_packages.update", ":id") }}';
      url = url.replace(':id', JSON.parse($("#add_income #child_package").val()).id);
      form.attr('action', url);
      $("#add_income #text-btn").attr("hidden", true);
      $("#add_income #text-loading").attr("hidden", false);
      $("#add_income #save").attr("disabled", true);
    });

    $("#add_income #child_package").on('change', function () {
        $("#add_income #rest").val(JSON.parse(this.value).rest);
        $("#add_income #paid").trigger("keyup");
    });

    $("#add_income #paid_cash").on('keyup', function () {
        let sum = Number($("#add_income #paid_net").val()) + Number( $("#add_income #paid_cash").val());
        if(sum <=  Number($("#add_income #rest").val())){
            $("#add_income #paid").val(sum);
        }else{
            $("#add_income #paid_cash").val(null);
            $("#add_income #paid").val($("#add_income #paid_net").val());
            alert("برجاء مراجعة المبلغ المدفوع")
        }
    });

    $("#add_income #paid_net").on('keyup', function () {
        let sum = Number($("#add_income #paid_net").val()) + Number( $("#add_income #paid_cash").val());
        if(sum <=  Number($("#add_income #rest").val())){
            $("#add_income #paid").val(sum);
        }else{
            $("#add_income #paid_net").val(null);
            $("#add_income #paid").val($("#add_income #paid_cash").val());
            alert("برجاء مراجعة المبلغ المدفوع")
        }
    });
  });
</script>
