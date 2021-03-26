@extends('layouts.admin')

@section('header')
  <i class="glyphicon glyphicon-plus"></i> تسجيل مستخدم جديد
@endsection
@section('css')
<style type="text/css">  
.rtl{
  direction: rtl;
}
    .state-icon {
    left: -5px;
}
.form-horizontal .form-group .radio{
  float: right;
}
.list-group-item-primary {
    color: rgb(255, 255, 255);
    background-color: rgb(66, 139, 202);
}
</style>

@endsection
@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-10 col-md-offset-1 rtl">

              <form class="form-horizontal rtl" role="form" method="POST" action="{{ url('/new_customer') }}">
                        {{ csrf_field() }}
                        <div hidden>
                        <input id="id" type="text" class="form-control" name="id" value="{{ Request::segment(2) }}" >
                        </div>

                        <div class="rtl form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">الاسم</label>

                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ App\Customer::where('id',Request::segment(2))->value('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="rtl form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" control-label">البريد الإلكتروني أو الاسم</label>

                            <div class="col-sm-10">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="rtl form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">الرقم السري</label>

                            <div class="col-sm-10">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="rtl form-group">
                            <label for="password-confirm" class=" control-label">تأكيد الرقم السري</label>

                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                         <div class="rtl form-group">
                            <div class="col-sm-10 ">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل مستخدم جديد
                                </button>
                            </div>
                        </div>
                    </form>

        </div>
    </div>
@endsection
