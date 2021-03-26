@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
  <i class="glyphicon glyphicon-edit"></i> Programs / Edit #{{$program->id}}
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('programs.update', $program->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('course_id')) has-error @endif">
                       <label for="course_id-field">Course_id</label>
                    <input type="text" id="course_id-field" name="course_id" class="form-control" value="{{ is_null(old("course_id")) ? $program->course_id : old("course_id") }}"/>
                       @if($errors->has("course_id"))
                        <span class="help-block">{{ $errors->first("course_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('from_date')) has-error @endif">
                       <label for="from_date-field">From_date</label>
                    <input type="text" id="from_date-field" name="from_date" class="form-control date-picker" value="{{ is_null(old("from_date")) ? $program->from_date : old("from_date") }}"/>
                       @if($errors->has("from_date"))
                        <span class="help-block">{{ $errors->first("from_date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('to_date')) has-error @endif">
                       <label for="to_date-field">To_date</label>
                    <input type="text" id="to_date-field" name="to_date" class="form-control date-picker" value="{{ is_null(old("to_date")) ? $program->to_date : old("to_date") }}"/>
                       @if($errors->has("to_date"))
                        <span class="help-block">{{ $errors->first("to_date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duration')) has-error @endif">
                       <label for="duration-field">Duration</label>
                    <input type="text" id="duration-field" name="duration" class="form-control" value="{{ is_null(old("duration")) ? $program->duration : old("duration") }}"/>
                       @if($errors->has("duration"))
                        <span class="help-block">{{ $errors->first("duration") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('price')) has-error @endif">
                       <label for="price-field">Price</label>
                    <input type="text" id="price-field" name="price" class="form-control" value="{{ is_null(old("price")) ? $program->price : old("price") }}"/>
                       @if($errors->has("price"))
                        <span class="help-block">{{ $errors->first("price") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('priority')) has-error @endif">
                       <label for="priority-field">Priority</label>
                    <input type="text" id="priority-field" name="priority" class="form-control" value="{{ is_null(old("priority")) ? $program->priority : old("priority") }}"/>
                       @if($errors->has("priority"))
                        <span class="help-block">{{ $errors->first("priority") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('programs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
