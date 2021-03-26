@extends('layouts.customer-admin')

@section('header')
      <p class="lead">برامجي</p>
   
@endsection

@section('content')
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Start color horizontal tabs -->
                            <div class="panel panel-tab panel-tab-double shadow">
                                <!-- Start tabs heading -->
                                <div class="panel-heading no-padding">
                                    <ul class="nav nav-tabs">
                                        <li class="active nav-border nav-border-top-danger">
                                            <a href="#tab6-1" data-toggle="tab" class="text-center">
                                                الحالية
                                            </a>
                                        </li>
                                        <li class="nav-border nav-border-top-primary">
                                            <a href="#tab6-2" data-toggle="tab" class="text-center">
                                                القادمة
                                            </a>
                                        </li>
                                        <li class="nav-border nav-border-top-success">
                                            <a href="#tab6-3" data-toggle="tab" class="text-center">
                                                المنتهية
                                            </a>
                                        </li>
                                        <li class="nav-border nav-border-top-info">
                                            <a href="#tab6-4" data-toggle="tab" class="text-center">
                                                المفضلة
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div><!-- /.panel-heading -->
                                <!--/ End tabs heading -->

                                <!-- Start tabs content -->
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab6-1">
                                        @if(count($currently_programs) >0)
                                           
                                           @foreach($currently_programs as $program)

                                          <p><a href="{{URL::asset('view_course/'.$program->id)}}"> {{$program->course->name}}</a></p>
                                           

                                           @endforeach
                                           @endif
                                        </div>
                                        <div class="tab-pane fade" id="tab6-2">
                                            
                                            @if(count($next_programs) >0)
                                           
                                           @foreach($next_programs as $program)
<p><a href="{{URL::asset('view_course/'.$program->id)}}"> {{$program->course->name}}</a></p>
                                           

                                           @endforeach
                                           @endif
                                        </div>
                                        <div class="tab-pane fade" id="tab6-3">
                                            @if(count($done_programs) >0)
                                           
                                           @foreach($done_programs as $program)
                                           <p><a href="{{URL::asset('view_course/'.$program->id)}}"> {{$program->course->name}}</a></p>
                                           

                                           @endforeach
                                           @endif
                                        </div>
                                        <div class="tab-pane fade" id="tab6-4">
                                            @if(count($favorites) >0)
                                           
                                           @foreach($favorites as $program)

                                           <p><a href="{{URL::asset('view_course/'.$program->id)}}"> {{$program->name}}</a></p>
                                           

                                           @endforeach
                                           @endif
                                        </div>
                                       
                                    </div>
                                </div><!-- /.panel-body -->
                                <!--/ End tabs content -->
                            </div><!-- /.panel -->
                            <!--/ End color horizontal tabs -->

                        </div>
                    </div>

@endsection