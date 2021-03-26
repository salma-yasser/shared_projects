@extends('layout')
@section('header')
<div class="page-header">
        <h1>Feedback / Show #{{$feedback->id}}</h1>
        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('feedback.edit', $feedback->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$feedback->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="reason">REASON</label>
                     <p class="form-control-static">{{$feedback->reason}}</p>
                </div>
                    <div class="form-group">
                     <label for="customer_id">CUSTOMER_ID</label>
                     <p class="form-control-static">{{$feedback->customer_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="message">MESSAGE</label>
                     <p class="form-control-static">{{$feedback->message}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('feedback.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection