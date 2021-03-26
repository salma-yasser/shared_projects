
@extends('layouts.customer-admin')

@section('content')
  
            <!-- START @PAGE CONTENT -->
            <section id="page-content">


        <!-- Start body content -->
                <div class="body-content animated fadeIn">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START @ERROR PAGE -->
                            <div class="error-wrapper">
                                <h1>404!</h1>
                                <h3>The page you are looking for has not been found!</h3>
                                <h4>The page you are looking for might have been removed, or unavailable. <br> <br/> Maybe you could try a search:</h4>
                                <form action="#" class="form-horizontal">
                                    <div class="form-group has-feedback no-padding">
                                        <input type="text" class="form-control typeahead" placeholder="Search for page ">
                                        <button type="submit" class="btn btn-theme fa fa-search form-control-feedback"></button>
                                    </div>
                                </form>
                            </div>
                            <!--/ END @ERROR PAGE -->

                        </div>
                    </div><!-- /.row -->

                </div><!-- /.body-content -->

                
@endsection
