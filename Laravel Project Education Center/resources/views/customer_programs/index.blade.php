@extends('layouts.admin')

@section('header')
      <h3>    <i class="glyphicon glyphicon-align-justify"></i> الطلاب الملتحقين بالبرنامج  </h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($customer_programs->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                        <th class="text-right">الطالب</th>
                        <th class="text-right">البرنامج</th>
                        <th class="text-right">الأهداف</th>
                        <th class="text-center">الحالة</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($customer_programs as $customer_program)
                            <tr>
                                <td><a href="{{ route('customers.show', $customer_program->customer->id) }}">{{$customer_program->customer->name}} </a></td>
                                <td>{{$customer_program->program->course->name}}</td>
                                <td>{{$customer_program->goals}}</td>
                                <td class="text-center">{{$customer_program->status}}</td>
                              <!--  <td class="text-right">
                                    <a class="btn  btn-primary" href="{{ route('customer_programs.show', $customer_program->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn  btn-warning" href="{{ route('customer_programs.edit', $customer_program->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('customer_programs.destroy', $customer_program->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn  btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                                -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $customer_programs->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection