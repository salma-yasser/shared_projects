<!-- CONTACT US -->
<section id="contactus" class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 col-lg-4 mb-1 mb-lg-2">
                <h1 class="h1 font-weight-bolder mb-2" data-aos="flip-left" data-aos-duration="3000">{{__('qrlanding.contactus')}}</h1>
                <p class="lead" data-aos="flip-right" data-aos-delay="150" data-aos-duration="3000">{{ __('qrlanding.contactus_title')}}</p>
                <ul class="list-group d-flex justify-content-center">
                    <li class="list-group-item d-flex pl-0 pb-0 pt-1" data-aos="zoom-in-up" data-aos-delay="450" data-aos-duration="3000">
                        <a href="mailto:info@styltec.net" style="padding-left:2px;" target="_blank" class="fas fa-envelope-square fa-2x"></a>
                        <a href="mailto:info@styltec.net" target="_blank" class="fa fa-stack fa-1x ml-2 text-black">info@styltec.net</a>

                    </li>

                    <li class="list-group-item d-flex pl-0 pb-0 pt-1" data-aos="zoom-in-up" data-aos-delay="600" data-aos-duration="3000">
                        <a href="https://goo.gl/maps/uGQ3LBbwMCP9isRW7" target="_blank" class="fa-stack fa-1x">
                            <i style="width: 100%" class="fas fa-square fa-stack-2x"></i>
                            <i style="width: 100%" class="fas fa-map-marker fa-stack-1x fa-inverse"></i>
                        </a>
                        <a style="width: 80%" href="https://goo.gl/maps/uGQ3LBbwMCP9isRW7" target="_blank" class="fa fa-stack fa-1x ml-2 text-black">Dubai Silicon Oasis</a>
                    </li>

                    <li class="list-group-item d-flex pl-0 pb-0 pt-1" data-aos="zoom-in-up" data-aos-delay="450" data-aos-duration="3000">
                        <a style="padding-left:2px;" class="fas fa-phone-square-alt fa-2x" href="tel:+97144565594"></a>
                        <a class="fa fa-1x ml-2 text-black mt-2" href="tel:+0097144565594">+97144565594</a>
                    </li>

                    <li class="list-group-item d-flex pl-0 pb-0 pt-1" data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="3000">
                        <a href="tel:+971504575859" target="_blank" class="fa-stack fa-1x">
                            <i style="width: 100%" class="fas fa-square fa-stack-2x"></i>
                            <i style="width: 100%" class="fas fa-mobile fa-stack-1x fa-inverse"></i>
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item pb-0 pt-0 pr-0 pl-0">
                                <a class="fa fa-stack fa-1x ml-2 text-black" href="tel:+971504575859">+971504575859</a>
                            </li>
                            <li class="list-group-item pb-0 pt-0 pr-0 pl-0">
                                <a class="fa fa-1x ml-2 text-black" href="tel:+00971556515453">+971556515453</a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-8 mb-2 mt-5">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @guest()
                <form id="contactform" method="post" action="{{ route('newcontact.store') }}" class="d-flex flex-column mb-2 mb-lg-2">
                    @csrf
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} my-1">
                        <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.contactus_input_name')}}*" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6 my-2">
                            <input type="email" name="email" id="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.contactus_input_email')}}*" value="{{ old('email') }}"
                              required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }} col-md-6 my-2 ">
                            <input type="text" name="phone" id="phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.contactus_input_phone')}}*" value="{{ old('phone') }}"
                              required>
                            @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-danger' : '' }} my-2">
                        <textarea name="message" id="message" class="form-control form-control-alternative{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.contactus_input_message')}}*"
                          required>{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button id="btnSubmit" class="btn btn-primary" type="submit">{{ __('qrlanding.submit')}}</button>
                </form>
                @endguest
                <div class="row justify-content-center">
                    <ul style="list-style: none; padding: 0">
                        <a href="https://api.whatsapp.com/send?phone=971556515453&text=&source=&data=" class="float" target="_blank">
                            <i class="fa fa-whatsapp my-float"></i>
                        </a>

                        <li class="contactus-li" data-aos="zoom-in-down" data-aos-delay="600" data-aos-duration="3000">
                            <a href="https://www.facebook.com/Styltec-LLC-107874281101193/" target="_blank" style="margin: 0 2px 0 0;"><i class="fab fa-facebook fa-1x facebook-icon"></i></a>
                        </li>

                        <li class="contactus-li" data-aos="zoom-in-down" data-aos-delay="750" data-aos-duration="3000">
                            <a href="https://instagram.com/styltec.llc?igshid=x2ayp8v58ih8" target="_blank" style="margin: 0 2px 0 0;"><i class="fab fa-instagram fa-1x instgram-icon"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="modal " id="blockAppliactionDialog" tabindex="-1" role="status" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="container pt-4 px-5">
                    <img src="{{ asset('default') }}/contactus-loading3.gif" />
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ajaxStop($.unblockUI);
        $(document).ready(function() {
            $("#btnSubmit").click(function(e) {
                // e.preventDefault();
                $.blockUI({
                    message: $('#blockAppliactionDialog')
                });
            })
        })
    </script>
</section>
