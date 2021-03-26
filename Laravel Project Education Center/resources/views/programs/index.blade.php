@extends('layouts.admin')

@section('header')
        <h3>    <i class="glyphicon glyphicon-align-justify"></i> البرامج 
            <a class="btn btn-success pull-left" href="{{ route('programs.create') }}"><i class="glyphicon glyphicon-plus"></i> جديد</a>
            </h3>
    <div class="clearfix"></div>
            
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($programs->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>    
                        <th class="text-right">الكورس</th>
                        <th class="text-center">تاريخ البدء</th>
                        <th class="text-center">تاريخ الإنتهاء</th>
                        <th class="text-center">المدة الزمنية</th>
                        <th class="text-center">السعر</th>
                        <th class="text-center">الأولوية</th>
                        <th class="text-center">عدد الطلبة </th>
                        <th class="text-center" style="width: 30%;"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($programs as $program)
                            <tr>
                            <td>{{$program->course->name}}</td>
                            <td class="text-center">{{$program->from_date}}</td>
                            <td class="text-center">{{$program->to_date}}</td>
                            <td class="text-center">{{$program->duration}}</td>
                            <td class="text-center">{{$program->price}}</td>
                            <td class="text-center">{{$program->priority}}</td>
                            <td class="text-center"><a href="{{URL::asset('customer_program/'.$program->id)}}">{{$program->no_students}}</a></td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-primary" href="{{ route('programs.show', $program->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('programs.edit', $program->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
                                    <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $programs->render() !!}
            @else
                <h3 class="text-center alert alert-info">لا يوجد برامج في الوقت الحالي!</h3>
            @endif

        </div>
    </div>

@endsection