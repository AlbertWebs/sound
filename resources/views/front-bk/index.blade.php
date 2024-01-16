@extends('front.master')
@section('content')
<main class="main">

    <?php $Slider = DB::table('sliders')->where('id','30')->get(); ?>
    @if($Slider->isEmpty())

    @else
    <section class="home-slider owl-carousel owl-theme text-uppercase nav-big bg-gray" data-owl-options="{
        'loop': false
    }">



    @foreach ($Slider as $slider)
<br>
    <div class="home-slide home-slide2 banner">
        <img class="slide-bg" src="{{url('/')}}/uploads/sliders/{{$slider->image}}" alt="slider image" width="1120" height="500" style="background-color: #eee;">
        <?php $Sliders = DB::table('product')->where('id',$slider->product_id)->get(); ?>
        @foreach ($Sliders as $sliders)
        <div class="container">
            <div class="banner-layer banner-layer-middle banner-layer-left">
                <h4 class="mb-0">{{$sliders->brand}}</h4>
                {{-- <h3 class="m-b-2">20% off</h3> --}}
                <?php $Categories = DB::table('category')->where('id',$sliders->cat)->get(); ?>
                @foreach($Categories as $cat)
                <h3 class="m-b-3 heading-border" style="color:#1DA098">{{$cat->cat}}</h3>
                @endforeach
                <h2 class="m-b-4">{{$sliders->name}}</h2>
                <a href="{{url('/')}}/product/{{$sliders->slung}}" class="btn btn-block btn-dark" style="background-color: #1DA098">Shop All Sale</a>
            </div>
        </div>
        @endforeach
        <!-- End .container -->
    </div>
    @endforeach

    <!-- End .home-slide -->
    <hr>
</section>
@endif

<div class="categories-section appear-animate animated fadeIn appear-animation-visible" data-animation-name="fadeIn" data-animation-delay="100" style="animation-duration: 1000ms;">
    <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer owl-loaded owl-drag" data-owl-options="{
       'responsive': {
       '0': {
       'items': 2
       },
       '480': {
       'items': 3
       },
       '576': {
       'items': 4
       },
       '768': {
       'items': 5
       },
       '992': {
       'items': 7
       },
       '1200': {
       'items': 8
       }
       }
       }">
       <?php $AllCategories = DB::table('category')->where('id','30')->get(); ?>
       <div class="owl-stage-outer">
          <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1440px;">
            @foreach ($AllCategories as $item)
            <div class="owl-item active" style="width: 160px; margin-right: 20px;">
                <div class="product-category appear-animate animated fadeInUpShorter appear-animation-visible" data-animation-name="fadeInUpShorter" style="animation-duration: 1000ms;">
                   <a href="{{url('/')}}/products/{{$item->slung}}">
                      <figure>
                         <img style="border-radius:10px;" src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="{{$item->cat}}" width="280" height="240">
                      </figure>
                      <div class="category-content" style="text-align:center">
                         <h3>{{$item->cat}}</h3>
                         <span><mark class="count"><?php echo count($Pro = DB::table('product')->where('cat',$item->id)->get()) ?></mark> products</span>
                      </div>
                   </a>
                </div>
             </div>
             @endforeach
          </div>
       </div>
       <div class="owl-nav disabled"><button type="button" title="nav" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" title="nav" role="presentation" class="owl-next disabled"><i class="icon-angle-right"></i></button></div>
       <div class="owl-dots disabled"></div>
    </div>
 </div>

<!-- End .home-slider -->
    {{-- @include('front.home-slider') --}}

    {{-- @include('front.home-filter') --}}

    @include('front.home-combo')

    @include('front.home-trending')

    <section class="product-section2 container">
        <div class="row">
            <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter">
                <h3 class="custom-title">Special Offers</h3>
                <div class="owl-carousel owl-theme dots-simple">
                    <?php $SpecialOffers = DB::table('product')->where('offer','1')->get(); ?>
                    @foreach ($SpecialOffers as $special)
                    <div class="banner banner1" style="background: url('{{url('/')}}/uploads/product/{{$special->offer_banner}}') rgb(29,160,152); background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 40.2rem;">
                        <div class="banner-content banner-layer-middle position-absolute">

                            {{-- <img src="{{asset('theme/assets/images/demoes/demo42/shop_brand1.png')}}" width="232" height="28"
                                alt="brand" /> --}}
                            <h1 class="text-uppercase text-white" style="font-size:3.5rem">{{$special->name}}</h1>
                            <?php $Category = DB::table('category')->where('id',$special->cat)->get(); ?>
                            @foreach($Category as $cat)
                            {{-- <a target="new" href="{{url('/')}}/products/{{$cat->slung}}" class="product-category">{{$cat->cat}}</a> --}}
                            <h3 class="banner-subtitle text-uppercase text-white">{{$cat->cat}}</h3>
                            @endforeach

                            @if (session()->has('rates'))

                                <?php
                                    $rates = Session::get('rates');
                                    $Rates = DB::table('rates')->where('rates',$rates)->get();
                                ?>

                                @foreach ($Rates as $rt)
                                <h2 class="banner-title text-uppercase text-white font-weight-bold">
                                    Starting<br>At <sup>{{$rt->symbol}}</sup><?php $total = $special->price*$rt->rates; echo ceil($total) ?><sup>00</sup>
                                </h2>
                                @endforeach
                            @else
                            <h2 class="banner-title text-uppercase text-white font-weight-bold">
                                Starting<br>At <sup>ksh</sup>{{$special->price}}<sup>00</sup>
                            </h2>
                            @endif
                            <p class="banner-desc text-white">Start Shopping Right Now</p>
                            <a href="{{url('/')}}/product/{{$special->slung}}" class="btn btn-dark btn-rounded btn-icon-right ls-25" role="button">Shop
                                Now
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
            @include('front.home-suggest')
            @include('front.home-favorite')
        </div>
    </section>

    @include('front.home-brand')

    @include('front.home-call-to-action')

    @include('front.newly-arrived')



    @include('front.blog')
    @include('front.home-tags')
</main>
<!-- End .main -->
@endsection
