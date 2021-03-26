@extends('layouts.customer-admin')


@section('content')

        <h3><i class="glyphicon glyphicon-plus"></i> Create Feedback </h3>

         @if ($message = Session::get('message'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
      @endif

    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('feedback.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label class="col-sm-2 label-control" for="title-field">Title</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('reason')) has-error @endif">
                       <label class="col-sm-2 label-control"  for="reason-field">Reason</label>
                    <input type="text" id="reason-field" name="reason" class="form-control" value="{{ old("reason") }}"/>
                       @if($errors->has("reason"))
                        <span class="help-block">{{ $errors->first("reason") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('customer_id')) has-error @endif">
                       <label for="customer_id-field">Customer_id</label>
                    <input type="text" id="customer_id-field" name="customer_id" class="form-control" value="{{ Auth::user()->id }}"/>
                       @if($errors->has("customer_id"))
                        <span class="help-block">{{ $errors->first("customer_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('message')) has-error @endif">
                       <label class="col-sm-2 label-control"  for="message-field">Message</label>
                    <textarea class="form-control" id="message-field" rows="4" name="message">{{ old("message") }}</textarea>
                       @if($errors->has("message"))
                        <span class="help-block">{{ $errors->first("message") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ url()->previous() }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')

@endsection
