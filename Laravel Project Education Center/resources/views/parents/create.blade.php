@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> بيانات ولي الأمر </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('parents.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label class="col-sm-2 control-label" for="name-field">إسم ولي الأمر</label>
                    <input type="text" id="name-field" name="name" class="form-control new-txt" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('relative')) has-error @endif">
                       <label class="col-sm-2 control-label" for="relative-field">درجة القرابة</label>
                    <input type="text" id="relative-field" name="relative" class="form-control new-txt" value="{{ old("relative") }}"/>
                       @if($errors->has("relative"))
                        <span class="help-block">{{ $errors->first("relative") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile1')) has-error @endif">
                       <label class="col-sm-2 control-label" for="mobile1-field">رقم الهاتف</label>
                    <input type="text" id="mobile1-field" name="mobile1" class="form-control new-txt" value="{{ old("mobile1") }}"/>
                       @if($errors->has("mobile1"))
                        <span class="help-block">{{ $errors->first("mobile1") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile2')) has-error @endif">
                       <label class="col-sm-2 control-label" for="mobile2-field">رقم هاتف أخر</label>
                    <input type="text" id="mobile2-field" name="mobile2" class="form-control new-txt" value="{{ old("mobile2") }}"/>
                       @if($errors->has("mobile2"))
                        <span class="help-block">{{ $errors->first("mobile2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label class="col-sm-2 control-label" for="phone-field">رقم المنزل</label>
                    <input type="text" id="phone-field" name="phone" class="form-control new-txt" value="{{ old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label class="col-sm-2 control-label" for="address-field">العنوان</label>
                    <input type="text" id="address-field" name="address" class="form-control new-txt" value="{{ old("address") }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label class="col-sm-2 control-label" for="email-field">البريد الإلكتروني</label>
                    <input type="text" id="email-field" name="email" class="form-control new-txt" value="{{ old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                 
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">التالي</button>
                    <a class="btn btn-link pull-right" href="{{ url()->previous() }}"><i class="glyphicon glyphicon-backward"></i> السابق</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
