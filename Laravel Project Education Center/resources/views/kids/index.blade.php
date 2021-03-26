@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Kids
            <a class="btn btn-success pull-right" href="{{ route('kids.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($kids->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                        <th>SCHOOL_NAME</th>
                        <th>SCHOOL_TYPE</th>
                        <th>SCHOOL_ADDRESS</th>
                        <th>YEAR</th>
                        <th>LEVEL</th>
                        <th>MOBILE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($kids as $kid)
                            <tr>
                                <td>{{$kid->id}}</td>
                                <td>{{$kid->name}}</td>
                    <td>{{$kid->school_name}}</td>
                    <td>{{$kid->school_type}}</td>
                    <td>{{$kid->school_address}}</td>
                    <td>{{$kid->year}}</td>
                    <td>{{$kid->level}}</td>
                    <td>{{$kid->mobile}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('kids.show', $kid->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('kids.edit', $kid->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('kids.destroy', $kid->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $kids->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection