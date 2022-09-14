<div class="modal fade" id="add_notes" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> اضافه ملاحظه</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="add_notes" action="{{ route('child_notes.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="input-group mb-3">
              <select id="note_type" class="form-control select form-control-alternative{{ $errors->add_notes->has('note_type') ? ' is-invalid' : '' }}" name="note_type" required>
                <option selected>اختر سبب الملاحظه</option>
                <option value="0" {{ (old('note_type') == 0)?'selected':''}}>طبيه</option>
                <option value="1" {{ (old('note_type') == 1)?'selected':''}}>اداريه</option>

                
              </select>
              </div>
              <div class="input-group">
                <span class="input-group-text">With textarea</span>
                <textarea id="note_description"   {{ $errors->home->has('note_description') ? ' is-invalid' : '' }} name="note_description"class="form-control" aria-label="تدوين الملاحظه"></textarea>
              </div>
                <div>
                  <button id="save" type="submit" class="btn btn-primary btn-block">
                  <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                من فضلك انتظر...</span>
                <span id="text-btn" >تأكيد</span>
              </button>
            </div>           
              
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