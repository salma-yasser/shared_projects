<div class="modal fade" id="edit_evaluation" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تحديث التقييم</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="edit_evaluation_form" action="" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
            <input name="child_patient_id" value="{{ $child_patient->id }}" hidden/>
            <input name="type" value="edit_evaluation" hidden/>
            <div class="row form-row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-control-label" for="file_path">تحميل ملف التقييم<span class="text-danger">*</span></label>
                  <input type="file" class="form-control file form-control-alternative{{ $errors->edit_evaluation->has('file_path') ? ' is-invalid' : '' }}" value="{{ old('file_path') }}" name="file_path" required/>
                  @if ($errors->edit_evaluation->has('file_path'))
                      <div class="invalid-feedback">
                          <strong>{{ $errors->edit_evaluation->first('file_path') }}</strong>
                      </div>
                  @endif
                </div>
              </div>
              <div class="col-md-4 pt-3">
                <a title="تحميل" href="" class="btn btn-sm bg-info-light">
                   نموذج التقييم <br/><i class="fa fa-download"></i>
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
if ("{{count($errors->edit_evaluation) > 0}}"){
    $('#edit_evaluation').modal('show');
}

$(document).ready(function() {
  $('#edit_evaluation').on('show.bs.modal', function(e) {
    var data = $(e.relatedTarget).data('item');
    var url = '{{ route("child_evaluations.update", ":id") }}';
    url = url.replace(':id', data.id);
    $("#edit_evaluation form").attr("action", url);
  });

  $("#edit_evaluation #edit_evaluation_form").submit(function(e){
      $("#edit_evaluation #text-btn").attr("hidden", true);
      $("#edit_evaluation #text-loading").attr("hidden", false);
      $("#edit_evaluation #save").attr("disabled", true);
      return true;
    });
  });
</script>
