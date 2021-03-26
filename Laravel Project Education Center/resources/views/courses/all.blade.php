@extends('layouts.customer-admin')

@section('header')
            <i class="glyphicon glyphicon-align-justify"></i> Courses       
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            @if($courses->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                          
                            <th>#</th>
                            <th>إسم الكورس</th>
                            <th>نبذة عن الكورس</th>
                            <th>TYPE</th>
                            <th>أهداف الكورس</th>
                            <th>المرحلة العمرية </th>
                            <th>المدة الزمنية </th>
                            <th>المستويات</th>
                           
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                             
                                <td>{{$course->id}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->description}}</td>
                                <td>{{$course->type}}</td>
                                <td>{{$course->goals}}</td>
                                <td>{{$course->age}}</td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->levels}}</td>
                              
                                <td class="text-right">
                                  
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addAddress{{$course->id}}">Join</button>
                                </td>
                            </tr>

                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="addAddress{{$course->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-theme">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                                    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Join to {{$course->name}}</h4>
                                  </div>
                                  <div class="modal-body">
                                  
                                  <form action="{{ route('customer_programs.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div hidden class="form-group @if($errors->has('customer_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="customer_id-field">Customer_id</label>
                    <input  type="text" id="customer_id-field" name="customer_id" class="form-control txt-new" value="{{ Auth::user()->id }}"/>
                       @if($errors->has("customer_id"))
                        <span class="help-block">{{ $errors->first("customer_id") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('program_id')) has-error @endif">
                       <label class="col-sm-2 control-label" for="program_id-field">Program</label>
                    <input  type="text" id="program_id-field" name="program_id" class="form-control txt-new" value="{{ $course->id }}"/>
                  
                       @if($errors->has("program_id"))
                        <span class="help-block">{{ $errors->first("program_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('goals')) has-error @endif">
                       <label class="col-sm-2 control-label" for="goals-field">Goals</label>
                    <textarea class="form-control txt-new" id="goals-field" rows="4" name="goals">{{ old("goals") }}</textarea>
                       @if($errors->has("goals"))
                        <span class="help-block">{{ $errors->first("goals") }}</span>
                       @endif
                    </div>
                   

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                                    
                                  </div>

                          </form>

                                </div>
                              </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {!! $courses->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript">
    
    /* var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

function join(program_id) {
   // var user_id = $(this).closest('tr').attr('#');
    var user_id = '{{Auth::user()->id}}';
   // console.log(user_id)
    $.ajax({
            type:'POST',
            url:baseUrl+'/customer_programs',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "customer_id" : user_id , "program_id" :program_id },
            success: function(data){
              if(data.data.success){
                //do something
            //    console.log('done');
                alert(data.data.message)
              }
            }
        });
    };
    */
</script>
@endsection