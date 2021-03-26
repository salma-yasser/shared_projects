@extends('layout')
@section('header')
<div class="page-header">
        <h1>LectureCustomerPrograms / Show #{{$lecture_customer_program->id}}</h1>
        <form action="{{ route('lecture_customer_programs.destroy', $lecture_customer_program->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('lecture_customer_programs.edit', $lecture_customer_program->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="level_id">LEVEL_ID</label>
                     <p class="form-control-static">{{$lecture_customer_program->level_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="customer_program_id">CUSTOMER_PROGRAM_ID</label>
                     <p class="form-control-static">{{$lecture_customer_program->customer_program_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="attendence">ATTENDENCE</label>
                     <p class="form-control-static">{{$lecture_customer_program->attendence}}</p>
                </div>
                    <div class="form-group">
                     <label for="assignment">ASSIGNMENT</label>
                     <p class="form-control-static">{{$lecture_customer_program->assignment}}</p>
                </div>
                    <div class="form-group">
                     <label for="behavior">BEHAVIOR</label>
                     <p class="form-control-static">{{$lecture_customer_program->behavior}}</p>
                </div>
                    <div class="form-group">
                     <label for="active">ACTIVE</label>
                     <p class="form-control-static">{{$lecture_customer_program->active}}</p>
                </div>
                    <div class="form-group">
                     <label for="fees">FEES</label>
                     <p class="form-control-static">{{$lecture_customer_program->fees}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('lecture_customer_programs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection