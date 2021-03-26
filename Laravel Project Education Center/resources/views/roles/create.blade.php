@extends('layouts.admin')

 @section('header')
    <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> وظيفه جديد</h3>
@endsection
@section('content')

   <form class="form-horizontal mt-10" action="{{ route('roles.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-body">
            @include('error')
            <div class="form-group @if($errors->has('name')) has-error @endif">
                <label class="control-label col-sm-3 text-left">إسم الوظيفه:<span class="asterisk"> *</span></label>
                <div class="col-sm-6">
                   <input required class="form-control" name="name" placeholder="أدخل إسم الوظيفه" value="{{ old('name') }}">
                    @if($errors->has("name"))
                      <span class="text-muted help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="pull-left">
                <button class="btn btn-success" type="submit">&nbsp حفظ &nbsp</button>
                <a class="btn btn-danger mr-5" href="{{ route('roles.index') }}">&nbsp الغاء &nbsp</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
@endsection

