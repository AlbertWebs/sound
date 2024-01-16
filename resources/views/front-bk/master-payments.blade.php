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
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/vendor/fontawesome-free/css/all.min.css')}}">
</head>

<body>

    <div id="google_translate_element"></div>
    <div class="page-wrapper">

        @include('front.notice')

        @include('front.header')

        @yield('content')

        @include('front.footer')
    </div><!-- End .page-wrapper -->



    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="{{url('/')}}">Home</a></li>

                    <li><a href="{{url('/')}}/shop-by-brand">Our Brands</a></li>

                    <li><a href="{{url('/')}}/shop-by-categories">Browse Categories</a></li>

                    <li><a href="{{url('/')}}/products">Products</a></li>

                    <li><a href="{{url('/')}}/our-portfolio">Installation</a></li>

                </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    {{-- <li class="border-0">
                        <a href="#">
                            Special Offer!
                        </a>
                    </li> --}}
                    <li class="border-0">
                        <a href="{{url('/')}}/special-offers" target="_blank" rel="noopener" title="Special Offers">
                            Special Offers
                            <span class="tip tip-hot">Hot</span>
                        </a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="{{url('/')}}/dashboard">My Account</a></li>
                    <li><a href="{{url('/find-us')}}">Contact Us</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" title="submit" type="submit"></button>
            </form>

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

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    {{-- Google Translate --}}

    {{--  --}}
    <?php $CartItems = Cart::content(); ?>
    @if($CartItems->isEmpty())

    @else
    @foreach($CartItems as $CartItem)
    <script>
       $( document ).ready(function() {
           $('.hide_{{$CartItem->rowId}}').hide();
          //update cart
               $.ajaxSetup({

                   headers: {

                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                   }

               });
               $("#updateQTY_{{$CartItem->rowId}}").submit(function(e){

                   e.preventDefault();

                   $('.hide_{{$CartItem->rowId}}').show();

                   var rowId = $("input[name=rowID_{{$CartItem->rowId}}]").val();

                   var qty = $("input[name=qty_{{$CartItem->rowId}}]").val();

                   $.ajax({

                       type:'POST',

                       url:"{{ route('update.cart') }}",

                       data:{rowId:rowId, qty:qty},

                       success:function(data){

                               $('.hide_{{$CartItem->rowId}}').hide(1000);

                       }

                   });

               });
       });
   </script>
   @endforeach
   @endif
    {{--  --}}

         <!-- Check Mail Exists -->
         <script type="text/javascript">
           function duplicateEmail(element){

               $('#mailChecking').html('Checking...........')
               var email = $(element).val();
               $.ajax({
                   type: "POST",
                   url: '{{url('checkemail')}}',
                   data: {
                           email:email,
                           "_token": "{{ csrf_token() }}",
                       },
                   dataType: "json",
                   success: function(res) {

                       if(res.exists){
                           // Exists
                           $('#mailChecking').hide();
                           $('#mailAvailable').hide();
                           $('#mailExists').html('The Email is already in use by another person')
                       }else{
                           // Available
                           $('#mailChecking').hide();
                           $('#mailExists').hide();

                       }
                   },
                   error: function (jqXHR, exception) {

                   }
               });
           }
         </script>
         <!-- </Check mail Exists -->
         {{--  --}}
         <script>
           $(function () {
                   $('#loading-image').hide();
                   $('#updateShippingForm').hide();
                   $('#verify').on('submit', function (e) {
                           $('#veryfyID').html('Checking......')
                           e.preventDefault();
                           $.ajax({
                           type: 'post',
                           url: '{{url('/')}}/payments/veryfy/mpesa',
                           data: $('#verify').serialize(),
                                   success: function ($results) {
                                       $('#CardNumber').val('')
                                       if($results == 1){
                                           // alert('Verification Was Successfull')
                                           $('#success-alert').html('The Purchase Was Successfull')
                                           $('#veryfyID').html('Successfull')
                                           //Submit The Order
                                           window.open('{{url('/')}}/shopping-cart/checkout/placeOrder','_self')
                                       }else{

                                           $('#veryfyID').html('Error Verifying Transaction. Wrong Transaction Code or Amount <i style="font-size:20px;color:red" class="fa fa-frown-o"></i>')
                                       }
                                   }
                           });

                   });

                   // STK Request Goes Here
                   $( document ).ready(function() {
                       $('.spinner').hide();
                       $('#saved').hide();
                   });
                   $("#stk-submit").submit(function(stay){
                    stay.preventDefault()
                    var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
                    $('.spinner').show();
                    $('.instructions').delay(2000).fadeIn();
                    $.ajax({
                       type: 'POST',
                       url: "{{url('/')}}/api/v1/stk/push",
                       data: formdata, // here $(this) refers to the ajax object not form
                       success: function (data) {
                           $('.spinner').hide();
                           $('.instructions').delay(4000).html('Success...');
                           $('.instructions').delay(1000).html('Redirecting....');
                           setTimeout(function() {
                               // Redirect
                               window.open('{{url('/')}}/shopping-cart/checkout/placeOrder','_self')
                           }, 5000);
                           },
                           timeout: 5000
                    });
                   });





           });
       </script>
         {{--  --}}
         <script>
             $('#updateSettings').on('submit', function (e) {
               $('.spinner').show();
                   e.preventDefault();
                       $.ajax({
                           type: 'post',
                           url: '{{url('/')}}/dashboard/update-settings',
                           data: $('#updateSettings').serialize(),
                               success: function ($results) {
                                   // alert('Verification Was Successfull')
                                   $('#success-alert').html('The Purchase Was Successfull')
                                   $('#veryfyID').html('Successfull')
                                   $('#saved').show();
                                   window.open('{{url('/')}}/shopping-cart/checkout/payment-last','_self')
                               }
                       });

               });

         </script>
         {{--  --}}

   @include('front.schema')
   @include('checkout.coupon')
</body>
@endforeach

</html>
