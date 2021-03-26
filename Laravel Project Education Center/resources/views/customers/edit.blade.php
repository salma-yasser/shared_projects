@extends('layouts.admin')

@section('header')
  <i class="glyphicon glyphicon-edit"></i> Customers / Edit #{{$customer->id}}
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $customer->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ is_null(old("email")) ? $customer->email : old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('nationality')) has-error @endif">
                       <label for="nationality-field">Nationality</label>
                    <input type="text" id="nationality-field" name="nationality" class="form-control" value="{{ is_null(old("nationality")) ? $customer->nationality : old("nationality") }}"/>
                       @if($errors->has("nationality"))
                        <span class="help-block">{{ $errors->first("nationality") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Birthdate</label>
                    <input type="text" id="birthdate-field" name="birthdate" class="form-control date-picker" value="{{ is_null(old("birthdate")) ? $customer->birthdate : old("birthdate") }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Gender</label>
                    <input type="text" id="gender-field" name="gender" class="form-control" value="{{ is_null(old("gender")) ? $customer->gender : old("gender") }}"/>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('type')) has-error @endif">
                       <label for="type-field">Type</label>
                    <input type="text" id="type-field" name="type" class="form-control" value="{{ is_null(old("type")) ? $customer->type : old("type") }}"/>
                       @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('how_know')) has-error @endif">
                       <label for="how_know-field">How_know</label>
                    <input type="text" id="how_know-field" name="how_know" class="form-control" value="{{ is_null(old("how_know")) ? $customer->how_know : old("how_know") }}"/>
                       @if($errors->has("how_know"))
                        <span class="help-block">{{ $errors->first("how_know") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label for="status-field">Status</label>
                    <input type="text" id="status-field" name="status" class="form-control" value="{{ is_null(old("status")) ? $customer->status : old("status") }}"/>
                       @if($errors->has("status"))
                        <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('customers.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection

