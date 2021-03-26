@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Feedback / Edit #{{$feedback->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ is_null(old("title")) ? $feedback->title : old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('reason')) has-error @endif">
                       <label for="reason-field">Reason</label>
                    <input type="text" id="reason-field" name="reason" class="form-control" value="{{ is_null(old("reason")) ? $feedback->reason : old("reason") }}"/>
                       @if($errors->has("reason"))
                        <span class="help-block">{{ $errors->first("reason") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('customer_id')) has-error @endif">
                       <label for="customer_id-field">Customer_id</label>
                    <input type="text" id="customer_id-field" name="customer_id" class="form-control" value="{{ is_null(old("customer_id")) ? $feedback->customer_id : old("customer_id") }}"/>
                       @if($errors->has("customer_id"))
                        <span class="help-block">{{ $errors->first("customer_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('message')) has-error @endif">
                       <label for="message-field">Message</label>
                    <textarea class="form-control" id="message-field" rows="3" name="message">{{ is_null(old("message")) ? $feedback->message : old("message") }}</textarea>
                       @if($errors->has("message"))
                        <span class="help-block">{{ $errors->first("message") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('feedback.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
