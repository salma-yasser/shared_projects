@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Lectures / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('lectures.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('date')) has-error @endif">
                       <label for="date-field">Date</label>
                    <input type="text" id="date-field" name="date" class="form-control date-picker" value="{{ old("date") }}"/>
                       @if($errors->has("date"))
                        <span class="help-block">{{ $errors->first("date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('start_time')) has-error @endif">
                       <label for="start_time-field">Start_time</label>
                    <input type="text" id="start_time-field" name="start_time" class="form-control" value="{{ old("start_time") }}"/>
                       @if($errors->has("start_time"))
                        <span class="help-block">{{ $errors->first("start_time") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('program_id')) has-error @endif">
                       <label for="program_id-field">Program_id</label>
                    <input type="text" id="program_id-field" name="program_id" class="form-control" value="{{ old("program_id") }}"/>
                       @if($errors->has("program_id"))
                        <span class="help-block">{{ $errors->first("program_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('lectures.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
