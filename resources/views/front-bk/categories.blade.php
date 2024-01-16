@extends('front.master-cat')
@section('content')
<main class="main">
    {{-- <div class="category-banner-container bg-gray">
        <div class="container">
            <div class="category-banner banner p-0">
                <div class="row align-items-center no-gutters m-0 text-center text-lg-left">
                    <div
                        class="col-md-4 col-xl-2 offset-xl-2 d-flex justify-content-center justify-content-lg-start my-5 my-lg-0">
                        <div class="d-flex flex-column justify-content-center">
                            <h3 class="text-left text-light text-uppercase m-0">extra</h3>
                            <h2 class="text-uppercase m-b-1">20% off</h2>
                            <h3 class="font-weight-bold text-uppercase heading-border ml-0 m-b-3">Bikes</h3>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 text-md-center my-5 my-lg-0"
                        style="background-image: url(assets/images/demoes/demo27/banners/shop-banner-bg.png);">
                        <img class="d-inline-block" src="{{asset('theme/assets/images/demoes/demo27/banners/shop-banner.png')}}"
                            alt="banner" width="400" height="242">
                    </div>
                    <div class="col-md-3 my-5 my-lg-0">
                        <h4 class="font5 line-height-1 m-b-4">Summer Sale</h4>
                        <a href="#" class="btn btn-teritary btn-lg ml-0">Shop All Sale</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <?php $AllCategories = DB::table('category')->get(); ?>
        <section class="simple-section mt-5" style="margin:0 auto;">
            <h4 class="heading-bottom-border text-uppercase">Categories</h4>
            <div class="row">
                @foreach ($AllCategories as $item)
                <div class="col-lg-3 col-sm-4 col-6"  style="margin:0 auto;  padding-bottom:10px; border-radius:10px;">
                    <div class="product-category">
                        <a href="{{url('/')}}/products/{{$item->slung}}">
                            <figure>
                                <img style="border-radius:10px" src="{{url('/')}}/uploads/categories/{{$item->image}}" width="300" height="300"
                                    alt="{{$item->cat}}">
                            </figure>
                            <div class="category-content" style="text-align:center">
                                <h3>{{$item->cat}}</h3>
                                <span>
                                    <mark class="count">
                                        <?php echo count($Pro = DB::table('product')->where('cat',$item->id)->get()) ?>
                                    </mark>
                                     products</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div><!-- End .container -->
    <br><br>
    <hr>
    {{--  --}}


    <div class="container">
        <div class="row main-content">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($Categories as $categories)
                    <div class="col-6 col-sm-2 col-lg-2 col-xl-2" style="border:1px solid #f4f4f4">
                        <div class="product-default">
                            <figure>
                                <a href="{{url('/')}}/product/{{$categories->slung}}">
                                    <img src="{{url('/')}}/uploads/product/{{$categories->thumbnail}}" width="280"
                                        height="280" alt="{{$categories->name}}">
                                </a>
                                {{-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-13%</div>
                                </div> --}}
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    {{-- <a href="category.html" class="product-category">Category</a> --}}
                                    <?php $Category = DB::table('category')->where('id',$categories->cat)->get(); ?>
                                    @foreach($Category as $cat)
                                    <a  href="{{url('/')}}/products/{{$cat->slung}}">{{$cat->cat}}</a>
                                    @endforeach
                                </div>

                                <h3 class="product-title">
                                    <a href="{{url('/')}}/product/{{$categories->slung}}">{{$categories->name}}</a>
                                </h3>
                                <div class="ratings-container">
                                    <?php $Reviews = DB::table('reviews')->where('product_id',$categories->id)->get(); ?>
                                    @if($Reviews->isEmpty())
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                    @else
                                    <?php $ReviewsAvg = DB::table('reviews')->where('product_id',$categories->id)->avg('rating'); ?>
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{$ReviewsAvg}}%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                    @endif
                                </div><!-- End .product-container -->
                                @if($categories->offer == 1)
                                    @if (session()->has('rates'))

                                        <?php
                                            $rates = Session::get('rates');
                                            $Rates = DB::table('rates')->where('rates',$rates)->get();
                                        ?>

                                        @foreach ($Rates as $rt)
                                        <div class="price-box">
                                            <del class="old-price">{{$rt->symbol}}<?php $total = $categories->price_raw*$rt->rates; echo ceil($total) ?></del>
                                            <span class="product-price">{{$rt->symbol}}<?php $total = $categories->price*$rt->rates; echo ceil($total) ?></span>
                                        </div><!-- End .price-box -->
                                        @endforeach

                                    @else
                                    <div class="price-box">
                                        <del class="old-price">Ksh {{$categories->price_raw}}</del>
                                        <span class="product-price">ksh {{$categories->price}}</span>
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

                                            <span class="product-price">{{$rt->symbol}}<?php $total = $categories->price*$rt->rates; echo ceil($total) ?></span>
                                        </div><!-- End .price-box -->
                                        @endforeach

                                    @else
                                    <div class="price-box">

                                        <span class="product-price">ksh {{$categories->price}}</span>
                                    </div><!-- End .price-box -->
                                    @endif
                                {{--  --}}
                                @endif
                                <div class="product-action">
                                    <a href="{{url('/')}}/wishlist/add-to-wishlist/{{$categories->id}}" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="{{url('/')}}/shopping-cart/add-to-cart/{{$categories->id}}"
                                        class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="{{url('/')}}/product-quick-view/{{$categories->slung}}" class="btn-quickview"
                                        title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .col-xl-3 -->
                    @endforeach
                </div><!-- End .row -->

                <nav class="toolbox toolbox-pagination mb-0">
                    <div class="toolbox-item toolbox-show">
                        <label class="mt-0">Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div><!-- End .select-custom -->
                    </div><!-- End .toolbox-item -->

                    {{$Categories}}
                </nav>
            </div><!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>

        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->
@endsection
