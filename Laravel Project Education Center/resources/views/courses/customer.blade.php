@extends('layouts.customer-admin')

@section('header')
            <i class="glyphicon glyphicon-align-justify"></i> الكورسات       
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            @if($courses->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                          
                            <th>إسم الكورس</th>
                       
                            <th>نوع الكورس</th>
                            <th>أهداف الكورس</th>
                            <th>المرحلة العمرية</th>
                            <th>المدة الزمنيه</th>
                            <th>المستويات</th>
                          
                           
                            <th class="text-right">الإختيارات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                             
                                <td>{{$course->name}}</td>
                              
                                <td>{{$course->type}}</td>
                                <td>{{$course->goals}}</td>
                                <td>{{$course->age}}</td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->levels}}</td>      
                              
                                <td class="text-right">
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $courses->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection