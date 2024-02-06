@extends('front.master')
@section('content')
<main class="main home mt-4">
    <div class="page-content">

       <div class="container">
          <section class="banners-grid pt-10 mt-6 pb-6">

             <div class="row grid">
                <div class="grid-item col-lg-6 height-x2" >
                   <div class="banner banner1 banner-fixed overlay-light appear-animate" data-animation-options="{
                      'name': 'fadeInRightShorter'
                      }" style="background-color: #e6e6e8">
                      <figure>
                         <img src="{{url('/')}}/uploads/banners/banner.png" alt="banner image" width="680" height="508">
                      </figure>
                      <div class="banner-content top w-100 text-center">
                         <h4 class="banner-subtitle text-uppercase mb-2">
                            Deals and Promotion
                         </h4>
                         <h3 class="banner-title font-weight-bold text-uppercase">Boosters & Amplifiers</h3>
                         <h5 class="text-uppercase">Start at <span class="text-primary">kes 12,400.00</span></h5>
                      </div>
                      <div class="banner-content bottom w-100 text-center">
                         <a href="{{url('/')}}/products/car-amplifiers-booster" class="btn btn-rounded btn-outline btn-dark mb-4">Shop Now<i class="d-icon-arrow-right"></i></a>
                      </div>
                   </div>
                </div>
                <div class="grid-item col-lg-3 col-xs-6 height-x1">
                   <div class="banner banner2 banner-fixed overlay-light content-middle appear-animate" data-animation-options="{
                      'name': 'fadeInDownShorter'
                      }">
                      <figure>
                         <img src="{{asset('theme/images/demos/demo29/banner/3.jpg')}}" alt="banner image" width="280" height="207">
                      </figure>
                      <div class="banner-content">
                         <h5 class="ls-l mb-1 opacity-8">Every Week is </h5>
                         <h4 class="banner-subtitle text-uppercase ls-s mb-0">Black Friday</h4>
                         <h3 class="banner-title text-primary font-weight-bold ls-s">Sale</h3>
                         <a href="{{url('/')}}/products/mid-range-speakers" class="btn btn-link btn-underline btn-dark">Shop
                         Now<i class="d-icon-arrow-right"></i></a>
                      </div>
                   </div>
                </div>
                <div class="grid-item col-lg-3 col-xs-6 height-x2">
                   <div class="banner banner4 banner-fixed overlay-dark appear-animate" data-animation-options="{
                      'name': 'fadeInLeftShorter'
                      }">
                      <figure>
                         <img src="{{url('/')}}/uploads/banners/b4.jpg" alt="banner image" width="280" height="434">
                      </figure>
                      <div class="banner-content top w-100 text-center">
                         <p class="banner-date text-right text-white font-weight-bold">
                            18-25<sup>TH</sup>MAY
                         </p>
                         <h5 class="banner-subtitle text-uppercase text-white">
                            The Season To Blast
                         </h5>
                         <h3 class="banner-title font-weight-bold text-white text-uppercase">Up To 50%</h3>
                         <h4 class="text-white text-uppercase font-weight-normal">Best Deals for Bass Speakers
                         </h4>
                      </div>
                   </div>
                </div>
                <div class="grid-item col-lg-3 col-xs-6 height-x1">
                   <div class="banner banner3 banner-fixed overlay-dark content-middle appear-animate" data-animation-options="{
                      'name': 'fadeInUpShorter'
                      }">
                      <figure>
                         <img src="{{asset('theme/images/demos/demo29/banner/4.jpg')}}" alt="banner image" width="280" height="207">
                      </figure>
                      <div class="banner-content">
                         <h5 class="ls-l text-white mb-1 opacity-8">Best Seller</h5>
                         <h4 class="banner-subtitle text-uppercase ls-s text-white mb-1">Audio Systems</h4>
                         <h3 class="banner-title font-weight-bold text-white ls-s ">20% Off</h3>
                         <a href="#" class="btn btn-link btn-underline btn-white">Shop
                         Now<i class="d-icon-arrow-right"></i></a>
                      </div>
                   </div>
                </div>
                <div class="grid-space col-lg-3 col-xs-6"></div>
             </div>
          </section>
       </div>
       <section class="grey-section product-wrapper mt-10 pt-10 pb-4">
          <div class="container pt-2">
             <div class="title-wrapper with-filters d-flex align-items-center justify-content-between pt-2 mb-4">
                <h2 class="title title-simple mb-md-0 appear-animate" data-animation-options="{'name': 'fadeInLeftShorter','delay': '.2s'}">New Arrivals</h2>
             </div>
             <div id="products-1" class="row grid products-grid pb-2 mb-8 appear-animate" data-grid-options="{
                'layoutMode': 'fitRows'
                }">
                <?php $Trending = DB::table('product')->where('trending','1')->limit('12')->get(); ?>
                @if($Trending->isEmpty())

                @else
                    @foreach ($Trending as $item)
                    <div class="grid-item col-xl-2 col-lg-3 col-sm-4 col-6 ">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{url('/')}}/product/{{$item->slung}}">
                                <img src="{{url('/')}}/uploads/product/{{$item->thumbnail}}" alt="{{$item->name}}" width="168" height="190">
                                </a>
                                {{-- <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                </div> --}}
                                <div class="product-action">
                                    <a href="{{url('/')}}/product/{{$item->slung}}" class="btn-product btn-quickviews" title="Quick View">Quick
                                    View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <?php $Category = DB::table('category')->where('id',$item->cat)->get(); ?>
                                    @foreach($Category as $cat)
                                    <a  href="{{url('/')}}/products/{{$cat->slung}}">{{$cat->cat}}</a>
                                    @endforeach
                                </div>
                                <h3 class="product-name" style="min-height:38.8px">
                                    <a href="{{url('/')}}/product/{{$item->slung}}">{{$item->name}}</a>
                                </h3>
                                {{-- <div class="product-price">
                                    <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                </div> --}}
                                @if($item->offer == 1)
                                    <div class="price-box">
                                        <del class="old-price">Ksh {{$item->price_raw}}</del>
                                        <span class="product-price">ksh {{$item->price}}</span>
                                    </div><!-- End .price-box -->
                                @else
                                    <div class="price-box">
                                        <span class="product-price">ksh {{$item->price}}</span>
                                    </div><!-- End .price-box -->
                                @endif

                                <div class="ratings-container">
                                    <?php $Reviews = DB::table('reviews')->where('product_id',$item->id)->get(); ?>
                                    @if($Reviews->isEmpty())
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                    @else
                                    <?php $ReviewsAvg = DB::table('reviews')->where('product_id',$item->id)->avg('rating'); ?>
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{$ReviewsAvg}}%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
             </div>
          </div>
       </section>


       <?php $Categories = DB::table('category')->get(); ?>
       @foreach ($Categories as $Category)
       <?php $Trending = DB::table('product')->where('cat',$Category->id)->limit('12')->orderBy('id','DESC')->get(); ?>
        @if($Trending->isEmpty())

        @else
        <section class="product-wrapper mt-10 pt-10 pb-4">
                <div class="container pt-2">
                    <div class="title-wrapper with-filters d-flex align-items-center justify-content-between pt-2 mb-4">
                        <h2 class="title title-simple mb-md-0 appear-animate" data-animation-options="{'name': 'fadeInLeftShorter','delay': '.2s'}">{{$Category->cat}}</h2>
                    </div>
                    <hr>
                    <div id="products-1" class="row grid products-grid pb-2 mb-8 appear-animate" data-grid-options="{
                        'layoutMode': 'fitRows'
                        }">
                            @foreach ($Trending as $item)
                            <div class="grid-item col-xl-2 col-lg-3 col-sm-4 col-6">
                                <div class="product text-center" style="background-color:#f2f3f5">
                                    <figure class="product-media">
                                        <a href="{{url('/')}}/product/{{$item->slung}}">
                                        <img src="{{url('/')}}/uploads/product/{{$item->thumbnail}}" alt="{{$item->name}}" width="168" height="190">
                                        </a>
                                        {{-- <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                        </div> --}}
                                        <div class="product-action">
                                            <a href="{{url('/')}}/product/{{$item->slung}}" class="btn-product btn-quickviews" title="Quick View">Quick
                                            View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <?php $Category = DB::table('category')->where('id',$item->cat)->get(); ?>
                                            @foreach($Category as $cat)
                                            <a  href="{{url('/')}}/products/{{$cat->slung}}">{{$cat->cat}}</a>
                                            @endforeach
                                        </div>
                                        <h3 class="product-name" style="min-height:38.8px">
                                            <a href="{{url('/')}}/product/{{$item->slung}}">{{$item->name}}</a>
                                        </h3>
                                        {{-- <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div> --}}
                                        @if($item->offer == 1)
                                            <div class="price-box">
                                                <del class="old-price">Ksh {{$item->price_raw}}</del>
                                                <span class="product-price">ksh {{$item->price}}</span>
                                            </div><!-- End .price-box -->
                                        @else
                                            <div class="price-box">
                                                <span class="product-price">ksh {{$item->price}}</span>
                                            </div><!-- End .price-box -->
                                        @endif

                                        <div class="ratings-container">
                                            <?php $Reviews = DB::table('reviews')->where('product_id',$item->id)->get(); ?>
                                            @if($Reviews->isEmpty())
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                            @else
                                            <?php $ReviewsAvg = DB::table('reviews')->where('product_id',$item->id)->avg('rating'); ?>
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:{{$ReviewsAvg}}%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
        </section>
        @endif
       @endforeach


       {{-- <section class="grey-section pt-10 pb-10">
          <div class="container">
             <h2 class="title text-center d-block pt-3">Instagram</h2>
             <div class="owl-carousel owl-theme row cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-4 pb-4" data-owl-options="{
                'items': 2,
                'margin': 20,
                'loop': false,
                'responsive': {
                '480': {
                'items': 2
                },
                '576': {
                'items': 3
                },
                '768': {
                'items': 4
                },
                '992': {
                'items': 6
                }
                }
                }">
                <figure class="instagram appear-animate" data-animation-options="{
                   'name': 'fadeInUpShorter',
                   'delay': '.3s',
                   'duration': '.8s'
                   }">
                   <a href="#">
                   <img src="{{asset('theme/images/demos/demo29/instagram/1.jpg')}}" alt="Instagram" width="213" height="213">
                   </a>
                </figure>
                <figure class="instagram appear-animate" data-animation-options="{
                   'name': 'fadeInUpShorter',
                   'delay': '.3s',
                   'duration': '.8s'
                   }">
                   <a href="#">
                   <img src="{{asset('theme/images/demos/demo29/instagram/2.jpg')}}" alt="Instagram" width="213" height="213">
                   </a>
                </figure>
                <figure class="instagram appear-animate" data-animation-options="{
                   'name': 'fadeInUpShorter',
                   'delay': '.3s',
                   'duration': '.8s'
                   }">
                   <a href="#">
                   <img src="{{asset('theme/images/demos/demo29/instagram/3.jpg')}}" alt="Instagram" width="213" height="213">
                   </a>
                </figure>
                <figure class="instagram appear-animate" data-animation-options="{
                   'name': 'fadeInUpShorter',
                   'delay': '.3s',
                   'duration': '.8s'
                   }">
                   <a href="#">
                   <img src="{{asset('theme/images/demos/demo29/instagram/4.jpg')}}" alt="Instagram" width="213" height="213">
                   </a>
                </figure>
                <figure class="instagram appear-animate" data-animation-options="{
                   'name': 'fadeInUpShorter',
                   'delay': '.3s',
                   'duration': '.8s'
                   }">
                   <a href="#">
                   <img src="{{asset('theme/images/demos/demo29/instagram/5.jpg')}}" alt="Instagram" width="213" height="213">
                   </a>
                </figure>
                <figure class="instagram appear-animate" data-animation-options="{
                   'name': 'fadeInUpShorter',
                   'delay': '.3s',
                   'duration': '.8s'
                   }">
                   <a href="#">
                   <img src="{{asset('theme/images/demos/demo29/instagram/6.jpg')}}" alt="Instagram" width="213" height="213">
                   </a>
                </figure>
             </div>
          </div>
       </section> --}}
    </div>
 </main>
@endsection
