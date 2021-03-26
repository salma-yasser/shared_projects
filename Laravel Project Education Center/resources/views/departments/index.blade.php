@extends('layouts.admin')

@section('header')
    <h3 class="panel-title"><i class="glyphicon glyphicon-align-justify"></i> الأقسام </h3>
@endsection

@section('content')

   <div class="panel">
        <div class="panel-heading">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('departments.create') }}"><i class="glyphicon glyphicon-plus"></i> جديد</a>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.panel-heading -->
        @if($departments->count())
        <div class="panel-body no-padding">
            <div class="table-responsive" style="margin-top: -1px;">
                <table class="table table-primary"">
                    <thead>
                        <tr>
                            <th class="text-right">إسم القسم</th>
                            <th class="text-center" style="width: 25%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{$department->name}}</td>
                                <td class="text-center border-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('departments.show',
                                        $department->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                        
                                    <a class="btn btn-xs btn-warning" href="{{ route('departments.edit', $department->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>

                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <h3 class="text-center alert alert-info">لا يوجد أقسام في الوقت الحالي!</h3>
        @endif
    </div>
@endsection