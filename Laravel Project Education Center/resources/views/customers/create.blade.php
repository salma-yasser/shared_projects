@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">

@endsection
@section('header')
  <i class="glyphicon glyphicon-plus"></i> New Customers
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('customers.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label class="col-sm-2 control-label" for="name-field">الإسم</label>
                    <input type="text" id="name-field" name="name" class="form-control txt-new" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label class="col-sm-2 control-label" for="email-field">البريد الإلكتروني</label>
                    <input type="text" id="email-field" name="email" class="form-control txt-new" value="{{ old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('nationality')) has-error @endif">
                       <label class="col-sm-2 control-label" for="nationality-field">الجنسية</label>
                    <input type="text" id="nationality-field" name="nationality" class="form-control txt-new" value="{{ old("nationality") }}"/>
                       @if($errors->has("nationality"))
                        <span class="help-block">{{ $errors->first("nationality") }}</span>
                       @endif
                    </div>

                      <div class="form-group @if($errors->has('national_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="national_id-field">الرقم القومي</label>
                    <input type="text" id="national_id-field" name="national_id" class="form-control txt-new" value="{{ old("national_id") }}"/>
                       @if($errors->has("national_id"))
                        <span class="help-block">{{ $errors->first("national_id") }}</span>
                       @endif
                    </div>

                    <div class="form-group  @if($errors->has('birthdate')) has-error @endif" >
                       <label class="col-sm-2 control-label" for="birthdate-field">تاريخ الميلاد</label>
                    <input type="text" id="birthdate-field" name="birthdate" data-date-format="yyyy-m-dd" class="form-control datepicker txt-new " value="{{ old("birthdate") }}" />
                  
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label class="col-sm-2 control-label" for="gender-field">الجنس</label>
                    <select id="gender-field" name="gender" class="form-control txt-new" >
                          <option value="0">إختر النوع</option>

                    <option value="Male">ذكر</option>
                    <option value="Female">أنثي</option>
                    </select>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                   
                 <div class="form-group @if($errors->has('how_know')) has-error @endif">
                       <label class="col-sm-2 control-label" for="how_know-field">كيف توصلت إلينا</label>
                    <select id="how_know-field" name="how_know" class="form-control txt-new" >
                          <option value="0">كيف توصلت إلينا</option>

                      @if(count($howKnows)>0)
                          @foreach($howKnows as $howKnow)
                            <option value="{{$howKnow->id}}">{{$howKnow->name}}</option>

                          @endforeach

                       @endif

                    </select>
                       @if($errors->has("how_know"))
                        <span class="help-block">{{ $errors->first("how_know") }}</span>
                       @endif
                    </div>
  


                     <div class="form-group @if($errors->has('type')) has-error @endif">
                       <label class="col-sm-2 control-label" for="type-field">نوع المتقدم من حيث السن </label>
                        <select id="type-field" name="type" class="form-control txt-new" value="{{ old('type') }}" data-style="btn-success">
                          <option value="0">اختار النوع</option>
                          <option value="1">شخص بالغ</option>
                          <option value="2">طفل</option>
                        </select>
                       @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                       @endif
                    </div>


                <div class="">
                    <button type="submit" class="btn btn-primary">التالي</button>
           
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('#birthdate-field').datepicker({
    });
  </script>
@endsection