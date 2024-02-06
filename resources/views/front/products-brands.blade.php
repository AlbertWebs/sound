@extends('front.master-category')
@section('content')
<main class="main home mt-4">
    <div class="page-content">
       <section class="product-wrapper mt-10 pt-10 pb-4">
        <div class="container pt-2">
           <div id="products-1" class="row grid products-grid pb-2 mb-8 appear-animate" data-grid-options="{
              'layoutMode': 'fitRows'
              }">

                @foreach ($Categories as $item)
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


       <div  class="row">
        <div class="container pt-2">
            <nav class="toolbox toolbox-pagination">
                <p class="show-info">Showing <span>12 of 56</span> Products</p>
                <?php
                    echo $Categories
                ?>
            </nav>
        </div>
       </div>


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
