@extends('layout')
@section('header')
<div class="page-header">
        <h1>Adults / Show #{{$adult->id}}</h1>
        <form action="{{ route('adults.destroy', $adult->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('adults.edit', $adult->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$adult->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="mobile1">MOBILE1</label>
                     <p class="form-control-static">{{$adult->mobile1}}</p>
                </div>
                    <div class="form-group">
                     <label for="mobile2">MOBILE2</label>
                     <p class="form-control-static">{{$adult->mobile2}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <p class="form-control-static">{{$adult->phone}}</p>
                </div>
                    <div class="form-group">
                     <label for="email">EMAIL</label>
                     <p class="form-control-static">{{$adult->email}}</p>
                </div>
                    <div class="form-group">
                     <label for="job_status">JOB_STATUS</label>
                     <p class="form-control-static">{{$adult->job_status}}</p>
                </div>
                    <div class="form-group">
                     <label for="work">WORK</label>
                     <p class="form-control-static">{{$adult->work}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('adults.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection