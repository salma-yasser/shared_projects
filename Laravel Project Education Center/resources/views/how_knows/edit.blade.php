@extends('layouts.admin')

@section('header')
    <h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> تعديل إقتراح {{ $how_know->name }}</h3>
@endsection

@section('content')
    @include('error')

      <form class="form-horizontal mt-10" action="{{ route('how_knows.update', $how_know->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-body">
                @include('error')
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label class="col-sm-3 control-label text-left " for="name-field">الإقتراح:<span class="asterisk"> *</span></label>
                    <div class="col-sm-6">
                        <input required type="text" id="name-field" class="form-control input-sm" name="name" value="{{ is_null(old('name')) ? $how_know->name : old('name') }}">
                        @if($errors->has("name"))
                          <span class="text-muted help-block">{{ $errors->first("name") }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="pull-left">
                    <button class="btn btn-success" type="submit">&nbsp حفظ &nbsp</button>
                    <a class="btn btn-danger mr-5" href="{{ route('how_knows.index') }}">&nbsp إلغاء &nbsp</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    
@endsection
