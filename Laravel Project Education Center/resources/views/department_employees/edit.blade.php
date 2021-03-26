@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> DepartmentEmployees / Edit #{{$department_employee->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('department_employees.update', $department_employee->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('employee_id')) has-error @endif">
                       <label for="employee_id-field">Employee_id</label>
                    <input type="text" id="employee_id-field" name="employee_id" class="form-control" value="{{ is_null(old("employee_id")) ? $department_employee->employee_id : old("employee_id") }}"/>
                       @if($errors->has("employee_id"))
                        <span class="help-block">{{ $errors->first("employee_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('department_id')) has-error @endif">
                       <label for="department_id-field">Department_id</label>
                    <input type="text" id="department_id-field" name="department_id" class="form-control" value="{{ is_null(old("department_id")) ? $department_employee->department_id : old("department_id") }}"/>
                       @if($errors->has("department_id"))
                        <span class="help-block">{{ $errors->first("department_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('role_id')) has-error @endif">
                       <label for="role_id-field">Role_id</label>
                    <input type="text" id="role_id-field" name="role_id" class="form-control" value="{{ is_null(old("role_id")) ? $department_employee->role_id : old("role_id") }}"/>
                       @if($errors->has("role_id"))
                        <span class="help-block">{{ $errors->first("role_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('department_employees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
