
<footer class="footer font2">
    <div class="footer-top">
        <div class="instagram-box bg-dark">
            <div class="row m-0 align-items-center">
                @isset($data['instagram_feed'])
                <div class="instagram-follow col-md-4 col-lg-3 d-flex align-items-center">
                    <div class="info-box">
                        <i class="fab fa-instagram text-white mr-4"></i>
                        <div class="info-box-content">
                            <h4 class="text-white line-height-1">Follow Us on Instagram</h4>
                            <p class="line-height-1">@crystalcaraudo</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9 p-0">
                    <div class="instagram-carousel owl-carousel owl-theme" data-owl-options="{
                            'items': 2,
                            'loop': 'true',
                            'slideTransition': 'linear',
                            'autoplaySpeed': '6000',
                            'smartSpeed': '6000',
                            'autoplayTimeout':'1000',
                            'autoplayHoverPause':'true',
                            'dots': false,
                            'autoplay': true,
                            'responsive': {
                                '480': {
                                    'items': 3
                                },
                                '950': {
                                    'items': 4
                                },
                                '1200': {
                                    'items' : 5
                                },
                                '1500': {
                                    'items': 6
                                }
                            }
                        }">
                        @foreach($data['instagram_feed'] as $item)
                        <img src="{{$item['url']}}" alt="Amani Vehicle Sounds"
                            width="240" height="240">
                        @endforeach
                        <img src="{{asset('theme/assets/images/demoes/demo27/instagram/instagram2.jpg')}}" alt="instagram"
                            width="240" height="240">
                        <img src="{{asset('theme/assets/images/demoes/demo27/instagram/instagram3.jpg')}}" alt="instagram"
                            width="240" height="240">
                        <img src="{{asset('theme/assets/images/demoes/demo27/instagram/instagram4.jpg')}}" alt="instagram"
                            width="240" height="240">
                        <img src="{{asset('theme/assets/images/demoes/demo27/instagram/instagram5.jpg')}}" alt="instagram"
                            width="240" height="240">
                        <img src="{{asset('theme/assets/images/demoes/demo27/instagram/instagram6.jpg')}}" alt="instagram"
                            width="240" height="240">
                    </div>
                </div>
                @endisset

            </div>
        </div>
        <div class="container">
            <div class="widget-newsletter d-lg-flex align-items-center flex-wrap">
                <div class="footer-left d-md-flex flex-wrap align-items-center mr-5">
                    <div class="info-box w-auto mr-5 my-3">
                        <i class="far fa-envelope text-white mr-4"></i>
                        <div class="widget-newsletter-info">
                            <h4 class="line-height-1 text-white">
                                Get Special Offers and Savings
                            </h4>
                            <p class="line-height-1">Get all the latest information on Events,
                                Sales
                                and Offers.</p>
                        </div>
                    </div>
                    <form action="#" class="my-3">
                        <div class="footer-submit-wrapper d-flex">
                            <input type="email" class="form-control font-italic"
                                placeholder="Enter Your E-mail Address..." size="40" required>
                            <button type="submit" class="btn btn-sm">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="footer-right text-lg-right">
                    <div class="social-icons my-3">
                        <a href="#" class="social-icon social-youtube fab fa-youtube" target="_blank"></a>
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                        {{-- <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a> --}}
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"></a>
                    </div><!-- End .social-icons -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-3">
                    <a href="demo27.html"><img src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Crystal Car Audio" class="logo"></a>

                    <p class="footer-desc">Your Number #1 Car Audio Supplier In Kenya</p>

                    <div class="ls-0 footer-question mb-3">
                        <h6 class="mb-0 text-white">QUESTIONS?</h6>
                        <h3 class="mb-0 text-primary">{{$Settings->mobile}}</h3>
                    </div>
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Quick Links</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <ul class="links">
                                    <li><a href="{{url('/')}}/">Home</a></li>
                                    <li><a href="{{url('/')}}/about-us">About Us</a></li>
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Shipping Guide</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="links">
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Product Support</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <ul class="links">
                                    <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="#">Our Guarantees</a></li>
                                    <li><a href="#">Terms And Conditions</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="links">
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3">
                    <div class="widget text-lg-right">
                        <h4 class="widget-title">Important Info</h4>

                        <ul class="links">
                            <li><a href="#">{{$Settings->location}}</a></li>
                            <li><a href="tel:{{$Settings->mobile}}">{{$Settings->mobile}}</a></li>
                            <li><a href="mailto:{{$Settings->email}}">{{$Settings->email}}</a></li>
                            <li><span class="contact-info-label">Working Days/Hours:</span>
                                Mon - Sat / 8:00 AM - 6:00 PM Sun 9:00 AM-1:00 PM
                            </li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div>
        <div class="footer-bottom">
            <p class="footer-copyright text-lg-center mb-0">Copyright © <?php echo date('Y') ?> Crystal Car Audio - All Rights Reserved | Powered By Designekta Studios
            </p>
        </div><!-- End .footer-bottom -->
    </div><!-- End .container -->
</footer><!-- End .footer -->

