<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-5 navbar-light navbar-theme-primary"
style="position:absolute;">
    <div class="container container-navbar">

        <a class="navbar-brand @@logo_classes d-none d-sm-none d-md-block d-lg-block " href="{{ url('/') }}" style="margin-right: 0;" data-aos="fade-right" data-aos-delay="450" data-aos-duration="3000">
            <img class="navbar-brand-dark common" src="{{ asset('default') }}/logo_dark.png" height="35" alt="Logo" style="height: 70px;filter: drop-shadow(2px 11px 8px #ACC9F5);">
            <!-- <img class="navbar-brand-light common" src="{{ asset('default') }}/logo.png" height="35" alt="Logo" style="height: 135px; filter: drop-shadow(2px 11px 8px #ACC9F5);"> -->
        </a>

        <div class="navbar-collapse collapse" id="navbar_global" style="margin-top: -65px;">
            <div class="navbar-collapse-header">
                <div class="row mt-5">
                    <div class="col-6 collapse-brand d-none">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('default') }}/logo.png" height="35" alt="Logo">
                        </a>
                    </div>
                    <div class="col-6 collapse-close ml-auto p-2 navbar-light" style="margin-right: 0px;">
                        <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav navbar-nav-hover justify-content-center" style="filter: drop-shadow(2px 11px 8px #ACC9F5);" data-aos="fade-right" data-aos-delay="450" data-aos-duration="3000">

                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#aboutus" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.aboutus') }}</a>
                    <a data-scroll href="#aboutus" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.aboutus') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#principles" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.principles') }}</a>
                    <a data-scroll href="#principles" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.principles') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#services" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.services') }}</a>
                    <a data-scroll href="#services" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.services') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#products" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.products') }}</a>
                    <a data-scroll href="#products" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.products') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#reviews" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.reviews') }}</a>
                    <a data-scroll href="#reviews" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.reviews') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#whyus" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.whyus') }}</a>
                    <a data-scroll href="#whyus" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.whyus') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#contactus" class="nav-link d-none d-sm-none d-md-block d-lg-block">{{ __('qrlanding.contactus') }}</a>
                    <a data-scroll href="#contactus" class="nav-link d-block d-sm-block d-md-none d-lg-none">{{ __('qrlanding.contactus') }}</a>
                </li>
            </ul>
            <form id="langswitch" name="langswitch" style="display: none">
                <select onchange="this.form.submit()" class="form-control btn-outline language_selector_qr" id="lang" name="lang">
                    @foreach ($availableLanguages as $short => $lang)
                    <option @if($short==$locale) selected @endif value="{{ $short }}">{{ $lang }}</option>
                    @endforeach


                </select>
            </form>

        </div>
        <div class="ml-auto p-2" style="margin-right: 0px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
    </div>
    <style>

        @@media (max-width: 767px) {
          nav.headroom--not-bottom.headroom--pinned.headroom--top{
            position: absolute !important;
          }
        }
        /* // Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 768px) {
            .headroom--not-top .navbar-collapse {
                margin-top: -24px !important;
            }

            .headroom--not-top ul {
                background-image: none !important;
                padding-left: 0px !important;
                height: 70px !important;
                margin-top: 0px;
                border-bottom: solid 8px #101b2d;
            }

            .headroom--pinned.headroom--top {
                position: fixed !important;
                top: auto !important;
            }



            .navbar-main ul {
                background-image: url("{{ asset('default') }}/styltec.png");
                background-size: cover;
                background-repeat: no-repeat;
                padding-left: 165px;
                margin-top: 65px;
                height: 133px;
            }

            .navbar-main ul li:first-child {
                padding-left: 12px;
            }

            .headroom--not-top .navbar-nav {
                margin-top: 24px !important;
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: 0.2rem !important;
            }

            .container-navbar {
                padding-left: 0px !important;
                margin-left: 0px !important;
            }

        }
    </style>
</nav>
