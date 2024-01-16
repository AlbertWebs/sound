<div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter"  data-animation-delay="200">
    <div class="d-lg-flex align-items-center">
        <h3 class="custom-title divider">We Suggest</h3>
        <a href="{{url('/')}}/shop-by-category" class="sicon-title">VIEW ALL<i class="fas fa-arrow-right"></i></a>
    </div>
    @if(Auth::user())
    {{-- Suggets based on previous orders F*** Relationships, Lets go the hard way, kwani iko nini --}}
    {{-- Get Based On User ID --}}
    <?php $Orders = DB::table('orders')->where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->first(); ?>
        @if($Orders == null)
            @include('front.home-default-suggest')
        @else
            {{-- Get from Orders products table --}}
            <?php $OrderProduct = DB::table('orders_products')->where('orders_id',$Orders->id)->get(); ?>
            @foreach ($OrderProduct as $ordersproduct)
                {{-- Get Category --}}
                <?php $SuggestOrder = DB::table('product')->where('id',$ordersproduct->products_id)->get(); ?>
                @foreach ($SuggestOrder as $suggestOrder)
                    <?php $OrderCategory = $suggestOrder->cat ?>
                    {{-- Get products from that category --}}
                    <?php $Product = DB::table('product')->where('cat',$OrderCategory)->limit('3')->inRandomOrder()->get(); ?>
                    @foreach ($Product as $suggest)
                    <div class="product-default left-details product-widget" style="border:1px solid #f4f4f4">
                        <figure>
                            <a href="{{url('/')}}/product/{{$suggest->slung}}">
                                <img src="{{url('/')}}/uploads/product/{{$suggest->thumbnail}}" width="95" height="95" alt="{{$suggest->name}}">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list" style="margin:0 auto">
                                <?php $Category = DB::table('category')->where('id',$suggest->cat)->get(); ?>
                                @foreach($Category as $cat)
                                <a  href="{{url('/')}}/products/{{$cat->slung}}">{{$cat->cat}}</a>
                                @endforeach
                            </div>
                            <h3 class="product-title">
                                <a target="new" href="{{url('/')}}/product/{{$suggest->slung}}">{{$suggest->name}}</a>
                            </h3>
                            <div class="ratings-container">
                                <?php $Reviews = DB::table('reviews')->where('product_id',$suggest->id)->get(); ?>
                                @if($Reviews->isEmpty())
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                                @else
                                <?php $ReviewsAvg = DB::table('reviews')->where('product_id',$suggest->id)->avg('rating'); ?>
                                <div class="product-ratings">
                                    <span class="ratings" style="width:{{$ReviewsAvg}}%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                                @endif
                            </div>
                            <!-- End .product-container -->
                            @if($suggest->offer == 1)
                            @if (session()->has('rates'))

                                <?php
                                    $rates = Session::get('rates');
                                    $Rates = DB::table('rates')->where('rates',$rates)->get();
                                ?>

                                @foreach ($Rates as $rt)
                                <div class="price-box">
                                    <del class="old-price">{{$rt->symbol}}<?php $total = $suggest->price_raw*$rt->rates; echo ceil($total) ?></del>
                                    <span class="product-price">{{$rt->symbol}}<?php $total = $suggest->price*$rt->rates; echo ceil($total) ?></span>
                                </div><!-- End .price-box -->
                                @endforeach

                            @else
                            <div class="price-box">
                                <del class="old-price">Ksh {{$suggest->price_raw}}</del>
                                <span class="product-price">ksh {{$suggest->price}}</span>
                            </div><!-- End .price-box -->
                            @endif

                        @else

                        {{--  --}}
                        @if (session()->has('rates'))

                                <?php
                                    $rates = Session::get('rates');
                                    $Rates = DB::table('rates')->where('rates',$rates)->get();
                                ?>

                                @foreach ($Rates as $rt)
                                <div class="price-box">

                                    <span class="product-price">{{$rt->symbol}}<?php $total = $suggest->price*$rt->rates; echo ceil($total) ?></span>
                                </div><!-- End .price-box -->
                                @endforeach

                            @else
                            <div class="price-box">

                                <span class="product-price">ksh {{$suggest->price}}</span>
                            </div><!-- End .price-box -->
                            @endif
                        {{--  --}}
                        @endif
                        </div>
                        <!-- End .product-details -->
                    </div>
                    @endforeach

                @endforeach

            @endforeach

        @endif
    @else
            @include('front.home-default-suggest')
    @endif

</div>
