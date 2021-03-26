@extends('layouts.admin')
@section('header')

        <h3>بيانات ولي الأمر رقم #{{$parent->id}}</h3>
        <form action="{{ route('parents.destroy', $parent->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-left" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('parents.edit', $parent->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
                <button type="submit" class="btn btn-danger">حذف <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
   
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
               
                <div class="form-group col-sm-4">
                     <label for="name">إسم ولي الأمر</label>
                     <p class="form-control-static">{{$parent->name}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="relative">صلة ولي الأمر</label>
                     <p class="form-control-static">{{$parent->relative}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="mobile1">رقم الموبايل</label>
                     <p class="form-control-static">{{$parent->mobile1}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="mobile2">رقم الموبايل 2</label>
                     <p class="form-control-static">{{$parent->mobile2}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="phone">رقم المنزل</label>
                     <p class="form-control-static">{{$parent->phone}}</p>
                </div>
                   
                    <div class="form-group col-sm-4">
                     <label for="email">البريد الإلكتروني</label>
                     <p class="form-control-static">{{$parent->email}}</p>
                </div>
                 <div class="form-group col-sm-5">
                     <label for="address">العنوان</label>
                     <p class="form-control-static">{{$parent->address}}</p>
                </div>
                    
            </form>


        <div class="col-md-12">
              @if($parent->kids->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>إسم الطفل</th>
                        <th>إسم المدرسة</th>
                        <th>نوع المدرسة</th>
                        <th>عنوان المدرسة</th>
                        <th>العام الدراسية</th>
                        <th>الصف الدراسي الحالي</th>
                        <th>رقم الموبايل</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($parent->kids as $kid)
                            <tr>
                                <td>{{$kid->id}}</td>
                                <td>{{$kid->kid->customer->name}}</td>
                    <td>{{$kid->kid->school_name}}</td>
                    <td>{{$kid->kid->school_type}}</td>
                    <td>{{$kid->kid->school_address}}</td>
                    <td>{{$kid->kid->year}}</td>
                    <td>{{$kid->kid->level}}</td>
                    <td>{{$kid->kid->mobile}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('customers.show', $kid->kid->customer->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('customers.edit', $kid->kid->customer->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
                                    <form action="{{ route('customers.destroy', $kid->kid->customer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
            @else
                <h3 class="text-center alert alert-info">ليس لديه أبناء في الوقت الحالي!</h3>
            @endif

        </div>
        <div class="col-md-12">

            <a class="btn btn-link" href="{{ route('parents.index') }}"><i class="glyphicon glyphicon-backward"></i>  الرجوع</a>
            </div>

        </div>
    </div>

@endsection