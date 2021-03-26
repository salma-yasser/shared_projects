@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Kids / Edit #{{$kid->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('kids.update', $kid->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $kid->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('school_name')) has-error @endif">
                       <label for="school_name-field">School_name</label>
                    <input type="text" id="school_name-field" name="school_name" class="form-control" value="{{ is_null(old("school_name")) ? $kid->school_name : old("school_name") }}"/>
                       @if($errors->has("school_name"))
                        <span class="help-block">{{ $errors->first("school_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('school_type')) has-error @endif">
                       <label for="school_type-field">School_type</label>
                    <input type="text" id="school_type-field" name="school_type" class="form-control" value="{{ is_null(old("school_type")) ? $kid->school_type : old("school_type") }}"/>
                       @if($errors->has("school_type"))
                        <span class="help-block">{{ $errors->first("school_type") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('school_address')) has-error @endif">
                       <label for="school_address-field">School_address</label>
                    <input type="text" id="school_address-field" name="school_address" class="form-control" value="{{ is_null(old("school_address")) ? $kid->school_address : old("school_address") }}"/>
                       @if($errors->has("school_address"))
                        <span class="help-block">{{ $errors->first("school_address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('year')) has-error @endif">
                       <label for="year-field">Year</label>
                    <input type="text" id="year-field" name="year" class="form-control" value="{{ is_null(old("year")) ? $kid->year : old("year") }}"/>
                       @if($errors->has("year"))
                        <span class="help-block">{{ $errors->first("year") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('level')) has-error @endif">
                       <label for="level-field">Level</label>
                    <input type="text" id="level-field" name="level" class="form-control" value="{{ is_null(old("level")) ? $kid->level : old("level") }}"/>
                       @if($errors->has("level"))
                        <span class="help-block">{{ $errors->first("level") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile')) has-error @endif">
                       <label for="mobile-field">Mobile</label>
                    <input type="text" id="mobile-field" name="mobile" class="form-control" value="{{ is_null(old("mobile")) ? $kid->mobile : old("mobile") }}"/>
                       @if($errors->has("mobile"))
                        <span class="help-block">{{ $errors->first("mobile") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('kids.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
