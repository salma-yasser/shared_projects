@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> ProgramEmployees / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('program_employees.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('employee_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="employee_id-field">Employee_id</label>
                    <input type="text" id="employee_id-field" name="employee_id" class="form-control txt-new" value="{{ old("employee_id") }}"/>
                       @if($errors->has("employee_id"))
                        <span class="help-block">{{ $errors->first("employee_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('program_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="program_id-field">Program_id</label>
                    <input type="text" id="program_id-field" name="program_id" class="form-control txt-new" value="{{ old("program_id") }}"/>
                       @if($errors->has("program_id"))
                        <span class="help-block">{{ $errors->first("program_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('role_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="role_id-field">Role_id</label>
                    <input type="text" id="role_id-field" name="role_id" class="form-control txt-new" value="{{ old("role_id") }}"/>
                       @if($errors->has("role_id"))
                        <span class="help-block">{{ $errors->first("role_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('program_employees.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
