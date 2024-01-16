<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
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
            </div>

            <div class="header-right d-none d-lg-flex">
                <p class="top-message text-uppercase mr-2">Number #1 Car Audio Dealer in Kenya</p>
                <div class="header-dropdown dropdown-expanded">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{url('/')}}/dashboard">My Account</a></li>
                            <li><a href="{{url('/')}}/shopping-cart">Cart</a></li>
                            <li><a href="{{url('/')}}/checkout">Checkout</a></li>
                            <li><a href="{{url('/')}}/wishlist">My Wishlist</a></li>
                            @if(Auth::user())
                            <li><a href="{{url('/')}}/dashboard" class="login-link"><i class="fas fa-user"></i> {{Auth::user()->name}}</a></li>
                            @else
                            <li><a href="{{url('/')}}/dashboard" class="login-link"> <i class="fas fa-user"></i>Log In</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{url('/')}}" class="logo">
                    <img src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" class="w-100" width="202" height="80"
                        alt="{{$Settings->sitename}}">
                </a>
                <nav class="main-nav">
                    <ul class="menu">

                        <li >
                            <a href="{{url('/')}}/products/shop-by-brand">Our Brands</a>
                        </li>
                        <li >
                            <a href="{{url('/')}}/products/shop-by-category">Browse Categories</a>
                        </li>

                        <li >
                            <a href="{{url('/')}}/our-portfolio">Installation</a>
                        </li>

                        <li><a href="{{url('/')}}/find-us" rel="noopener" target="_blank">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div
                    class="header-icon header-search header-search-inline header-search-category w-lg-max text-right d-none d-sm-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="{{url('/search-results')}}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="keyword" id="search"
                                placeholder="I'm searching for..." required>
                                <div class="select-custom font2">
                                    <select id="cat" name="cat">
                                        <?php $Categories = DB::table('category')->get(); ?>
                                        @foreach ($Categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->cat}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- End .select-custom -->
                            <button class="btn icon-magnifier" title="search" type="submit"></button>
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

                <a href="{{url('/')}}/wishlist" class="header-icon">
                    <i class="icon-wishlist-2 line-height-1"></i>
                </a>

                <?php
                    $CartItems = Cart::content();
                    ?>
                    @if($CartItems->isEmpty())
                    <div class="dropdown cart-dropdown">
                        <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-cart-thick"></i>
                            <span class="cart-count badge-circle">{{ Cart::count() }}</span>
                        </a>
                    </div><!-- End .dropdown -->
                    @else
                    <div class="dropdown cart-dropdown">
                        <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-cart-thick"></i>
                            <span class="cart-count badge-circle">{{ Cart::count() }}</span>
                        </a>

                        <div class="cart-overlay"></div>

                        <div class="dropdown-menu mobile-cart">
                            <a href="#" title="Close (Esc)" class="btn-close">×</a>

                            <div class="dropdownmenu-wrapper custom-scrollbar">
                                <div class="dropdown-cart-header">Shopping Cart</div>
                                <!-- End .dropdown-cart-header -->

                                <div class="dropdown-cart-products">
                                    @foreach($CartItems as $CartItem)
                                        <?php
                                            $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get();
                                        ?>
                                        @foreach($ProductsForCart as $Product)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$CartItem->qty}}</span>
                                                    ×

                                                    @if($Product->offer == 1)
                                                    @if (session()->has('rates'))

                                                        <?php
                                                    $rates = Session::get('rates');
                                                    $Rates = DB::table('rates')->where('rates', $rates)->get();
                                                    ?>

                                                        @foreach ($Rates as $rt)

                                                        {{$rt->symbol}}<?php $total = $Product->price * $rt->rates;
                                                    echo ceil($total) ?>

                                                        @endforeach

                                                    @else
                                                    ksh {{$Product->price}}
                                                    @endif

                                                    @else

                                                    {{--  --}}
                                                    @if (session()->has('rates'))

                                                        <?php
                                                    $rates = Session::get('rates');
                                                    $Rates = DB::table('rates')->where('rates', $rates)->get();
                                                    ?>

                                                        @foreach ($Rates as $rt)
                                                        {{$rt->symbol}}<?php $total = $Product->price * $rt->rates;
                                                    echo ceil($total) ?>
                                                        @endforeach

                                                    @else
                                                    ksh {{$Product->price}}
                                                    @endif
                                                    {{--  --}}
                                                    @endif

                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="{{url('/')}}/product/{{$Product->slung}}" class="product-image">
                                                    <img src="{{url('/')}}/uploads/product/{{$Product->thumbnail}}" alt="{{$Product->name}}" width="80" height="80">
                                                </a>
                                                <a href="{{url('/')}}/shopping-cart/remove-from-cart/{{$CartItem->rowId}}" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->
                                        @endforeach
                                    @endforeach

                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>SUBTOTAL:</span>


                                    <span class="cart-total-price float-right">
                                        <?php $SubTotals = Cart::subtotal(); $SubTotal = str_replace(',', '', $SubTotals);  ?>
                                        @if (session()->has('rates'))

                                        <?php
                                        $rates = Session::get('rates');
                                        $Rates = DB::table('rates')->where('rates', $rates)->get();
                                        ?>

                                        @foreach ($Rates as $rt)
                                        {{$rt->symbol}}<?php $total = ceil($SubTotal) * $rt->rates; echo ceil($total) ?>
                                        @endforeach

                                        @else
                                        ksh {{$SubTotal}}
                                        @endif

                                    </span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{url('/')}}/shopping-cart" class="btn btn-gray btn-block view-cart">View
                                        Cart</a>
                                    <a href="{{url('/')}}/shopping-cart/checkout" class="btn btn-dark btn-block">Checkout</a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdownmenu-wrapper -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .dropdown -->
                    @endif
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="owl-carousel info-boxes-slider" data-owl-options="{
                'items': 1,
                'dots': false,
                'loop': false,
                'responsive': {
                    '768': {
                        'items': 2
                    },
                    '992': {
                        'items': 4
                    }
                }
            }">
            <div class="info-box info-box-icon-left">
                <i class="icon-check text-white"></i>

                <div class="info-box-content">
                    <h4 class="text-white">Quality Products</h4>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-money text-white"></i>

                <div class="info-box-content">
                    <h4 class="text-white">Affordable products</h4>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-support text-white"></i>

                <div class="info-box-content">
                    <h4 class="text-white">Online Support 24/7</h4>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->
            <div class="info-box info-box-icon-left">
                <i class="icon-support text-white"></i>

                <div class="info-box-content">
                    <h4 class="text-white">24/7 product support</h4>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->


        </div><!-- End .owl-carousel -->
    </div>
</header><!-- End .header -->
