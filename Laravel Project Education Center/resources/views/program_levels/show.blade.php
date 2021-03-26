@extends('layout')
@section('header')
<div class="page-header">
        <h1>ProgramLevels / Show #{{$program_level->id}}</h1>
        <form action="{{ route('program_levels.destroy', $program_level->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('program_levels.edit', $program_level->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="start_date">START_DATE</label>
                     <p class="form-control-static">{{$program_level->start_date}}</p>
                </div>
                    <div class="form-group">
                     <label for="end_date">END_DATE</label>
                     <p class="form-control-static">{{$program_level->end_date}}</p>
                </div>
                    <div class="form-group">
                     <label for="program_id">PROGRAM_ID</label>
                     <p class="form-control-static">{{$program_level->program_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="level_id">LEVEL_ID</label>
                     <p class="form-control-static">{{$program_level->level_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('program_levels.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection