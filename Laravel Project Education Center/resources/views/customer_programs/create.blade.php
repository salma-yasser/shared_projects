@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
  <i class="glyphicon glyphicon-plus"></i> Customer Programs 

@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('customer_programs.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div hidden class="form-group @if($errors->has('customer_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="customer_id-field">Customer_id</label>
                    <input type="text" id="customer_id-field" name="customer_id" class="form-control txt-new" value="{{ old("customer_id") }}"/>
                       @if($errors->has("customer_id"))
                        <span class="help-block">{{ $errors->first("customer_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('program_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="program_id-field">Program</label>
                    <select id="program_id-field" name="program_id" class="txt-new" >
                      @if($programs->count() >0)
                        @foreach($programs as $program)
                          <option value="{{$program->id}}"> {{$program->course->name}}</option>
                        @endforeach
                      @endif
                    </select>
                       @if($errors->has("program_id"))
                        <span class="help-block">{{ $errors->first("program_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('goals')) has-error @endif">
                       <label class="col-sm-2 control-label" for="goals-field">Goals</label>
                    <textarea class="form-control txt-new" id="goals-field" rows="3" name="goals">{{ old("goals") }}</textarea>
                       @if($errors->has("goals"))
                        <span class="help-block">{{ $errors->first("goals") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label class="col-sm-2 control-label" for="status-field">Status</label>
                    <input type="text" id="status-field" name="status" class="form-control txt-new" value="{{ old("status") }}"/>
                       @if($errors->has("status"))
                        <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('customer_programs.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
