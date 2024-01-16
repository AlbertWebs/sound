
<footer class="footer bg-dark position-relative">
    <div class="footer-middle">
        <div class="container position-static">
            <div class="row">
                <div class="col-lg-2 col-sm-6 pb-2 pb-sm-0 d-flex align-items-center">
                    <div class="widget m-b-3">
                        <img src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Sound Wave Audio" width="202"
                            height="54" class="logo-footer">
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                    <div class="widget mb-2">
                        <h4 class="widget-title mb-1 pb-1">Get In Touch</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-info-label">Address:</span>{{$Settings->location}}
                            </li>
                            <li>
                                <span class="contact-info-label">Phone:</span><a href="tel:">Call Us {{$Settings->mobile}}</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Email:</span> <a
                                    href="mailto:{{$Settings->email}}">{{$Settings->email}}</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Working Days/Hours:</span>
                                Mon - Sat / 8:00 AM - 6:00 PM Sun 9:00 AM-1:00 PM
                            </li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                    <div class="widget">
                        <h4 class="widget-title pb-1">Quick Links</h4>

                        <ul class="links">
                            <li><a href="{{url('/')}}/dashboard">Orders History</a></li>
                            {{-- <li><a href="#">Advanced Search</a></li> --}}
                            <li><a href="{{url('/')}}/dashboard">Login</a></li>
                            <li><a href="{{url('/')}}/dashboard">Careers</a></li>
                            <li><a href="{{url('/')}}/find-us">About Us</a></li>
                            <li><a href="{{url('/')}}/find-us">Contact Us</a></li>
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
                    {{--  --}}
                    <div class="social-icons">
                        <a href="{{$Settings->facebook}}" class="social-icon social-facebook icon-facebook" target="_blank"
                            title="facebook"></a>
                        {{-- <a href="{{$Settings->twitter}}" class="social-icon social-twitter icon-twitter" target="_blank"
                            title="twitter"></a> --}}
                        <a href="{{$Settings->instagram}}" class="social-icon social-instagram icon-instagram mr-0" target="_blank"
                            title="instagram"></a>
                        {{-- <a href="{{$Settings->linkedin}}" class="social-icon social-linkedin fab fa-linkedin-in mr-0" target="_blank"
                            title="linkedin"></a> --}}
                        {{-- <a href="{{$Settings->youtube}}" class="social-icon social-youtube fab fa-youtube mr-0" target="_blank"
                            title="youtube"></a> --}}
                        <a target="new" href="https://goo.gl/maps/UimtpCyy1rMdrbXXA" class="social-icon social-youtube fa fa-map-marker mr-0" target="_blank"
                            title="youtube"></a>
                    </div><!-- End .social-icons -->
                    {{--  --}}
                </div><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom d-sm-flex align-items-center bg-dark">
            <div class="footer-left">
                <span class="footer-copyright">Copyright © <?php echo date('Y') ?> Sound Wave Audio - All Rights Reserved | Powered By Designekta Studios</span>
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
