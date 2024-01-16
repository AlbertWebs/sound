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
                    {!!html_entity_decode($Product->content)!!}
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

    </div>
  </main>
@endforeach
@endsection
