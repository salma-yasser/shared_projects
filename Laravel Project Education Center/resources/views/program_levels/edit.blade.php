@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> ProgramLevels / Edit #{{$program_level->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('program_levels.update', $program_level->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('start_date')) has-error @endif">
                       <label for="start_date-field">Start_date</label>
                    <input type="text" id="start_date-field" name="start_date" class="form-control date-picker" value="{{ is_null(old("start_date")) ? $program_level->start_date : old("start_date") }}"/>
                       @if($errors->has("start_date"))
                        <span class="help-block">{{ $errors->first("start_date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('end_date')) has-error @endif">
                       <label for="end_date-field">End_date</label>
                    <input type="text" id="end_date-field" name="end_date" class="form-control date-picker" value="{{ is_null(old("end_date")) ? $program_level->end_date : old("end_date") }}"/>
                       @if($errors->has("end_date"))
                        <span class="help-block">{{ $errors->first("end_date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('program_id')) has-error @endif">
                       <label for="program_id-field">Program_id</label>
                    <input type="text" id="program_id-field" name="program_id" class="form-control" value="{{ is_null(old("program_id")) ? $program_level->program_id : old("program_id") }}"/>
                       @if($errors->has("program_id"))
                        <span class="help-block">{{ $errors->first("program_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('level_id')) has-error @endif">
                       <label for="level_id-field">Level_id</label>
                    <input type="text" id="level_id-field" name="level_id" class="form-control" value="{{ is_null(old("level_id")) ? $program_level->level_id : old("level_id") }}"/>
                       @if($errors->has("level_id"))
                        <span class="help-block">{{ $errors->first("level_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('program_levels.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
