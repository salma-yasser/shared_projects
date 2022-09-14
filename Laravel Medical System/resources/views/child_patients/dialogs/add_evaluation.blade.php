<div class="modal fade" id="add_evaluation" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">إضافة تقييم</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <span class="col-md-12">نماذج التقييم</span>
                <div id="templates" class="col-md-12 pb-3">

                </div>
            </div>
            <form id="add_evaluation_form" action="{{ route('child_evaluations.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <input id="child_department" name="child_department" value="" hidden/>
            <input name="type" value="add_evaluation" hidden/>
            <div class="row form-row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="file_path">رفع الملفات<span class="text-danger">*</span></label>
                    <div class="needsclick dropzone" id="evaluation-dropzone">
                    </div>
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
if ("{{count($errors->add_evaluation) > 0}}"){
    $('#add_evaluation').modal('show');
}

$(document).ready(function() {
    $('#add_evaluation').on('show.bs.modal', function(e) {
        var child_department = $(e.relatedTarget).data('child-department');
        $("#add_evaluation #child_department").val(JSON.stringify(child_department));

        var department_templates = $(e.relatedTarget).data('department_templates');
        var templates = "";

        $.each(department_templates, function(i, obj){
            var url = '{{ route("download", ":id") }}';
            url = url.replace(':id', obj.file_path);

            templates += '<a title="تحميل" href="'+url+'" class="btn btn-sm bg-info-light m-1">'
            +' <i class="fa fa-download m-1"></i>' + obj.file_name
            +'</a>';
        });

        $('#add_evaluation #templates').html(templates);
    });

  $("#add_evaluation #add_evaluation_form").submit(function(e){
      $("#add_evaluation #text-btn").attr("hidden", true);
      $("#add_evaluation #text-loading").attr("hidden", false);
      $("#add_evaluation #save").attr("disabled", true);
      return true;
    });
  });


var uploadedFileMap = {}
Dropzone.options.evaluationDropzone = {
    url: "{{ route('storeMedia') }}",
    method: 'POST',
    acceptedFiles: 'image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    // maxFiles: 1,
    // maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
        $('form').append('<input type="hidden" name="evaluation_document[]" value="' + response.name + '">')
        uploadedFileMap[file.name] = response.name
    },
    removedfile: function (file) {
        file.previewElement.remove()
        var thisDropzone = this;
        var name = ''
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name
        } else {
            name = uploadedFileMap[file.name]
        }
        $.ajax({
            type:'POST',
            url: "{{ route('ajaxRemoveTempFile') }}",
            data:{file:uploadedFileMap[file.name], _token: "{{ csrf_token() }}"},
            error: function (data) {
                console.log('Error:', data);
            },
            success: function (data) {
                console.log('Success:', data);
                delete uploadedFileMap[file.name];
                // var existingFileCount = 1; // The number of files already uploaded
                // thisDropzone.options.maxFiles = thisDropzone.options.maxFiles + existingFileCount;
                $('form').find('input[name="evaluation_document[]"][value="' + name + '"]').remove()
            }
        });
    },
    init: function init() {
    }
}
</script>
