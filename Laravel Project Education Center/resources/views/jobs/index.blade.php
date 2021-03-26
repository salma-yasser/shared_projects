@extends('layouts.admin')

@section('header')
    <h3 class="panel-title"><i class="glyphicon glyphicon-align-justify"></i> وظائف العملاء </h3>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('jobs.create') }}"><i class="glyphicon glyphicon-plus"></i> جديد</a>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.panel-heading -->
        @if($jobs->count())
        <div class="panel-body no-padding">
            <div class="table-responsive" style="margin-top: -1px;">
                <table class="table table-primary"">
                    <thead>
                        <tr>
                            <th class="text-right">إسم الوظيفه</th>
                            <th class="text-center" style="width: 25%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->name}}</td>
                                <td class="text-center border-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('jobs.show',
                                        $job->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                        
                                    <a class="btn btn-xs btn-warning" href="{{ route('jobs.edit', $job->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>

                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
            <h3 class="text-center alert alert-info">لا يوجد وظائف في الوقت الحالي!</h3>
        @endif
    </div>
@endsection