<div class="modal fade" id="edit_program" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تحديث البرنامج</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="edit_program_form" action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <input id="child_department_id" name="child_department_id" value="" hidden/>
              <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <input name="type" value="edit_program" hidden/>
            <div class="row form-row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-control-label" for="file_path">تحميل ملف البرنامج<span class="text-danger">*</span></label>
                  <input type="file" class="form-control file form-control-alternative{{ $errors->edit_program->has('file_path') ? ' is-invalid' : '' }}" value="{{ old('file_path') }}" name="file_path" required/>
                  @if ($errors->edit_program->has('file_path'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->edit_program->first('file_path') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
              <div class="col-md-4 pt-3">
                <a title="تحميل" href="" class="btn btn-sm bg-info-light">
                  نموذج البرنامج <br/><i class="fa fa-download"></i>
                </a>
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
if ("{{count($errors->edit_program) > 0}}"){
    $('#edit_program').modal('show');
}

$(document).ready(function() {
  $('#edit_program').on('show.bs.modal', function(e) {
    var data = $(e.relatedTarget).data('item');
    var url = '{{ route("child_programs.update", ":id") }}';
    url = url.replace(':id', data.id);
    $("#edit_program form").attr("action", url);
    $("#edit_program #child_department_id").val(data.child_department_id);
  });

  $("#edit_program #edit_program_form").submit(function(e){
      $("#edit_program #text-btn").attr("hidden", true);
      $("#edit_program #text-loading").attr("hidden", false);
      $("#edit_program #save").attr("disabled", true);
      return true;
    });
  });
</script>
