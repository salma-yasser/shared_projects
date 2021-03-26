@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> KidParents / Edit #{{$kid_parent->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('kid_parents.update', $kid_parent->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('parent_id')) has-error @endif">
                       <label for="parent_id-field">Parent_id</label>
                    <input type="text" id="parent_id-field" name="parent_id" class="form-control" value="{{ is_null(old("parent_id")) ? $kid_parent->parent_id : old("parent_id") }}"/>
                       @if($errors->has("parent_id"))
                        <span class="help-block">{{ $errors->first("parent_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('kid_id')) has-error @endif">
                       <label for="kid_id-field">Kid_id</label>
                    <input type="text" id="kid_id-field" name="kid_id" class="form-control" value="{{ is_null(old("kid_id")) ? $kid_parent->kid_id : old("kid_id") }}"/>
                       @if($errors->has("kid_id"))
                        <span class="help-block">{{ $errors->first("kid_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('kid_parents.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
