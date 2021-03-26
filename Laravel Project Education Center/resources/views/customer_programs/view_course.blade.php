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
                                    @if($menus)
                                    <?php  $i=0; ?>
                                      @foreach($menus as $menu)
                                      @if($i == 0)
                                        <li class="active nav-border nav-border-top-{{$menu->class_name}}">
                                        @else
                                        <li class=" nav-border nav-border-top-{{$menu->class_name}}">

                                        @endif
                                            <a href="#tab_{{$menu->id}}" data-toggle="tab" class="text-center">
                                                {{$menu->name}}
                                            </a>
                                        </li>

                                    <?php  $i++; ?>

                                        
                                       @endforeach
                                       @endif
                                    </ul>
                                </div><!-- /.panel-heading -->
                                <!--/ End tabs heading -->

                                <!-- Start tabs content -->
                                <div class="panel-body">
                                    <div class="tab-content">
                                    @if($menus)
                                      @foreach($menus as $menu)
                                        <div class="tab-pane fade in active" id="tab_{{$menu->id}}">
                                        @include($menu->view)
                                          
                                        </div>
                                       @endforeach
                                       @endif

                                    </div>
                                </div><!-- /.panel-body -->
                                <!--/ End tabs content -->
                            </div><!-- /.panel -->
                            <!--/ End color horizontal tabs -->

                        </div>
                    </div>

@endsection