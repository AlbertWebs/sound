<!DOCTYPE html>
<html lang="en">
<?php $SiteSettings = DB::table('sitesettings')->get() ?>
@foreach ($SiteSettings as $Settings)
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    {{-- SEO --}}
    {!! SEOMeta::generate() !!}
    <meta name="author" content="Designekta Studios">
    <meta property="og:description" content="Car Audio store in Nairobi, Vehicle Sounds Systems in Kenya, Vehicle Accessories in kenya, Car Sound Systems in Kenya, Car alarm Systems in Kenya">
    <meta property="og:image" content="{{url('/')}}/uploads/logo/{{$Settings->logo}}" />
    <meta property="fb:app_id" content="431980657174772" />
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@crystalcaraudio" />
    <meta name="_token" content="{{ csrf_token() }}">
    {{-- SEO --}}
    {{-- @include('front.favicon') --}}
    @include('front.facebook')
    @include('front.tawk')
    @include('front.google')

    <!-- Favicon -->

    <link rel="preload" href="{{asset('theme/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('theme/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('theme/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">

    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:400,600', 'Poppins:400,500,600,700' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('theme/assets/css/bootstrap.min.css')}}">
    <!-- Main CSS File -->
   <!-- Plugins CSS File -->
	<link rel="stylesheet" href="{{asset('theme/assets/css/bootstrap.min.css')}}">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="{{asset('theme/assets/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/css/demo42.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
</head>

<body>

    <div id="google_translate_element"></div>
    <div class="page-wrapper">

        @include('front.notice')

        @include('front.header')

        @yield('content')

        <footer class="footer bg-dark position-relative">
            <div class="footer-middle">
                <div class="container position-static">
                    <div class="row">
                        <div class="col-lg-2 col-sm-6 pb-2 pb-sm-0 d-flex align-items-center">
                            <div class="widget m-b-3">
                                <img src="{{asset('theme/assets/images/demoes/demo42/footer-logo.png')}}" alt="Crystal Car Audio" width="202"
                                    height="54" class="logo-footer">
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                            <div class="widget mb-2">
                                <h4 class="widget-title mb-1 pb-1">Get In Touch</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Address:</span>123 Street Name, City, England
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span><a href="tel:">Toll Free (123)
                                            456-7890</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a
                                            href="mailto:mail@example.com">mail@example.com</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span>
                                        Mon - Sun / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                        title="Linkedin"></a>
                                    <a href="#" class="social-icon social-instagram fab fa-instagram" target="_blank"
                                        title="instagram"></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title pb-1">Customer Services</h4>

                                <ul class="links">
                                    <li><a href="#">Help &amp; FAQs</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Shipping &amp; Delivery</a></li>
                                    <li><a href="#">Orders History</a></li>
                                    <li><a href="#">Advanced Search</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="demo1-about.html">About Us</a></li>
                                    <li><a href="#">Corporate Sales</a></li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-4 col-sm-6 pb-0">
                            <div class="widget widget-newsletter mb-1 mb-sm-3">
                                <h4 class="widget-title">Subscribe Newsletter</h4>

                                <p class="mb-2">Get all the latest information on events, sales and offers.
                                    Sign up for newsletter:</p>
                                <form action="#" class="d-flex mb-0 w-100">
                                    <input type="email" class="form-control mb-0" placeholder="Email address"
                                        required="">

                                    <input type="submit" class="btn shadow-none" value="OK">
                                </form>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom d-sm-flex align-items-center bg-dark">
                    <div class="footer-left">
                        <span class="footer-copyright">Crystal Car Audio. Copyright © <?php echo date('Y') ?>. All Rights Reserved</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <div class="payment-icons">
                            <span class="payment-icon visa"
                                style="background-image: url({{asset('theme/assets/images/payments/payment-visa.svg')}})"></span>
                            <span class="payment-icon paypal"
                                style="background-image: url({{asset('theme/assets/images/payments/payment-paypal.svg')}})"></span>
                            <span class="payment-icon stripe"
                                style="background-image: url({{asset('theme/assets/images/payments/payment-stripe.png')}})"></span>
                            <span class="payment-icon verisign"
                                style="background-image:  url({{asset('theme/assets/images/payments/payment-verisign.svg')}})"></span>
                        </div>
                    </div>
                </div>
            </div><!-- End .footer-bottom -->
        </footer>
    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->



    @include('front.mobile')

    <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form"
        style="background: #f1f1f1 no-repeat center/cover url({{asset('theme/assets/images/newsletter_popup_bg.jpg')}})">
        <div class="newsletter-popup-content">
            <img src="{{asset('theme/assets/images/logo-black.png')}}" alt="Logo" class="logo-newsletter" width="111" height="44">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new
                arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email"
                        placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->

        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div><!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{asset('theme/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/optional/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/jquery.plugin.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{asset('theme/assets/js/main.min.js')}}"></script>

    {{-- Translator --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#lang").click(
            //
            function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    {pageLanguage: 'en'},
                    'google_translate_element'
                );

            //
            });
            //


        })

    </script>

    <script>

    </script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    {{-- Google Translate --}}
</body>
@endforeach

</html>
