@extends('layouts.admin')

@section('header')
    <h3 class="panel-title"><i class="glyphicon glyphicon-align-justify"></i> الدورات </h3>     
@endsection

@section('content')
<div class="panel">
        <div class="panel-heading">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('courses.create') }}"><i class="glyphicon glyphicon-plus"></i> جديد</a>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.panel-heading -->
        @if($courses->count())
        <div class="panel-body no-padding">
            <div class="table-responsive" style="margin-top: -1px;">
                <table class="table table-primary"">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 2%;">#</th>
                            <th class="text-right">إسم الدورة</th>
                            <th class="text-right">القسم</th>
                            <th class="text-right">نبذه عن الدورة</th>
                            <th class="text-center" style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td class="text-center border-right">{{$course->id}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->department->name}}</td>
                                <td>{{$course->description}}</td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-primary" href="{{ route('courses.show', $course->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('courses.edit', $course->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $courses->render() !!}
            </div>
        </div>
        @else
            <h3 class="text-center alert alert-info">لا يوجد دورات في الوقت الحالي!!</h3>
        @endif
    </div>
@endsection