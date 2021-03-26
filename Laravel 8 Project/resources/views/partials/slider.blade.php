<!-- SLIDER -->
<section>
    <div class="container-fluid px-0 blue-gradient color-block">

        <div class="row justify-content-between align-items-center">

            <div class="col-12 col-md-12">
              @include('partials.nav')
                <div id="homeSliderId" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="false">
                    <ol class="carousel-indicators">
                        <li data-target="#homeSliderId" data-slide-to="0" class="active"></li>
                        <li data-target="#homeSliderId" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <img class="d-flex align-items-center justify-content-center min-vh-100" src="{{ asset('impactfront') }}/img/slider3.png">
                            <div class="carousel-caption d-sm-block d-md-none d-lg-none" style="top: 38%;transform: translateY(-50%);">
                                <img class="d-lg-none d-md-none" src="{{ asset('default') }}/logo.png" height="35" alt="Logo" style="height: 135px;    filter: drop-shadow(2px 11px 8px #ACC9F5);">
                                <br />
                                <h1 class="text-indigo">{{ __('qrlanding.ourvision_title') }}</h1>
                                <br />
                                <p class="lead text-left">{{ __('qrlanding.vision_description')}}</p>
                            </div>
                            <div class="carousel-caption d-none d-sm-none d-md-block d-lg-block" style="top: 43%;transform: translateY(-50%);">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-md-6 order-1 order-lg-1">
                                        <h1 class="text-indigo">{{ __('qrlanding.ourvision_title') }}</h1>
                                        <br />
                                        <p class="lead text-left">{{ __('qrlanding.vision_description')}}</p>
                                    </div>
                                    <div class="col-12 col-md-5 order-2 order-lg-2">
                                        <img src="{{ asset('impactfront') }}/img/flayer_2.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-flex align-items-center justify-content-center min-vh-100" src="{{ asset('impactfront') }}/img/slider3.png">
                            <div class="carousel-caption d-sm-block d-md-none d-lg-none" style="top: 38%;transform: translateY(-50%);">
                                <img class="d-lg-none d-md-none" src="{{ asset('default') }}/logo.png" height="35" alt="Logo" style="height: 135px;    filter: drop-shadow(2px 11px 8px #ACC9F5);">
                                <br />
                                <h1 class="text-indigo">{{ __('qrlanding.whyqr_title') }}</h1>
                                <br />
                                <p class="lead text-left">{!! __('qrlanding.whyqr_details')!!}</p>
                            </div>
                            <div class="carousel-caption d-none d-sm-none d-md-block d-lg-block" style="top: 43%;transform: translateY(-50%);">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-md-6 order-1 order-lg-1">
                                        <h1 class="text-indigo">{{ __('qrlanding.whyqr_title') }}</h1>
                                        <br />
                                        <p class="lead text-left">{!! __('qrlanding.whyqr_details')!!}</p>
                                    </div>
                                    <div class="col-12 col-md-5 order-2 order-lg-2">
                                        <img src="{{ asset('impactfront') }}/img/flayer_1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
