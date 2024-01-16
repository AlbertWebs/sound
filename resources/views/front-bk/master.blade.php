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
    {{-- @include('front.tawk') --}}
    @include('front.google')
    @include('front.favicon')
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
    <link rel="stylesheet" href="{{asset('theme/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/css/demo42.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('theme/assets/css/demo14.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/vendor/fontawesome-free/css/all.min.css')}}">
    {{--  --}}
    <!--Floating WhatsApp css-->
    <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/5d392d6beb82e88615a2eeb3c/1d603c00fa71af0f58347ff94.js");</script>
    {{--  --}}
    <meta name="google-site-verification" content="mDAs3TqrS5UGRdcD2dWjDaqPkulwh6oJMIP_I-fEi3U" />
</head>

<body>
    <!--Div where the WhatsApp will be rendered-->
    <div style="z-index:100000" id="WAButton"></div>

    <div id="google_translate_element"></div>
    <div class="page-wrapper">

        {{-- @include('front.notice') --}}

        @include('front.header')

        @yield('content')

        @include('front.footer')


    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">


                    <li><a href="{{url('/')}}/shop-by-brand">Our Brands</a></li>

                    <li><a href="{{url('/')}}/shop-by-categories">Browse Categories</a></li>

                    <li><a href="{{url('/')}}/products">Products</a></li>

                    <li><a href="{{url('/')}}/our-portfolio">Installation</a></li>

                    <li><a href="{{url('/')}}/knowledge-base">Knowledge Base</a></li>

                </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    {{-- <li class="border-0">
                        <a href="#">
                            Special Offer!
                        </a>
                    </li> --}}
                    {{-- <li class="border-0">
                        <a href="{{url('/')}}/special-offers" target="_blank" rel="noopener" title="Special Offers">
                            Special Offers
                            <span class="tip tip-hot">Hot</span>
                        </a>
                    </li> --}}
                </ul>

                <ul class="mobile-menu">
                    <li><a href="{{url('/')}}/dashboard">My Account</a></li>
                    <li><a href="{{url('/find-us')}}">Contact Us</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            {{-- <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" title="submit" type="submit"></button>
            </form> --}}

            <div class="social-icons">
                <a href="{{$Settings->facebook}}" class="social-icon social-facebook icon-facebook" target="_blank" title="facebook">
                </a>
                <a href="{{$Settings->twitter}}" class="social-icon social-twitter icon-twitter" target="_blank" title="twitter">
                </a>
                <a href="{{$Settings->instagram}}" class="social-icon social-instagram icon-instagram" target="_blank" title="instagram">
                </a>
                <a href="{{$Settings->linkedin}}" class="social-icon social-linkedin fas fa-linkedin-in" target="_blank" title="linkedin">
                </a>
            </div>
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

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

    {{--  --}}
    <!--Floating WhatsApp javascript-->
    <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#WAButton').floatingWhatsApp({
                phone: '+254790721397', //WhatsApp Business phone number +254790721397
                headerTitle: 'Chat with us on WhatsApp!', //Popup Title
                popupMessage: 'Welcome to {{url()->current()}}, How can we serve you today?', //Popup Message
                message: 'I have just visited *{{url()->current()}}*',
                showPopup: true, //Enables popup display
                buttonImage: '<img src="{{url('/')}}/uploads/icon/whatsapp.svg" />', //Button Image
                // headerColor: 'Jungle Green', //Custom header color
                // backgroundColor: 'Jungle Green', //Custom background button color
                position: "left" //Position: left | right

            });
        });
    </script>
    {{--  --}}


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
        })

    </script>

     <!-- Live Search Scripts -->
     <script type="text/javascript">
        $(document).ready(function(){
            $('.loading-image').hide();
        });
        $('#search').on('keyup',function(){
            // Add preloader
            $('.loading-image').show();
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url : '{{url('/')}}/search',
            data:{'search':$value},
            success:function(data){
            $('.loading-image').hide();
            $('tbody').html(data);
            }
            });
        })
    </script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    {{-- Google Translate --}}
    {{-- Schema --}}
    <script type='application/ld+json'>
        {
          "@context": "http://www.schema.org",
          "@type": "ProfessionalService",
          "name": "Sound Wave Audio",
          "url": "https://soundwaveaudio.co.ke/",
          "logo": "https://soundwaveaudio.co.ke/uploads/logo/Crystal-Logo-06.png",
          "sameAs": [
            "https://www.facebook.com/Crystalclearbeats",
            "https://www.instagram.com/crys_talcaraudio/",
            "https://www.linkedin.com/company/crystal-car-audio/"
          ],
          "priceRange": "$$$$",
          "image": "https://soundwaveaudio.co.ke/uploads/logo/Crystal-Logo-06.png",
          "description": "Sound Wave Audio - Clear Beats.  We are experts in car music system Installation. car radio, speakers, subwoofers, Boosters etc. We sell and install car entertainment products, Alarms and Trackers.",
          "address": {
             "@type": "PostalAddress",
             "streetAddress": " Munyu Road , Sheikh Karume Junction Pramukh Plaza 2nd Floor Shop 22",
             "addressLocality": "Nairobi",
             "addressRegion": "Kenya",
             "postalCode": "00100",
             "addressCountry": "Kenya"
          },
           "openingHours": "Mo 01:00-01:00 Tu 01:00-01:00 We 01:00-01:00 Th 01:00-01:00 Fr 01:00-01:00 Sa 01:00-01:00 Su 01:00-01:00",
           "telephone": "+254790721397"
        }
    </script>
    {{--  --}}
</body>
@endforeach

</html>
