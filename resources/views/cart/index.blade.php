@extends('front.master')
@section('content')
<main class="main">
    <div class="container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="{{url('/')}}">Shopping Cart</a>
            </li>
            <li>
                <a href="{{url('/')}}/shopping-cart/checkout">Checkout</a>
            </li>
            <li class="disabled">
                <a href="{{url('/')}}/shopping-cart">Order Complete</a>
            </li>
        </ul>

        @if($CartItems->isEmpty())
        <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Your Cart is Empty</h3>
                    <h4>back to <a href="{{url('/products')}}/shop-by-category">shopping</a></h4>
                </div>
            </div>
        </section>
        <!--/#cart_items-->
        @else
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="thumbnail-col"></th>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="qty-col">Quantity</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($CartItems as $CartItem)
                                <?php
                                    $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                ?>
                                @foreach($Products as $Product)
                                    <tr class="product-row">
                                        <td>
                                            <figure class="product-image-container">
                                                <a href="{{url('')}}/product/{{$Product->slung}}" class="product-image">
                                                    <img src="{{url('/')}}/uploads/product/{{$Product->thumbnail}}" alt="product">
                                                </a>

                                                <a href="{{url('/')}}/shopping-cart/remove-from-cart/{{$CartItem->rowId}}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </td>
                                        <td class="product-col">
                                            <h5 class="product-title">
                                                <a href="{{url('')}}/product/{{$Product->slung}}">{{$Product->name}}</a>
                                            </h5>
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" value="{{$CartItem->qty}}" type="text">
                                            </div><!-- End .product-single-qty -->
                                        </td>
                                        <td class="text-right">
                                            <span class="subtotal-price">
                                                <?php $Qty = $CartItem->qty ?>
                                                @if($Product->offer == 1)
                                                @if (session()->has('rates'))

                                                    <?php
                                                $rates = Session::get('rates');
                                                $Rates = DB::table('rates')->where('rates', $rates)->get();
                                                ?>

                                                    @foreach ($Rates as $rt)

                                                    {{$rt->symbol}}<?php $total = ($Qty*$Product->price) * $rt->rates;
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
                                                    {{$rt->symbol}}<?php $total = ($Qty*$Product->price) * $rt->rates;
                                                echo ceil($total) ?>
                                                    @endforeach

                                                @else
                                                ksh {{$Qty*$Product->price}}
                                                @endif
                                                {{--  --}}
                                                @endif
                                            </span>
                                    </td>
                                    </tr>
                                @endforeach
                            @endforeach


                        </tbody>



                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>

                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>
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
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-left">
                                    <h4>Shipping</h4>

                                    <div class="form-group form-group-custom-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="radio"
                                                checked>
                                            <label class="custom-control-label">Shipping Fees Applies</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                </td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Total(Without Shipping)</td>
                                <td>
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
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{url('/')}}/shopping-cart/checkout" class="btn btn-block btn-dark">Proceed to Checkout
                            <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
        @endif
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->
@endsection
