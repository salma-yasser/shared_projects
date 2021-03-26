@extends('layouts.admin')

@section('header')
        <h3 class="panel-title"><i class="glyphicon glyphicon-eye-open"></i> عرض كورس {{ $course->name }}</h3>
@endsection

@section('content')
    @include('error')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <a class="btn btn-primary mr-5" href="{{ route('courses.index') }}"> القائمه الرئيسية</a>
            </div>
            <div class="pull-left">
                <a class="btn btn-warning" href="{{ route('courses.edit', $course->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>

                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
            <form class="form-horizontal mt-10" action="#">
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left " for="name-field">الإسم:</label>
                    <div class="col-sm-6">
                        <input id="name-field" class="form-control" readonly name="name" value="{{ $course->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left " for="name-field">القسم:</label>
                    <div class="col-sm-6">
                        <input id="department-field" class="form-control" readonly name="department" value="{{ $course->department->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">نبذه عن الكورس:</label>
                    <div class="col-sm-6">
                         <textarea  name="description" class="form-control" rows="3" readonly> {{ $course->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-left" for="goals-field">الأهداف:</label>
                  <div class="col-sm-6 control-group" id="fields">
                      <input data-items="8" name="goals[]" class="form-control" readonly value="{{ $course->goals }}" />
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">المرحلة العمرية:</label>
                    <div class="col-sm-6">
                        <textarea  name="age" class="form-control" rows="3" readonly> {{ $course->age }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">المدة الزمنية:</label>
                    <div class="col-sm-6">
                         <textarea  name="duration" class="form-control" rows="3" readonly> {{ $course->duration }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">المستويات:</label>
                    <div class="col-sm-6">
                        <textarea  name="levels" class="form-control" rows="3" readonly> {{ $course->levels }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">المناهج المستخدمة:</label>
                    <div class="col-sm-6">
                        <textarea  name="tutorials" class="form-control" rows="3" readonly> {{ $course->tutorials }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">كيفية التقييم:</label>
                    <div class="col-sm-6">
                        <textarea  name="description" class="form-control" rows="3" readonly> {{ $course->how_performance }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">شروط التسجيل:</label>
                    <div class="col-sm-6">
                        <textarea  name="how_register" class="form-control" rows="3" readonly> {{ $course->how_register }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">شروط الحصول على الشهادة:</label>
                    <div class="col-sm-6">
                        <textarea  name="how_degree" class="form-control" rows="3" readonly> {{ $course->how_degree }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
