@extends('front.master-product')

@section('content')
@foreach($Products as $Product)
  <main class="main single-product mt-4">
    <div class="page-content">
        <div class="container">
            <div class="product product-single row mb-4">
            <div class="col-md-6">
                <div class="product-gallery pg-vertical">
                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                    <figure class="product-image">
                    <img src="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}" data-zoom-image="{{url('/')}}/uploads/product/{{$Product->fb_pixels}}" alt="{{$Product->name}}" width="800" height="900">
                    </figure>

                </div>
                <div class="product-thumbs-wrap">

                    <button class="thumb-up disabled">
                    <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="thumb-down disabled">
                    <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-details">
                <div class="product-navigation">
                    <ul class="breadcrumb breadcrumb-lg">
                    <li>
                        <a href="demo29.html">
                        <i class="d-icon-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="active">Products</a>
                    </li>
                    <li>Detail</li>
                    </ul>
                    <ul class="product-nav">
                        {{--  --}}
                        <?php
                            $ProductID = $Product->id;
                            $ProductNext = $ProductID+1;
                            $ProductPrev = $ProductID-1;

                        ?>
                        {{--  --}}



                    @if($ProductPrev<1)

                    @else
                        <?php
                        $ProductPrevFetch = App\Models\Product::find($ProductPrev);
                        ?>

                        @if($ProductPrevFetch == null)

                        @else
                            <li class="product-nav-prev">
                                <a href="#">
                                <i class="d-icon-arrow-left"></i> Prev <span class="product-nav-popup">
                                    <img src="{{url('/')}}/uploads/product/{{$ProductPrevFetch->thumbnail}}" alt="{{$Product->name}}" width="110" height="123">
                                    <span class="product-name">{{$Product->name}}</span>
                                </span>
                                </a>
                            </li>


                        @endif

                    @endif




                    {{--  --}}
                    <?php $ProductNextFetch = App\Models\Product::find($ProductNext); ?>

                    @if($ProductNextFetch==null)

                    @else
                    <li class="product-nav-next">
                        <a href="#"> Next <i class="d-icon-arrow-right"></i>
                        <span class="product-nav-popup">
                            <img src="{{url('/')}}/uploads/product/{{$ProductNextFetch->thumbnail}}" alt="{{$ProductNextFetch->name}}" width="110" height="123">
                            <span class="product-name">{{$ProductNextFetch->name}}</span>
                        </span>
                        </a>
                    </li>
                    @endif
                    {{--  --}}

                    </ul>
                </div>
                <h1 class="product-name">{{$Product->name}}</h1>
                <div class="product-meta"> SKU: <span class="product-sku">{{$Product->code}}</span> BRAND: <span class="product-brand">{{$Product->brand}}</span>
                </div>
                <div class="product-price">kes {{$Product->price}}</div>
                <div class="ratings-container">
                    <div class="ratings-full">
                    <span class="ratings" style="width:80%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 6 reviews )</a>
                </div>
                <p class="product-short-desc">
                    {!!html_entity_decode($Product->meta)!!}
                </p>


                <hr class="product-divider">

                    <div class="product-form product-qty">
                        {{-- <label>QTY:</label> --}}
                            <div class="product-form-group">
                            {{-- <div class="input-group">
                                <button class="quantity-minus d-icon-minus"></button>
                                <input class="quantity form-control" type="number" min="1" max="1000000">
                                <button class="quantity-plus d-icon-plus"></button>
                            </div> --}}
                                <a href="https://wa.me/254724013583/?text=Hello, Admin, I am ordering {{$Product->name}} from your website {{url('/')}}/product/{{$Product->slung}}." class="btn-product btn-cart">
                                    <i class="fab fa-whatsapp"></i> Order Now
                                </a>
                                <a href="tel:+254724013583" class="btn-product btn-cart">
                                    <i class="d-icon-phone"></i>  Call Now
                                </a>
                            </div>
                    </div>

                <hr class="product-divider mb-3">

                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="container">
        {{--  --}}
        <div class="tab tab-nav-simple product-tabs mb-4">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#product-tab-description">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#product-tab-additional">Additional</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#product-tab-shipping-returns">Shipping &amp; Returns</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#product-tab-reviews">Reviews (8)</a>
            </li> --}}
        </ul>
        <div class="tab-content">
            <div class="tab-pane active in" id="product-tab-description">
                <div class="row mt-12">
                    <div class="col-md-12 mb-8">
                    <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
                    <p class="mb-2">
                        {!!html_entity_decode($Product->content)!!}
                    </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="product-tab-additional">
                {{--  --}}
                <div>
                    <div class="container">
                        {{--  --}}
                        <div class="tab-pane " id="product-tab-size-guide">
                            <figure class="size-table">
                            <table>
                                <tbody>
                                    {{--  --}}
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
                                        </tbody>
                                    @endif


                            </table>
                            </figure>
                        </div>
                        {{--  --}}
                        <table class="table">

                            </tbody>
                        </table>
                    </div>
                </div>

                {{--  --}}
            </div>
            <div class="tab-pane " id="product-tab-shipping-returns">
                <h6 class="mb-2">Shipping Fee</h6>
                <p class="mb-0">We deliver to over 100 countries around the world. For full details of
                    the delivery options we offer, please view our <a href="#" class="text-primary">Delivery
                    information</a><br/>We hope you’ll love every
                    purchase, but if you ever need to return an item you can do so within a month of
                    receipt. For full details of how to make a return, please view our <br/><a href="#" class="text-primary">Returns information</a>
                </p>
            </div>
            <div class="tab-pane " id="product-tab-reviews">
                <div class="row">
                    <div class="col-lg-4 mb-6">
                    <div class="avg-rating-container">
                        <mark>5.0</mark>
                        <div class="avg-rating">
                            <span class="avg-rating-title">Average Rating</span>
                            <div class="ratings-container mb-0">
                                <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <span class="rating-reviews">(2 Reviews)</span>
                            </div>
                        </div>
                    </div>
                    <div class="ratings-list mb-2">
                        <div class="ratings-item">
                            <div class="ratings-container mb-0">
                                <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="rating-percent">
                                <span style="width:100%;"></span>
                            </div>
                            <div class="progress-value">100%</div>
                        </div>
                        <div class="ratings-item">
                            <div class="ratings-container mb-0">
                                <div class="ratings-full">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top">4.00</span>
                                </div>
                            </div>
                            <div class="rating-percent">
                                <span style="width:0%;"></span>
                            </div>
                            <div class="progress-value">0%</div>
                        </div>
                        <div class="ratings-item">
                            <div class="ratings-container mb-0">
                                <div class="ratings-full">
                                <span class="ratings" style="width:60%"></span>
                                <span class="tooltiptext tooltip-top">4.00</span>
                                </div>
                            </div>
                            <div class="rating-percent">
                                <span style="width:0%;"></span>
                            </div>
                            <div class="progress-value">0%</div>
                        </div>
                        <div class="ratings-item">
                            <div class="ratings-container mb-0">
                                <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top">4.00</span>
                                </div>
                            </div>
                            <div class="rating-percent">
                                <span style="width:0%;"></span>
                            </div>
                            <div class="progress-value">0%</div>
                        </div>
                        <div class="ratings-item">
                            <div class="ratings-container mb-0">
                                <div class="ratings-full">
                                <span class="ratings" style="width:20%"></span>
                                <span class="tooltiptext tooltip-top">4.00</span>
                                </div>
                            </div>
                            <div class="rating-percent">
                                <span style="width:0%;"></span>
                            </div>
                            <div class="progress-value">0%</div>
                        </div>
                    </div>
                    <a class="btn btn-dark btn-rounded submit-review-toggle" href="#">Submit
                    Review</a>
                    </div>
                    <div class="col-lg-8 comments pt-2 pb-10 border-no">
                    <nav class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-item">
                                <a href="#" class="btn btn-outline btn-rounded">All Reviews</a>
                            </div>
                            <div class="toolbox-item">
                                <a href="#" class="btn btn-outline btn-rounded">With Images</a>
                            </div>
                            <div class="toolbox-item">
                                <a href="#" class="btn btn-outline btn-rounded">With Videos</a>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                <option value>Default Order</option>
                                <option value="newest" selected="selected">Newest Reviews</option>
                                <option value="oldest">Oldest Reviews</option>
                                <option value="high_rate">Highest Rating</option>
                                <option value="low_rate">Lowest Rating</option>
                                <option value="most_likely">Most Likely</option>
                                <option value="most_unlikely">Most Unlikely</option>
                                </select>
                            </div>
                        </div>
                    </nav>
                    <ul class="comments-list">
                        <li>
                            <div class="comment">
                                <figure class="comment-media">
                                <a href="#">
                                <img src="images/blog/comments/1.jpg" alt="avatar">
                                </a>
                                </figure>
                                <div class="comment-body">
                                <div class="comment-rating ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="comment-user">
                                    <span class="comment-date">by <span class="font-weight-semi-bold text-uppercase text-dark">John
                                    Doe</span> on
                                    <span class="font-weight-semi-bold text-dark">Nov 22,
                                    2018</span></span>
                                </div>
                                <div class="comment-content mb-5">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                        libero sodales leo,
                                        eget blandit nunc tortor eu nibh. Nullam mollis. Ut
                                        justo.
                                        Suspendisse potenti.
                                        Sed egestas, ante et vulputate volutpat, eros pede
                                        semper
                                        est, vitae luctus metus libero eu augue.
                                    </p>
                                </div>
                                <div class="file-input-wrappers">
                                    <img class="btn-play btn-img pwsp" src="images/products/product1.jpg" width="280" height="315" alt="product" />
                                    <img class="btn-play btn-img pwsp" src="images/products/product3.jpg" width="280" height="315" alt="product" />
                                    <a class="btn-play btn-iframe" style="background-image: url(images/product/product.jpg);background-size: cover;" href="video/memory-of-a-woman.mp4">
                                    <i class="d-icon-play-solid"></i>
                                    </a>
                                </div>
                                <div class="feeling mt-5">
                                    <button class="btn btn-link btn-icon-left btn-slide-up btn-infinite like mr-2">
                                    <i class="fa fa-thumbs-up"></i>
                                    Like (<span class="count">0</span>)
                                    </button>
                                    <button class="btn btn-link btn-icon-left btn-slide-down btn-infinite unlike">
                                    <i class="fa fa-thumbs-down"></i>
                                    Unlike (<span class="count">0</span>)
                                    </button>
                                </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="comment">
                                <figure class="comment-media">
                                <a href="#">
                                <img src="images/blog/comments/2.jpg" alt="avatar">
                                </a>
                                </figure>
                                <div class="comment-body">
                                <div class="comment-rating ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="comment-user">
                                    <span class="comment-date">by <span class="font-weight-semi-bold text-uppercase text-dark">John
                                    Doe</span> on
                                    <span class="font-weight-semi-bold text-dark">Nov 22,
                                    2018</span></span>
                                </div>
                                <div class="comment-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                        libero sodales leo, eget blandit nunc tortor eu nibh.
                                        Nullam
                                        mollis.
                                        Ut justo. Suspendisse potenti. Sed egestas, ante et
                                        vulputate volutpat,
                                        eros pede semper est, vitae luctus metus libero eu
                                        augue.
                                        Morbi purus libero,
                                        faucibus adipiscing, commodo quis, avida id, est. Sed
                                        lectus. Praesent elementum
                                        hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                        volutpat.
                                    </p>
                                </div>
                                <div class="feeling mt-5">
                                    <button class="btn btn-link btn-icon-left btn-slide-up btn-infinite like mr-2">
                                    <i class="fa fa-thumbs-up"></i>
                                    Like (<span class="count">0</span>)
                                    </button>
                                    <button class="btn btn-link btn-icon-left btn-slide-down btn-infinite unlike">
                                    <i class="fa fa-thumbs-down"></i>
                                    Unlike (<span class="count">0</span>)
                                    </button>
                                </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <nav class="toolbox toolbox-pagination justify-content-end">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <i class="d-icon-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next<i class="d-icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                </div>
                <div class="review-form-section">
                    <div class="review-overlay"></div>
                    <div class="review-form-wrapper">
                    <div class="title-wrapper text-left">
                        <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                    </div>
                    <div class="rating-form">
                        <label for="rating" class="text-dark">Your rating * </label>
                        <span class="rating-stars selected">
                        <a class="star-1" href="#">1</a>
                        <a class="star-2" href="#">2</a>
                        <a class="star-3" href="#">3</a>
                        <a class="star-4 active" href="#">4</a>
                        <a class="star-5" href="#">5</a>
                        </span>
                        <select name="rating" id="rating" required style="display: none;">
                            <option value>Rate…</option>
                            <option value="5">Perfect</option>
                            <option value="4">Good</option>
                            <option value="3">Average</option>
                            <option value="2">Not that bad</option>
                            <option value="1">Very poor</option>
                        </select>
                    </div>
                    <form action="#">
                        <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4" placeholder="Comment *" required></textarea>
                        <div class="review-medias">
                            <div class="file-input form-control image-input" style="background-image: url(images/product/placeholder.png);">
                                <div class="file-input-wrapper"></div>
                                <label class="btn-action btn-upload" title="Upload Media">
                                <input type="file" accept=".png, .jpg, .jpeg" name="riode_comment_medias_image_1">
                                </label>
                                <label class="btn-action btn-remove" title="Remove Media">
                                </label>
                            </div>
                            <div class="file-input form-control image-input" style="background-image: url(images/product/placeholder.png);">
                                <div class="file-input-wrapper"></div>
                                <label class=" btn-action btn-upload" title="Upload Media">
                                <input type="file" accept=".png, .jpg, .jpeg" name="riode_comment_medias_image_2">
                                </label>
                                <label class="btn-action btn-remove" title="Remove Media">
                                </label>
                            </div>
                            <div class="file-input form-control video-input" style="background-image: url(images/product/placeholder.png);">
                                <video class="file-input-wrapper" controls></video>
                                <label class="btn-action btn-upload" title="Upload Media">
                                <input type="file" accept=".avi, .mp4" name="riode_comment_medias_video_1">
                                </label>
                                <label class="btn-action btn-remove" title="Remove Media">
                                </label>
                            </div>
                        </div>
                        <p>Upload images and videos. Maximum count: 3, size: 2MB</p>
                        <button type="submit" class="btn btn-primary btn-rounded">Submit<i class="d-icon-arrow-right"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        {{--  --}}
        </div>
        <div class="container">
            <h1 style="font-size: 100%; text-align:center">
                Order this <a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a> From <a href="{{url('/')}}/">Sound Wave Audio - The Best Vehicle Audio Solutions in Kenya</a> From as Low as {{$Product->price}}
                and get the best after sell services. Feel free to check out more offer in  <?php $Category = DB::table('category')->where('id',$Product->cat)->get(); ?>
                @foreach($Category as $cat)
                <a  href="{{url('/')}}/products/{{$cat->slung}}">{{$cat->cat}}</a>
                @endforeach
            </h1>
        </div>
    </div>
  </main>
@endforeach
@endsection
