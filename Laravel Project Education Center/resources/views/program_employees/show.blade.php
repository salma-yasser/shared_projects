@extends('layout')
@section('header')
<div class="page-header">
        <h1>ProgramEmployees / Show #{{$program_employee->id}}</h1>
        <form action="{{ route('program_employees.destroy', $program_employee->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('program_employees.edit', $program_employee->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="employee_id">EMPLOYEE_ID</label>
                     <p class="form-control-static">{{$program_employee->employee_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="program_id">PROGRAM_ID</label>
                     <p class="form-control-static">{{$program_employee->program_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="role_id">ROLE_ID</label>
                     <p class="form-control-static">{{$program_employee->role_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('program_employees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection