@extends('layout')
@section('header')
<div class="page-header">
        <h1>KidParents / Show #{{$kid_parent->id}}</h1>
        <form action="{{ route('kid_parents.destroy', $kid_parent->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('kid_parents.edit', $kid_parent->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="parent_id">PARENT_ID</label>
                     <p class="form-control-static">{{$kid_parent->parent_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="kid_id">KID_ID</label>
                     <p class="form-control-static">{{$kid_parent->kid_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('kid_parents.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection