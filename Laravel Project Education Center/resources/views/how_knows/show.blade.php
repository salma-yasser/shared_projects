@extends('layouts.admin')

@section('header')
        <h3 class="panel-title"><i class="glyphicon glyphicon-eye-open"></i> عرض إقتراح {{ $how_know->name }}</h3>
@endsection

@section('content')
    @include('error')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <a class="btn btn-primary mr-5" href="{{ route('how_knows.index') }}"> القائمه الرئيسية</a>
            </div>
            <div class="pull-left">
                <a class="btn btn-warning" href="{{ route('how_knows.edit', $how_know->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>

                <form action="{{ route('how_knows.destroy', $how_know->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> حذف</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label text-left " for="name-field">الإقتراح:<span class="asterisk"> *</span></label>
                <div class="col-sm-6">
                    <input required type="text" id="name-field" class="form-control input-sm" readonly name="name" value="{{ $how_know->name}}">
                </div>
            </div>
        </div>
    </div>
@endsection
