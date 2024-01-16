@extends('front.master')
@section('content')
@foreach($Products as $Product)
<?php
   $CategoryID = $Product->cat;
   $CategroyName = App\Models\Category::find($CategoryID)
?>
<?php $Categories = DB::table('category')->where('id',$CategoryID)->get(); ?>
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/products">Shop</a></li>

                    <li class="breadcrumb-item"><a href="{{url('/')}}/products/{{$CategroyName->slung}}">{{$CategroyName->cat}}</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{$Product->name}}</a></li>
                </ol>
            </nav>

            <div class="product-single-container product-single-default">
                <div class="cart-message d-none">
                    <strong class="single-cart-notice">“{{$Product->name}}”</strong>
                    <span>has been added to your cart.</span>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                <div class="product-item">
                                    <img class="product-single-image"
                                        src="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}"
                                        data-zoom-image="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}"
                                        width="468" height="468" alt="product" />
                                </div>
                                <div class="product-item">
                                    <img class="product-single-image"
                                        src="{{url('/')}}/uploads/product/{{$Product->thumbnail}}"
                                        data-zoom-image="{{url('/')}}/uploads/product/{{$Product->thumbnail}}"
                                        width="468" height="468" alt="product" />
                                </div>
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                            <div class="owl-dot">
                                <img src="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}" width="110"
                                    height="110" alt="product-thumbnail" />
                            </div>
                            <div class="owl-dot">
                                <img src="{{url('/')}}/uploads/product/{{$Product->thumbnail}}" width="110"
                                    height="110" alt="product-thumbnail" />
                            </div>
                        </div>
                    </div><!-- End .product-single-gallery -->

                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{$Product->name}}</h1>

                        <div class="product-nav">
                            <?php
                                $ProductID = $Product->id;
                                $ProductNext = $ProductID+1;
                                $ProductPrev = $ProductID-1;

                            ?>




                            @if($ProductPrev<1)

                            @else
                                <?php
                                 $ProductPrevFetch = App\Models\Product::find($ProductPrev);
                                ?>

                                @if($ProductPrevFetch == null)

                                @else

                                <div class="product-prev">
                                    <a href="{{url('/')}}/product/{{$ProductPrevFetch->slung}}">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150"
                                                    src="{{url('/')}}/uploads/product/{{$ProductPrevFetch->thumbnail}}"
                                                    style="padding-top: 0px;">

                                                <span>{{$ProductPrevFetch->name}}</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                @endif

                            @endif


                            <?php $ProductNextFetch = App\Models\Product::find($ProductNext); ?>

                            @if($ProductNextFetch==null)

                            @else
                                <div class="product-next">
                                    <a href="{{url('/')}}/product/{{$ProductNextFetch->slung}}">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150"
                                                    src="{{url('/')}}/uploads/product/{{$ProductNextFetch->thumbnail}}"
                                                    style="padding-top: 0px;">

                                                <span>{{$ProductNextFetch->name}}</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endif

                        </div>

                        {{-- <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:60%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>

                            <a href="#" class="rating-link">( 1 Reviews )</a>
                        </div> --}}

                        <hr class="short-divider">

                        <div class="price-box">
                            <span class="product-price">

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
                        </div><!-- End .price-box -->
                        <br><br>

                        <div class="product-desc">
                            <p>
                                {{$Product->meta}}
                            </p>
                        </div><!-- End .product-desc -->

                        <ul class="single-info-list">
                            <!---->
                            <li>
                                Code:
                                <strong>{{$Product->code}}</strong>
                            </li>

                            <li>
                                CATEGORY:
                                <strong>
                                    <a href="{{url('/')}}/products/{{$CategroyName->slung}}" class="product-category">{{$CategroyName->cat}}</a>
                                </strong>
                            </li>

                            <li>
                                Brand:
                                <strong><a href="#" class="product-category">{{$Product->brand}}</a></strong>,
                                {{-- <strong><a href="#" class="product-category">Nissan</a></strong> --}}
                            </li>
                            <?php $Variations = DB::table('variations')->where('product_id',$Product->product_id)->get();  ?>
                            @if($Variations->isEmpty())

                            @else

                                {{--  --}}
                                <div class="product-single-filter">
                                    <label><strong>variations:</strong></label>
                                    <ul class="config-size-list">
                                        @foreach ($Variations as $item)
                                        <li><a href="{{url('/')}}/product-variation/{{$item->slung}}" class="d-flex align-items-center justify-content-center">{{$item->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                {{--  --}}

                            @endif
                        </ul>

                        <div class="product-action">

                            <div class="product-single-qty">
                                <input class="horizontal-quantity form-control" type="text">
                            </div><!-- End .product-single-qty -->

                            <a href="{{url('/')}}/shopping-cart/add-to-cart/{{$Product->id}}" class=" add-to-cart btn-add-cart btn btn-dark add-cart mr-2 product-type-simple" title="Add to Cart">Add to
                                Cart</a>

                            <a href="{{url('/shopping-cart')}}" class="btn btn-gray view-cart d-none">View cart</a>
                        </div><!-- End .product-action -->

                        <hr class="divider mb-0 mt-0">

                        <div class="product-single-share mb-2">
                            <label class="sr-only">Share:</label>

                            <div class="social-icons mr-2">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                    title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                    title="Twitter"></a>
                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                    title="Linkedin"></a>
                                <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                    title="Google +"></a>
                                <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                    title="Mail"></a>
                            </div><!-- End .social-icons -->

                            <a href="{{url('/')}}/wishlist/add-to-wishlist/{{$Product->id}}" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                    class="icon-wishlist-2"></i><span>Add to
                                    Wishlist</span></a>
                        </div><!-- End .product single-share -->
                    </div><!-- End .product-single-details -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                            href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                            aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                            role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                            Information</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                            href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                            aria-selected="false">Reviews (1)</a>
                    </li> --}}
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                        aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                            {!!html_entity_decode($Product->content)!!}
                        </div><!-- End .product-desc-content -->
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                        aria-labelledby="product-tab-tags">
                        <table class="table table-striped mt-2">
                            <a href="#">
                                <img width="100" src="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}" alt="Product Manufacturer Image">
                            </a>
                            <p><strong>Type</strong> <?php $CategoryName = DB::table('category')->where('id',$Product->cat)->get();  ?> @foreach($CategoryName as $Cat) {{$Cat->cat}} @endforeach</p>
                            <p><strong>Brand</strong> {{$Product->brand}}</p>
                            @if($Product->extras == null)

                            @else
                                <?php $ExtraArray = json_decode($Product->extras,JSON_UNESCAPED_SLASHES);  $CountArray = count($ExtraArray);  $init = 0;  ?>

                            <tbody>
                                @foreach ($ExtraArray as $key => $value)
                                <tr>
                                    <th>{{$value['title']}}</th>
                                    <td>{{$value['value']}}</td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                        aria-labelledby="product-tab-reviews">
                        {{-- <div class="product-reviews-content">
                            <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                            <div class="comment-list">
                                <div class="comments">
                                    <figure class="img-thumbnail">
                                        <img src="{{asset('theme/assets/images/blog/author.jpg')}}" alt="author" width="80"
                                            height="80">
                                    </figure>

                                    <div class="comment-block">
                                        <div class="comment-header">
                                            <div class="comment-arrow"></div>

                                            <div class="ratings-container float-sm-right">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div>

                                            <span class="comment-by">
                                                <strong>Joe Doe</strong> – April 12, 2018
                                            </span>
                                        </div>

                                        <div class="comment-content">
                                            <p>Excellent.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="add-product-review">
                                <h3 class="review-title">Add a review</h3>

                                <form action="#" class="comment-form m-0">
                                    <div class="rating-form">
                                        <label for="rating">Your rating <span class="required">*</span></label>
                                        <span class="rating-stars">
                                            <a class="star-1" href="#">1</a>
                                            <a class="star-2" href="#">2</a>
                                            <a class="star-3" href="#">3</a>
                                            <a class="star-4" href="#">4</a>
                                            <a class="star-5" href="#">5</a>
                                        </span>

                                        <select name="rating" id="rating" required="" style="display: none;">
                                            <option value="">Rate…</option>
                                            <option value="5">Perfect</option>
                                            <option value="4">Good</option>
                                            <option value="3">Average</option>
                                            <option value="2">Not that bad</option>
                                            <option value="1">Very poor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Your review <span class="required">*</span></label>
                                        <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                    </div><!-- End .form-group -->


                                    <div class="row">
                                        <div class="col-md-6 col-xl-12">
                                            <div class="form-group">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" class="form-control form-control-sm" required>
                                            </div><!-- End .form-group -->
                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="form-group">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" class="form-control form-control-sm" required>
                                            </div><!-- End .form-group -->
                                        </div>

                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="save-name" />
                                                <label class="custom-control-label mb-0" for="save-name">Save my
                                                    name, email, and website in this browser for the next time I
                                                    comment.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
                            </div><!-- End .add-product-review -->
                        </div> --}}
                        <!-- End .product-reviews-content -->
                    </div><!-- End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-single-tabs -->

            <div class="products-section pt-0">
                <h2 class="section-title">Related Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small dots-simple">
                    <?php $Relevant = DB::table('product')->where('cat',$Product->cat)->get(); ?>
                    @foreach ($Relevant as $new)
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
                                    if($Original < 1){
                                        $Original = 1;
                                    }
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
                </div><!-- End .products-slider -->
            </div><!-- End .products-section -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endforeach
@endsection
