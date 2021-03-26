@extends('layouts.admin')

@section('header')
    <h3 class="panel-title"><i class="glyphicon glyphicon-align-justify"></i> كيف توصلت إلينا </h3>
@endsection

@section('content')
   <div class="panel">
        <div class="panel-heading">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('how_knows.create') }}"><i class="glyphicon glyphicon-plus"></i> جديد</a>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.panel-heading -->
        @if($how_knows->count())
        <div class="panel-body no-padding">
            <div class="table-responsive" style="margin-top: -1px;">
                <table class="table table-primary"">
                    <thead>
                        <tr>
                            <th class="text-right">كيف توصلت إلينا</th>
                            <th class="text-center" style="width: 25%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($how_knows as $how_know)
                            <tr>
                                <td>{{$how_know->name}}</td>
                                <td class="text-center border-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('how_knows.show',
                                        $how_know->id) }}"><i class="glyphicon glyphicon-eye-open"></i> عرض</a>
                                        
                                    <a class="btn btn-xs btn-warning" href="{{ route('how_knows.edit', $how_know->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>

                                    <form action="{{ route('how_knows.destroy', $how_know->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
            <h3 class="text-center alert alert-info">لا يوجد بيانات في الوقت الحالي!</h3>
        @endif
    </div>
@endsection