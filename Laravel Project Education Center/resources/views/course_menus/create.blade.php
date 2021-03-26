@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> CourseMenus / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('course_menus.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('menu_id')) has-error @endif">
                       <label for="menu_id-field">Menu_id</label>
                    <input type="text" id="menu_id-field" name="menu_id" class="form-control" value="{{ old("menu_id") }}"/>
                       @if($errors->has("menu_id"))
                        <span class="help-block">{{ $errors->first("menu_id") }}</span>
                       @endif
                    </div>


                    <div class="form-group @if($errors->has('course_id')) has-error @endif">
                       <label for="course_id-field">course_id</label>
                    <input type="text" id="course_id-field" name="course_id" class="form-control" value="{{ old("course_id") }}"/>
                       @if($errors->has("course_id"))
                        <span class="help-block">{{ $errors->first("course_id") }}</span>
                       @endif
                    </div>


                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('course_menus.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
