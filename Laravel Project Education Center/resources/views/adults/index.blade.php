@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Adults
            <a class="btn btn-success pull-right" href="{{ route('adults.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($adults->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ADDRESS</th>
                        <th>MOBILE1</th>
                        <th>MOBILE2</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>JOB_STATUS</th>
                        <th>WORK</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($adults as $adult)
                            <tr>
                                <td>{{$adult->id}}</td>
                                <td>{{$adult->address}}</td>
                    <td>{{$adult->mobile1}}</td>
                    <td>{{$adult->mobile2}}</td>
                    <td>{{$adult->phone}}</td>
                    <td>{{$adult->email}}</td>
                    <td>{{$adult->job_status}}</td>
                    <td>{{$adult->work}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('adults.show', $adult->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('adults.edit', $adult->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('adults.destroy', $adult->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $adults->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection