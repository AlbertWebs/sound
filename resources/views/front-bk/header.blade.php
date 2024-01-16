<?php $SiteSettings = DB::table('sitesettings')->get() ?>
@foreach ($SiteSettings as $Settings)
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left d-none d-md-block">
                <div class="info-box info-box-icon-left text-primary justify-content-start p-0">
                    <i class="icon-shipping"></i>
                    @if (session()->has('rates'))
                    <a href="#">
                        <?php
                             $rates = Session::get('rates');
                             $Rates = DB::table('rates')->where('rates',$rates)->get();
                        ?>
                        @foreach ($Rates as $rt)
                        <div class="info-box-content">
                            <h4>FREE Next Day Delivery For Orders Above {{$rt->symbol}}<?php $total = 13500*$rt->rates; echo ceil($total) ?>+</h4>
                        </div><!-- End .info-box-content -->
                        @endforeach
                    </a>
                    @else
                    <div class="info-box-content">
                        <h4>FREE Next Day Delivery For Orders Above Ksh<?php $total = 13500; echo ceil($total) ?>+</h4>
                    </div><!-- End .info-box-content -->
                    @endif
                </div>
            </div><!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-md-auto w-md-100">
                <div class="header-dropdown ">

                    @if (session()->has('rates'))
                    <a href="#">
                        <?php
                             $rates = Session::get('rates');
                             $Rates = DB::table('rates')->where('rates',$rates)->get();
                        ?>
                        @foreach ($Rates as $rt)
                            {{$rt->currency}}
                        @endforeach
                    </a>
                    @else
                    <a href="{{url('/')}}/currency-swap/KES">KES</a>
                    @endif
                    <div class="header-menu">
                        <ul>
                            <li><a  href="{{url('/')}}/currency-swap/KES">KES</a></li>
                            <li><a href="{{url('/')}}/currency-swap/USD">USD</a></li>
                            <li><a href="{{url('/')}}/currency-swap/GBP">GBP</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <div class="header-dropdown mr-auto mr-md-0">
                    <a href="#"><i class="flag-us flag"></i>ENG</a>
                    <div class="header-menu">
                        <ul>
                            <li>
                                <a id="lang" href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                            </li>
                            {{-- <li><a href="#"><i class="flag-ke flag mr-2"></i>SWA</a></li> --}}
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <span class="separator d-none d-xl-block"></span>

                <ul class="top-links mega-menu d-none d-xl-flex mb-0 pr-2">
                    <li class="menu-items menu-item-type-post_type menu-item-object-page narrow">
                        <a href="{{url('/')}}/find-us/#map"><i class="icon-pin"></i>Our Stores</a>
                    </li>
                    <li class="menu-items menu-item-type-custom menu-item-object-custom narrow">
                        <a href="{{url('/')}}/dashboard"><i class="icon-shipping-truck"></i>Track Your Order</a>
                    </li>
                    <li class="menu-items menu-item-type-post_type menu-item-object-page narrow">
                        <a href="{{url('/')}}/find-us"><i class="icon-help-circle"></i>Help</a>
                    </li>
                    <li class="menu-items menu-item-type-post_type menu-item-object-page narrow">
                        <a href="{{url('/')}}/wishlist"><i class="icon-wishlist-2"></i>Wishlist</a>
                    </li>
                </ul>

                <span class="separator d-none d-md-block mr-0 ml-4"></span>

                <div class="social-icons">
                    <a href="{{$Settings->facebook}}" class="social-icon social-facebook icon-facebook" target="_blank"
                        title="facebook">
                    </a>
                    {{-- <a href="{{$Settings->twitter}}" class="social-icon social-twitter icon-twitter" target="_blank"
                        title="twitter"></a> --}}
                    <a href="{{$Settings->instagram}}" class="social-icon social-instagram icon-instagram mr-0" target="_blank"
                        title="instagram">
                    </a>
                    <a href="{{$Settings->linkedin}}" class="social-icon social-linkedin fab fa-linkedin-in mr-0" target="_blank"
                        title="linkedin">
                    </a>
                </div><!-- End .social-icons -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler text-dark mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{url('/')}}" class="logo">
                    <img src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" class="w-100" width="202" height="80"
                        alt="{{$Settings->sitename}}">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right w-lg-max">
                <div
                    class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mb-0">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="{{url('/search-results')}}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" autocomplete="off" name="keyword" id="search" placeholder="Search..."
                                required>

                            <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>

                            <!-- Livesearch Results -->
                    {{-- <div style="background-image: url('{{url('/')}}/uploads/preloaders/preloader.gif');" class="text-center" id="loading-image">Loading.....</div> --}}
                    <table class="table  table-hover livesearch" style="position:absolute; background-color:rgba(255,255,255,0.9); color:#000;  z-index: 1000; max-width: 638px;">
                        <thead>

                        </thead>
                        <tbody>
                        </tbody>
                        </table>
            <!-- Live seach Results -->
            {{--  --}}
                </div><!-- End .header-search -->

                <span class="separator d-none d-lg-block"></span>

                <div class="sicon-box mb-0 d-none d-lg-flex align-items-center pr-3 mr-1">
                    <div class=" sicon-default">
                        <i class="icon-phone-1"></i>
                    </div>
                    <div class="sicon-header">
                        <h4 class="sicon-title ls-n-25">CALL US NOW</h4>
                        <p><a href="tel:{{$Settings->mobile}}"> {{$Settings->mobile}} </a></p>
                    </div> <!-- header -->
                </div>

                <span class="separator d-none d-lg-block mr-4"></span>
                @if(Auth::user())
                <a href="{{url('/')}}/dashboard" class="d-lg-block d-none">
                @else
                <a href="{{url('/')}}/login" class="d-lg-block d-none">
                @endif
                    <div class="header-user">
                        <i class="icon-user-2"></i>
                        <div class="header-userinfo">
                            <span>Welcome</span>
                            @if(Auth::user())
                            <h4>{{Auth::user()->name}}</h4>
                            @else
                            <h4>Sign In / Register</h4>
                            @endif
                        </div>
                    </div>
                </a>

                <span class="separator d-block"></span>

               @include('front.shopping-cart')

               {{-- <span class="separator d-block"></span> --}}



            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header d-none d-lg-flex" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu w-100">
                    <li class="menu-item d-flex align-items-center">
                        <a href="#" class="d-inline-flex align-items-center sf-with-ul">
                            <i class="custom-icon-toggle-menu d-inline-table"></i><span>All
                                Categories</span></a>
                        <div class="menu-depart">
                            <?php $Categories = DB::table('category')->get(); ?>
                            @foreach ($Categories as $cat)
                            <a href="{{url('/')}}/products/{{$cat->slung}}"><i class="icon-category-sound-video"></i>{{$cat->cat}}</a>
                            @endforeach


                        </div>
                    </li>
                    {{-- <li class="active">
                        <a href="{{url('/')}}">Home</a>
                    </li> --}}
                    <li >
                        <a href="{{url('/')}}/products/shop-by-brand">Our Brands</a>
                    </li>
                    <li >
                        <a href="{{url('/')}}/products/shop-by-category">Browse Categories</a>
                    </li>
                    <li >
                        <a href="{{url('/')}}/products">Products</a>
                    </li>
                    <li >
                        <a href="{{url('/')}}/our-portfolio">Installation</a>
                    </li>

                    <li><a href="{{url('/')}}/knowledge-base">Knowledge Base</a></li>

                    <li><a href="{{url('/')}}/find-us" rel="noopener" target="_blank">Contact Us</a>
                    </li>
                    <li class="float-right"><a href="#" class="pr-0">Special Offers</a></li>
                </ul>
            </nav>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
@endforeach
