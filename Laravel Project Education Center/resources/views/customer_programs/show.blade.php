@extends('layout')
@section('header')
<div class="page-header">
        <h1>CustomerPrograms / Show #{{$customer_program->id}}</h1>
        <form action="{{ route('customer_programs.destroy', $customer_program->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('customer_programs.edit', $customer_program->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="customer_id">CUSTOMER_ID</label>
                     <p class="form-control-static">{{$customer_program->customer_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="program_id">PROGRAM_ID</label>
                     <p class="form-control-static">{{$customer_program->program_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="goals">GOALS</label>
                     <p class="form-control-static">{{$customer_program->goals}}</p>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <p class="form-control-static">{{$customer_program->status}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('customer_programs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection