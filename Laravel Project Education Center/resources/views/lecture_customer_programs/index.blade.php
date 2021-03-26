@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> LectureCustomerPrograms
            <a class="btn btn-success pull-right" href="{{ route('lecture_customer_programs.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($lecture_customer_programs->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>LEVEL_ID</th>
                        <th>CUSTOMER_PROGRAM_ID</th>
                        <th>ATTENDENCE</th>
                        <th>ASSIGNMENT</th>
                        <th>BEHAVIOR</th>
                        <th>ACTIVE</th>
                        <th>FEES</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lecture_customer_programs as $lecture_customer_program)
                            <tr>
                                <td>{{$lecture_customer_program->id}}</td>
                                <td>{{$lecture_customer_program->level_id}}</td>
                    <td>{{$lecture_customer_program->customer_program_id}}</td>
                    <td>{{$lecture_customer_program->attendence}}</td>
                    <td>{{$lecture_customer_program->assignment}}</td>
                    <td>{{$lecture_customer_program->behavior}}</td>
                    <td>{{$lecture_customer_program->active}}</td>
                    <td>{{$lecture_customer_program->fees}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('lecture_customer_programs.show', $lecture_customer_program->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('lecture_customer_programs.edit', $lecture_customer_program->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('lecture_customer_programs.destroy', $lecture_customer_program->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $lecture_customer_programs->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection