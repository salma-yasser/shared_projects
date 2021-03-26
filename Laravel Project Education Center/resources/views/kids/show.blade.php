@extends('layout')
@section('header')
<div class="page-header">
        <h1>Kids / Show #{{$kid->id}}</h1>
        <form action="{{ route('kids.destroy', $kid->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('kids.edit', $kid->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$kid->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="school_name">SCHOOL_NAME</label>
                     <p class="form-control-static">{{$kid->school_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="school_type">SCHOOL_TYPE</label>
                     <p class="form-control-static">{{$kid->school_type}}</p>
                </div>
                    <div class="form-group">
                     <label for="school_address">SCHOOL_ADDRESS</label>
                     <p class="form-control-static">{{$kid->school_address}}</p>
                </div>
                    <div class="form-group">
                     <label for="year">YEAR</label>
                     <p class="form-control-static">{{$kid->year}}</p>
                </div>
                    <div class="form-group">
                     <label for="level">LEVEL</label>
                     <p class="form-control-static">{{$kid->level}}</p>
                </div>
                    <div class="form-group">
                     <label for="mobile">MOBILE</label>
                     <p class="form-control-static">{{$kid->mobile}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('kids.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection