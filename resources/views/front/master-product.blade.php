<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   @foreach($Products as $Product)
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="icon" type="image/x-icon" href="{{asset('uploads/favicon.png')}}">
        @foreach($Products as $Product)
        <?php $SiteSettings = DB::table('sitesettings')->get() ?>
        @foreach ($SiteSettings as $Settings)
                {{-- SEO --}}
            <?php $Category = DB::table('category')->where('id',$Product->cat)->get(); ?>
            @foreach ($Category as $category)
            <meta name="author" content="Designekta Studios">
            <meta name="robots" content="index,follow">
            <meta name="googlebot" content="index,follow"><!-- Google Specific -->
            <meta name="subject" content="{!!html_entity_decode($Product->name)!!} - Sound Wave Audio - {{$category->cat}} In Nairobi">
            <meta name="rating" content="General">
            <meta name="referrer" content="no-referrer">
            <meta name="theme-color" content="#1c2c52">

            <title>{!!html_entity_decode($Product->name)!!} - Sound Wave Audio - {{$category->cat}} In Nairobi</title>
            <meta name="description" content="Order this {!!html_entity_decode($Product->name)!!} From Sound Wave Audio - The Best Vehicle Audio Solutions in Kenya From as Low as {{$Product->price}}">
            <link rel="canonical" href="https://soundwaveaudio.co.ke"/>
            <meta property="og:description" content="Order this {!!html_entity_decode($Product->name)!!} From Sound Wave Audio - The Best Vehicle Audio Solutions in Kenya From as Low as {{$Product->price}}" />
            <meta property="og:title" content="{!!html_entity_decode($Product->name)!!} - Sound Wave Audio - {{$category->cat}} In Nairobi" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="https://soundwaveaudio.co.ke" />

            <meta property="og:image" content="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}" />
            <meta property="og:site_name" content="Sound Wave Audio">
            <meta property="og:locale" content="en_US">
            <meta name="twitter:title" content="{!!html_entity_decode($Product->name)!!} - Sound Wave Audio - {{$category->cat}} In Nairobi" />
            <meta name="twitter:site" content="@SoundwaveAudio" />
            <meta name="twitter:card" content="summary">
            <meta name="twitter:site" content="@SoundwaveAudio">
            <meta name="twitter:url" content="https://soundwaveaudio.co.ke">
            <meta name="twitter:description" content="Order this {!!html_entity_decode($Product->name)!!} From Sound Wave Audio - The Best Vehicle Audio Solutions in Kenya From as Low as {{$Product->price}}">
            <meta name="twitter:image" content="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}">

            @endforeach

            {{-- SEO --}}
            {{-- @include('front.favicon') --}}
            {{-- @include('front.facebook') --}}
            {{-- @include('front.tawk') --}}
            {{-- @include('front.google') --}}
        @endforeach




        <link rel="preload" href="{{asset('theme/fonts/riode115b.ttf?5gap68')}}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{asset('theme/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{asset('theme/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">
        <script>
            WebFontConfig = {
                google: { families: ['Poppins:400,500,600,700,800'] }
            };
            (function (d) {
                var wf = d.createElement('script'), s = d.scripts[0];
                wf.src = "{{asset('theme/js/webfont.js')}}";
                wf.async = true;
                s.parentNode.insertBefore(wf, s);
            })(document);
        </script>
        <link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/animate/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/magnific-popup/magnific-popup.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/sticky-icon/stickyicon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('theme/css/demo29.min.css')}}">
    </head>
    @endforeach
    <body>
        <div class="page-wrapper">
            <h1 class="d-none"> {!!html_entity_decode($Product->name)!!}</h1>
            <header class="header">
                @include('front.header-middle')
            </header>

                @yield('content')

            <footer class="footer">
                <div class="container">
                <div class="footer-top">
                    <div class="owl-carousel owl-theme owl-middle row cols-xl-4 cols-md-3 cols-sm-2 cols-2" data-owl-options="{
                        'items': 3,
                        'margin': 0,
                        'dots': false,
                        'autoplay': true,
                        'responsive': {
                        '0': {
                        'items': 1
                        },
                        '576': {
                        'items': 1
                        },
                        '768': {
                        'items': 2
                        },
                        '992': {
                        'items': 3
                        }
                        }
                        }">
                        <div class="icon-box icon-box-side slide-icon-box justify-content-center">
                            <i class="icon-box-icon d-icon-truck" style="font-size: 46px;">
                            </i>
                            <div class="icon-box-content">
                            <h4 class="icon-box-title">Free shipping &amp; Return</h4>
                            <p>Free shipping on orders over $99</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side slide-icon-box justify-content-center">
                            <i class="icon-box-icon d-icon-service">
                            </i>
                            <div class="icon-box-content">
                            <h4 class="icon-box-title">Customer Support 24/7</h4>
                            <p>Instant access to perfect support</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side slide-icon-box justify-content-center">
                            <i class="icon-box-icon d-icon-secure">
                            </i>
                            <div class="icon-box-content">
                            <h4 class="icon-box-title">100% Secure Payment</h4>
                            <p>We ensure secure payment!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container p-0">
                        <div class="footer-left">
                            <figure class="payment">
                            {{-- <img src="{{asset('theme/images/payment.png')}}" alt="payment" width="159" height="29" /> --}}
                            <img src="{{url('/')}}/uploads/white-logo.png" alt="logo-footer" width="159" height="29" />
                            </figure>
                        </div>
                        <div class="footer-center">
                            <p class="copyright">Copyright &copy; Sound Wave Audio  {{date('Y')}} All Rights Reserved | Powered By Designekta Studios</p>
                        </div>
                        <div class="footer-right">
                            <div class="social-links">
                            <a href="#" title="social-link" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" title="social-link" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" title="social-link" class="social-link social-linkedin fab fa-linkedin-in mr-0"></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </footer>
        </div>
        @include('front.mobile-menu')
        <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>
        <div class="mobile-menu-wrapper">
            <div class="mobile-menu-overlay"></div>
            <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
            <div class="mobile-menu-container scrollable">
                <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
                </button>
                </form>
                @include('front.side-menu')
            </div>
        </div>
        <div class="newsletter-popup newsletter-pop1 mfp-hide" id="newsletter-popup" style="background-image: url('{{asset('theme/images/newsletter-popup.jpg')}}')">
            <div class="newsletter-content">
                <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4>
                <h2 class="font-weight-semi-bold">Sign up to <span>RIODE</span></h2>
                <p class="text-grey">Subscribe to the Riode eCommerce newsletter to receive timely updates from your
                favorite
                products.
                </p>
                <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email" name="email" id="email2" placeholder="Email address here..." required>
                <button class="btn btn-dark" type="submit">SUBMIT</button>
                </form>
                <div class="form-checkbox justify-content-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup" required />
                <label for="hide-newsletter-popup">Don't show this popup again</label>
                </div>
            </div>
        </div>

        {{--  --}}
        <script src="{{asset('theme/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('theme/vendor/sticky/sticky.min.js')}}"></script>
        <script src="{{asset('theme/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('theme/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('theme/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('theme/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
        <script src="{{asset('theme/vendor/photoswipe/photoswipe.min.js')}}"></script>
        <script src="{{asset('theme/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
        {{--  --}}
        <script src="{{asset('theme/js/main.min.js')}}"></script>
    </body>
   @endforeach
</html>
