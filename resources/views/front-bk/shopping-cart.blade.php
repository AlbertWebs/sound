<div id="cart-update">
    <?php
    $CartItems = Cart::getContent();
    ?>
    @if($CartItems->isEmpty())
    <div class="dropdown cart-dropdown">
        <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="icon-cart-thick"></i>
            <span class="cart-count badge-circle">{{ $CartItems->count() }}</span>
        </a>
    </div><!-- End .dropdown -->
    @else
    <div class="dropdown cart-dropdown">
        <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="icon-cart-thick"></i>
            <span class="cart-count badge-circle">{{ $CartItems->count() }}</span>
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
