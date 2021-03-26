@extends('layout')
@section('header')
<div class="page-header">
        <h1>DepartmentEmployees / Show #{{$department_employee->id}}</h1>
        <form action="{{ route('department_employees.destroy', $department_employee->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('department_employees.edit', $department_employee->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$department_employee->employee_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="department_id">DEPARTMENT_ID</label>
                     <p class="form-control-static">{{$department_employee->department_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="role_id">ROLE_ID</label>
                     <p class="form-control-static">{{$department_employee->role_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('department_employees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection