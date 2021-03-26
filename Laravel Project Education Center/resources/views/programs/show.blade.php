@extends('layouts.admin')
@section('header')

    <h3>بيانات البرنامج رقم #{{$program->id}}</h3>
    <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-left" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('programs.edit', $program->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
            <button type="submit" class="btn btn-danger">حذف <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">

            <div class="col-md-12">
        <h3>بيانات البرنامج</h3>
        </div>
                    <div class="form-group col-md-4">
                     <label for="from_date">تاريخ البدء</label>
                     <p class="form-control-static">{{$program->from_date}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="to_date">تاريخ الإنتهاء</label>
                     <p class="form-control-static">{{$program->to_date}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="duration">المدة الزمنية</label>
                     <p class="form-control-static">{{$program->duration}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="price">السعر</label>
                     <p class="form-control-static">{{$program->price}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="priority">الأولويه</label>
                     <p class="form-control-static">{{$program->priority}}</p>
                </div>
                <div class="form-group col-md-4">
                     <label for="priority">عدد الطلاب الملتحقين بالبرنامج</label>
                     <p class="form-control-static"><a href="{{URL::asset('customer_program/'.$program->id)}}">{{$program->no_students}}</a></p>
                </div>
        <div class="col-md-12">
        <h3>بيانات الكورس الأساسية</h3>
        </div>
                <div class="form-group col-md-4">
                     <label for="course_id">الكورس</label>
                     <p class="form-control-static">{{$program->course->name}}</p>
                </div>

                 
                    <div class="form-group col-md-4">
                     <label for="type">شهري/ثانوي</label>
                     <p class="form-control-static">{{$program->course->type}}</p>
                </div>

                    <div class="form-group col-md-4">
                     <label for="age">المرحلة العمرية </label>
                     <p class="form-control-static">{{$program->course->age}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="duration">المدة الزمنية </label>
                     <p class="form-control-static">{{$program->course->duration}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="levels">المستويات</label>
                     <p class="form-control-static">{{$program->course->levels}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="tutorials">الماده العلمية</label>
                     <p class="form-control-static">{{$program->course->tutorials}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="how_performance">HOW_PERFORMANCE</label>
                     <p class="form-control-static">{{$program->course->how_performance}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="how_register">HOW_REGISTER</label>
                     <p class="form-control-static">{{$program->course->how_register}}</p>
                </div>
                    <div class="form-group col-md-4">
                     <label for="how_degree">كيفية التقويم</label>
                     <p class="form-control-static">{{$program->course->how_degree}}</p>
                </div>

                <div class="form-group col-md-6">
                     <label for="description">نبذة عن البرنامج </label>
                     <p class="form-control-static">{{$program->course->description}}</p>
                </div>
                    <div class="form-group col-md-6">
                     <label for="goals"> اهداف البرنامج</label>
                     <p class="form-control-static">{{$program->course->goals}}</p>
                </div>

            </form>
            
            <div class="col-md-12">

            <a class="btn btn-link" href="{{ url()->previous() }}"><i class="glyphicon glyphicon-backward"></i>  الرجوع</a>
            </div>

        </div>
    </div>

@endsection