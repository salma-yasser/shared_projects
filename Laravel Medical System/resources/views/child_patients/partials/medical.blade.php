@include('child_patients.dialogs.add_evaluation')
@include('child_patients.dialogs.edit_evaluation')
@include('child_patients.dialogs.add_revaluation')
@include('child_patients.dialogs.edit_revaluation')
@include('child_patients.dialogs.add_program')
@include('child_patients.dialogs.edit_program')

@foreach($child_patient->child_departments as $child_department)
<div class="card mb-0">
    <div class="card-header" style="background-color: #259499;">
        <h6 class="card-title" style="color: white;"> تقييم {{$child_department->department->name}}</h6>
    </div>
  <div class="card-body pt-0">
        <div class="col-md-12 submit-section proceed-btn text-right pt-3 pr-0 pl-0">
                @if(in_array(Auth::user()->id, [1,15, 23, 13, 14, 17]))
                @if(count($child_department->child_evaluations)<=0)
                  <a href="#add_evaluation" class="btn btn-primary submit-btn" data-toggle="modal" data-child-department="{{ $child_department }}" data-department_templates="{{ $child_department->department->department_evaluation_templates }}"><i class="fas fa-plus-circle"></i> إضافة تقييم</a>
                @else
                  <a href="#add_program" class="btn btn-primary submit-btn" data-toggle="modal" data-child-department="{{ $child_department }}" data-department_templates="{{ $child_department->department->department_program_templates }}"><i class="fas fa-plus-circle"></i> إضافة برنامج</a>
                  <a href="#add_revaluation" class="btn btn-primary submit-btn" data-toggle="modal" data-child-department="{{ $child_department }}" data-department_templates="{{ $child_department->department->department_revaluation_templates }}"><i class="fas fa-plus-circle"></i> إعادة تقييم</a>
                @endif
              @endif
        </div>
        @if(count($child_department->child_evaluations)>0)
        <div class="table-responsive pt-3">
          <table id="table_evaluations" class="datatable table table-hover table-center mb-0">
            <thead>
              <tr>
                <th>التاريخ</th>
                <th>النوع</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($child_department->child_evaluations as $evaluation)
              <tr>
                <td>{{ Carbon\Carbon::parse($evaluation->updated_at)->format('Y/m/d') }}</td>
                <td>تقييم أولي</td>
                <td class="text-right">
                  <div class="table-action">
                    <a title="تحديث" data-toggle="modal" href="#edit_evaluation" data-item="{{ $evaluation }}" data-child-department="{{ $child_department }}" data-department_templates="{{ $child_department->department->department_evaluation_templates }}"class="btn btn-sm bg-warning-light" {{in_array(Auth::user()->id, [1,15, 23, 13, 14, 17])?'':'hidden'}}>
                      <i class="far fa-edit"></i> تحديث
                    </a>
                    @foreach($evaluation->child_evaluation_files as $file)
                        <a title="تحميل" href="{{ route('download', $file->file_path) }}" class="btn btn-sm bg-info-light">
                          <i class="fa fa-download"></i> {{ strtok(substr(substr(strrchr($file->file_path, "/"), 1), strpos(substr(strrchr($file->file_path, "/"), 1), "_") + 1), ".") }}
                        </a>
                    @endforeach
                  </div>
                </td>
              </tr>
              @endforeach
              @foreach ($child_department->child_revaluations as $revaluation)
              <tr>
                <td>{{ Carbon\Carbon::parse($revaluation->updated_at)->format('Y/m/d') }}</td>
                <td>إعادة تقييم</td>
                <td class="text-right">
                  <div class="table-action">
                    <a title="تحديث" data-toggle="modal" href="#edit_revaluation" data-child-department="{{ $child_department }}" data-item="{{ $revaluation }}" data-department_templates="{{ $child_department->department->department_revaluation_templates }}" class="btn btn-sm bg-warning-light" {{in_array(Auth::user()->id, [1,15, 23, 13, 14, 17])?'':'hidden'}}>
                      <i class="far fa-edit"></i> تحديث
                    </a>
                    @foreach($revaluation->child_revaluation_files as $file)
                      <a title="تحميل" href="{{ route('download', $file->file_path, substr($file->file_path, strpos($file->file_path, "_") + 1)) }}" class="btn btn-sm bg-info-light">
                          <i class="fa fa-download"></i> {{ strtok(substr(substr(strrchr($file->file_path, "/"), 1), strpos(substr(strrchr($file->file_path, "/"), 1), "_") + 1), ".") }}
                      </a>
                    @endforeach
                  </div>
                </td>
              </tr>
              @endforeach
              @foreach ($child_department->child_programs as $program)
              <tr>
                <td>{{ Carbon\Carbon::parse($program->updated_at)->format('Y/m/d') }}</td>
                <td>برنامج</td>
                <td class="text-right">
                  <div class="table-action">
                    <a title="تحديث" data-toggle="modal" href="#edit_program" data-item="{{ $program }}" data-child-department="{{ $child_department }}" data-department_templates="{{ $child_department->department->department_program_templates }}" class="btn btn-sm bg-warning-light" {{in_array(Auth::user()->id, [1,15, 23, 13, 14, 17])?'':'hidden'}}>
                      <i class="far fa-edit"></i> تحديث
                    </a>
                    @foreach($program->child_program_files as $file)
                      <a title="تحميل" href="{{ route('download', $file->file_path, substr($file->file_path, strpos($file->file_path, "_") + 1)) }}" class="btn btn-sm bg-info-light">
                          <i class="fa fa-download"></i> {{ strtok(substr(substr(strrchr($file->file_path, "/"), 1), strpos(substr(strrchr($file->file_path, "/"), 1), "_") + 1), ".") }}
                      </a>
                    @endforeach
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
  </div>
</div>
@endforeach
<style>
#table_evaluations th, td { text-align: center; }
</style>
<script>
$(document).ready(function() {
    $('#table_evaluations').DataTable().order( [ 0, 'desc' ] ).draw();
});
</script>
