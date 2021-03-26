@extends('layouts.admin')

@section('header')
    
        <h3>
            <i class="glyphicon glyphicon-align-justify"></i> أولياء الأمور
        </h3>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($parents->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم</th>
                        <th>صلة القرابة</th>
                        <th>رقم الموبايل</th>
                        <th>رقم الموبايل 2</th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                        <th>عدد الأبناء في ugrow </th>
                 
                            <th class="text-right">الإختيارات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($parents as $parent)
                            <tr>
                                <td>{{$parent->id}}</td>
                                <td>{{$parent->name}}</td>
                    <td>{{$parent->relative}}</td>
                    <td>{{$parent->mobile1}}</td>
                    <td>{{$parent->mobile2}}</td>
                    <td>{{$parent->phone}}</td>
                    <td>{{$parent->address}}</td>
                    <td>{{$parent->email}}</td>
                    <td>{{$parent->no_kids}}</td>
       
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('parents.show', $parent->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('parents.edit', $parent->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
                                    <form action="{{ route('parents.destroy', $parent->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $parents->render() !!}
            @else
                <h3 class="text-center alert alert-info">لا يوجد أولياء أمور في الوقت الحالي!</h3>
            @endif

        </div>
    </div>

@endsection