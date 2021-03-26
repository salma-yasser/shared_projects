@extends('layout')
@section('header')
<div class="page-header">
        <h1>Lectures / Show #{{$lecture->id}}</h1>
        <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('lectures.edit', $lecture->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="date">DATE</label>
                     <p class="form-control-static">{{$lecture->date}}</p>
                </div>
                    <div class="form-group">
                     <label for="start_time">START_TIME</label>
                     <p class="form-control-static">{{$lecture->start_time}}</p>
                </div>
                    <div class="form-group">
                     <label for="program_id">PROGRAM_ID</label>
                     <p class="form-control-static">{{$lecture->program_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('lectures.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection