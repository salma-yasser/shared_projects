@extends('layouts.admin')

@section('header')
        <h3>
            <i class="glyphicon glyphicon-align-justify"></i> العملاء
            
        </h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($customers->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">كود الطالب</th>
                            <th class="text-right">إسم الطالب</th>
                            <th class="text-center">بالغ/طفل</th>
                            <th class="text-center">النوع</th>
                            <th class="text-center">الحاله</th>
                            <th class="text-right">الإختيارات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td class="text-center">{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td class="text-center">@if($customer->type == 1) بالغ @else طفل @endif</td>
                                <td class="text-center">{{$customer->gender}}</td>
                                <td class="text-center">{{$customer->status}}</td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-primary" href="{{ route('customers.show', $customer->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('customers.edit', $customer->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>

                                    <a class="btn btn-xs btn-info" href="{{ URL::asset('customers_user/'.$customer->id) }}"><i class="glyphicon glyphicon-plus"></i>إنشاء رقم سري للطالب</a>


                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $customers->render() !!}
            @else
                <h3 class="text-center alert alert-info">لا يوجد عملاء في الوقت الحالي!</h3>
            @endif

        </div>
    </div>

@endsection