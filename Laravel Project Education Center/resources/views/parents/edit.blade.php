@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Parents / Edit #{{$parent->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('parents.update', $parent->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $parent->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('relative')) has-error @endif">
                       <label for="relative-field">Relative</label>
                    <input type="text" id="relative-field" name="relative" class="form-control" value="{{ is_null(old("relative")) ? $parent->relative : old("relative") }}"/>
                       @if($errors->has("relative"))
                        <span class="help-block">{{ $errors->first("relative") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile1')) has-error @endif">
                       <label for="mobile1-field">Mobile1</label>
                    <input type="text" id="mobile1-field" name="mobile1" class="form-control" value="{{ is_null(old("mobile1")) ? $parent->mobile1 : old("mobile1") }}"/>
                       @if($errors->has("mobile1"))
                        <span class="help-block">{{ $errors->first("mobile1") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile2')) has-error @endif">
                       <label for="mobile2-field">Mobile2</label>
                    <input type="text" id="mobile2-field" name="mobile2" class="form-control" value="{{ is_null(old("mobile2")) ? $parent->mobile2 : old("mobile2") }}"/>
                       @if($errors->has("mobile2"))
                        <span class="help-block">{{ $errors->first("mobile2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="{{ is_null(old("phone")) ? $parent->phone : old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <input type="text" id="address-field" name="address" class="form-control" value="{{ is_null(old("address")) ? $parent->address : old("address") }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ is_null(old("email")) ? $parent->email : old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('')) has-error @endif">
                       <label for="-field"></label>
                    <input type="text" id="-field" name="" class="form-control" value="{{ is_null(old("")) ? $parent-> : old("") }}"/>
                       @if($errors->has(""))
                        <span class="help-block">{{ $errors->first("") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('parents.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
