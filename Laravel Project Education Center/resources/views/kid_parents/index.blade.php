@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> KidParents
            <a class="btn btn-success pull-right" href="{{ route('kid_parents.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($kid_parents->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 2%;">#</th>
                            <th>PARENT_ID</th>
                        <th>KID_ID</th>
                            <th class="text-center" style="width: 30%;">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($kid_parents as $kid_parent)
                            <tr>
                                <td>{{$kid_parent->id}}</td>
                                <td>{{$kid_parent->parent_id}}</td>
                    <td>{{$kid_parent->kid_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('kid_parents.show', $kid_parent->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('kid_parents.edit', $kid_parent->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('kid_parents.destroy', $kid_parent->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $kid_parents->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection