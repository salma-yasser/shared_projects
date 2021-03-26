@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <i class="glyphicon glyphicon-plus"></i> برنامج جديد
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('programs.store') }}" method="POST" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-body">
                  <div class="form-group @if($errors->has('course_id')) has-error @endif">
                    <label class="col-sm-3 control-label" for="course_id-field">الكورس</label>
                    <div class="col-sm-6">
                      <select  id="course_id-field" name="course_id" class="form-control">
                      @if(count($courses) >0)

                        @foreach($courses as $course)
                          <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                      @endif
                      </select>
                         @if($errors->has("course_id"))
                          <span class="help-block">{{ $errors->first("course_id") }}</span>
                         @endif
                    </div>
                  </div>
                  <div class="form-group @if($errors->has('from_date')) has-error @endif">
                    <label class="col-sm-3 control-label" for="from_date-field">تاريخ البدء</label>
                    <div class="col-sm-6">
                      <input type="text" id="from_date-field" name="from_date" data-date-format="yyyy-m-dd"  class="form-control date-picker" value="{{ old("from_date") }}"/>
                         @if($errors->has("from_date"))
                          <span class="help-block">{{ $errors->first("from_date") }}</span>
                         @endif
                    </div>
                  </div>
                  <div class="form-group @if($errors->has('to_date')) has-error @endif">
                    <label class="col-sm-3 control-label" for="to_date-field">تاريخ الإنتهاء</label>
                    <div class="col-sm-6">
                      <input type="text" id="to_date-field" data-date-format="yyyy-m-dd"  name="to_date" class="form-control date-picker" value="{{ old("to_date") }}"/>
                         @if($errors->has("to_date"))
                          <span class="help-block">{{ $errors->first("to_date") }}</span>
                         @endif
                    </div>
                  </div>
                  <div class="form-group @if($errors->has('duration')) has-error @endif">
                   <label class="col-sm-3 control-label" for="duration-field">المدة الزمنية</label>
                   <div class="col-sm-6">
                    <input type="text" id="duration-field" name="duration" class="form-control" value="{{ old("duration") }}"/>
                       @if($errors->has("duration"))
                        <span class="help-block">{{ $errors->first("duration") }}</span>
                       @endif
                    </div>
                  </div>
                  <div class="form-group @if($errors->has('price')) has-error @endif">
                    <label class="col-sm-3 control-label" for="price-field">سعر الكورس</label>
                    <div class="col-sm-6">
                      <input type="text" id="price-field" name="price" class="form-control" value="{{ old("price") }}"/>
                         @if($errors->has("price"))
                          <span class="help-block">{{ $errors->first("price") }}</span>
                         @endif
                    </div>
                  </div>
                  <div class="form-group @if($errors->has('priority')) has-error @endif">
                    <label class="col-sm-3 control-label" for="priority-field">أولوية البرنامج</label>
                    <div class="col-sm-6">
                      <input type="number" min="0" id="priority-field" name="priority" class="form-control" value="{{ old("priority") }}"/>
                         @if($errors->has("priority"))
                          <span class="help-block">{{ $errors->first("priority") }}</span>
                         @endif
                    </div>
                  </div>
                  <div class="well well-sm">
                      <button type="submit" class="btn btn-primary">إنشاء</button>
                      <a class="btn btn-link pull-left" href="{{ url()->previous()}}"><i class="glyphicon glyphicon-backward"></i> الرجوع</a>
                  </div>
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
