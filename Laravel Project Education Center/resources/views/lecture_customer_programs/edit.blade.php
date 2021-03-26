@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> LectureCustomerPrograms / Edit #{{$lecture_customer_program->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('lecture_customer_programs.update', $lecture_customer_program->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('level_id')) has-error @endif">
                       <label for="level_id-field">Level_id</label>
                    <input type="text" id="level_id-field" name="level_id" class="form-control" value="{{ is_null(old("level_id")) ? $lecture_customer_program->level_id : old("level_id") }}"/>
                       @if($errors->has("level_id"))
                        <span class="help-block">{{ $errors->first("level_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('customer_program_id')) has-error @endif">
                       <label for="customer_program_id-field">Customer_program_id</label>
                    <input type="text" id="customer_program_id-field" name="customer_program_id" class="form-control" value="{{ is_null(old("customer_program_id")) ? $lecture_customer_program->customer_program_id : old("customer_program_id") }}"/>
                       @if($errors->has("customer_program_id"))
                        <span class="help-block">{{ $errors->first("customer_program_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('attendence')) has-error @endif">
                       <label for="attendence-field">Attendence</label>
                    <input type="text" id="attendence-field" name="attendence" class="form-control" value="{{ is_null(old("attendence")) ? $lecture_customer_program->attendence : old("attendence") }}"/>
                       @if($errors->has("attendence"))
                        <span class="help-block">{{ $errors->first("attendence") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('assignment')) has-error @endif">
                       <label for="assignment-field">Assignment</label>
                    <input type="text" id="assignment-field" name="assignment" class="form-control" value="{{ is_null(old("assignment")) ? $lecture_customer_program->assignment : old("assignment") }}"/>
                       @if($errors->has("assignment"))
                        <span class="help-block">{{ $errors->first("assignment") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('behavior')) has-error @endif">
                       <label for="behavior-field">Behavior</label>
                    <input type="text" id="behavior-field" name="behavior" class="form-control" value="{{ is_null(old("behavior")) ? $lecture_customer_program->behavior : old("behavior") }}"/>
                       @if($errors->has("behavior"))
                        <span class="help-block">{{ $errors->first("behavior") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('active')) has-error @endif">
                       <label for="active-field">Active</label>
                    <input type="text" id="active-field" name="active" class="form-control" value="{{ is_null(old("active")) ? $lecture_customer_program->active : old("active") }}"/>
                       @if($errors->has("active"))
                        <span class="help-block">{{ $errors->first("active") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fees')) has-error @endif">
                       <label for="fees-field">Fees</label>
                    <input type="text" id="fees-field" name="fees" class="form-control" value="{{ is_null(old("fees")) ? $lecture_customer_program->fees : old("fees") }}"/>
                       @if($errors->has("fees"))
                        <span class="help-block">{{ $errors->first("fees") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('lecture_customer_programs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
