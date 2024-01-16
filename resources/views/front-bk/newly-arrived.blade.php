<section class="product-section1 recently">
    <div class="container">
        <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">
            Recently Arrived</h2>
        <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
                'loop': true,
                'dots': true,
                'nav': false,
                'margin': 20,
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '576': {
                        'items': 4
                    },
                    '991': {
                        'items': 6
                    }
                }
            }">

            <?php $NewlyAdded = DB::table('product')->orderBy('id','DESC')->limit('7')->get(); ?>
            @foreach ($NewlyAdded as $new)
            <div class="product-default inner-quickview inner-icon" style="border:1px solid #f4f4f4">
                <figure>
                    <a href="{{url('/')}}/product/{{$new->slung}}">
                        <img src="{{url('/')}}/uploads/product/{{$new->thumbnail}}" width="300"
                            height="300" alt="{{$new->name}}">
                    </a>
                    <div class="label-group">
                        <?php $HotProduct = DB::table('orders_products')->where('products_id',$new->id)->get() ?>
                        @if($HotProduct->isEmpty())

                        @else
                        <div class="product-label label-hot">HOT</div>
                        @endif
                        @if($new->offer == 1)
                        <span class="product-label label-sale">
                        -<?php
                            $Original = $new->price_raw;
                            $OfferPrice = $new->price;
                            $percentage = ($OfferPrice*100)/$Original;
                            $less = 100-ceil($percentage);
                            echo $less
                        ?>%
                        </span>
                        @else

                        @endif
                    </div>
                    <div class="btn-icon-group">
                        <a href="{{url('/')}}/shopping-cart/add-to-cart/{{$new->id}}" class="add-to-cart btn-icon btn-add-cart product-type-simple"><i
                                class="icon-shopping-cart"></i></a>
                    </div>
                    <a href="{{url('/')}}/product-quick-view/{{$new->slung}}" class="btn-quickview" title="Quick View">Quick
                        View</a>
                </figure>
                <div class="product-details">
                    <div class="category-wrap">
                        <div class="category-list">
                            <?php $Category = DB::table('category')->where('id',$new->cat)->get(); ?>
                            @foreach($Category as $cat)
                            <a  href="{{url('/')}}/products/{{$cat->slung}}">{{$cat->cat}}</a>
                            @endforeach
                        </div>
                        <a href="{{url('/')}}/wishlist/add-to-wishlist/{{$new->id}}" class="btn-icon-wish" title="wishlist"><i
                                class="icon-heart"></i></a>
                    </div>
                    <h3 class="product-title">
                        <a target="new" href="{{url('/')}}/product/{{$new->slung}}">{{$new->name}}</a>
                    </h3>
                    <div class="ratings-container">
                        <?php $Reviews = DB::table('reviews')->where('product_id',$new->id)->get(); ?>
					    @if($Reviews->isEmpty())
                        <div class="product-ratings">
                            <span class="ratings" style="width:0%"></span>
                            <!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div><!-- End .product-ratings -->
                        @else
                        <?php $ReviewsAvg = DB::table('reviews')->where('product_id',$new->id)->avg('rating'); ?>
                        <div class="product-ratings">
                            <span class="ratings" style="width:{{$ReviewsAvg}}%"></span>
                            <!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div><!-- End .product-ratings -->
                        @endif
                    </div><!-- End .product-container -->
                    @if($new->offer == 1)
                        @if (session()->has('rates'))

                            <?php
                                $rates = Session::get('rates');
                                $Rates = DB::table('rates')->where('rates',$rates)->get();
                            ?>

                            @foreach ($Rates as $rt)
                            <div class="price-box">
                                <del class="old-price">{{$rt->symbol}}<?php $total = $new->price_raw*$rt->rates; echo ceil($total) ?></del>
                                <span class="product-price">{{$rt->symbol}}<?php $total = $new->price*$rt->rates; echo ceil($total) ?></span>
                            </div><!-- End .price-box -->
                            @endforeach

                        @else
                        <div class="price-box">
                            <del class="old-price">Ksh {{$new->price_raw}}</del>
                            <span class="product-price">ksh {{$new->price}}</span>
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

                                <span class="product-price">{{$rt->symbol}}<?php $total = $new->price*$rt->rates; echo ceil($total) ?></span>
                            </div><!-- End .price-box -->
                            @endforeach

                        @else
                        <div class="price-box">

                            <span class="product-price">ksh {{$new->price}}</span>
                        </div><!-- End .price-box -->
                        @endif
                    {{--  --}}
                    @endif
                </div><!-- End .product-details -->
            </div>
            @endforeach
        </div>
    </div>
</section>
