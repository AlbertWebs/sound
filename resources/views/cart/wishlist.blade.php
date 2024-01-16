@extends('front.master')
@section('content')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Wishlist
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>Wishlist</h1>
        </div>
    </div>

    <div class="container">
        <div class="wishlist-title">
            <h2 class="p-2">My wishlist</h2>
        </div>
        <div class="wishlist-table-container">
            <table class="table table-wishlist mb-0">
                <thead>
                    <tr>
                        <th class="thumbnail-col"></th>
                        <th class="product-col">Product</th>
                        <th class="price-col">Price</th>
                        <th class="status-col">Stock Status</th>
                        <th class="action-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::check())
                        <?php $UserID = Auth::user()->id; ?>
                        <?php
                        
                            $WishList = \javcorreia\Wishlist\Facades\Wishlist::getUserWishList($UserID);    
                        ?>
                        @foreach($WishList as $CartItem)
                        <?php
                        $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get();
                        ?>
                        @foreach($ProductsForCart as $Product)
                            <tr class="product-row">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="{{url('/')}}/product/{{$Product->slung}}" class="product-image">
                                            <img src="{{url('/')}}/uploads/product/{{$Product->thumbnail}}" alt="product">
                                        </a>

                                        <a href="{{url('/')}}/wishlist/remove-from-wishlist/{{$CartItem->item_id}}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                    </figure>
                                </td>
                                <td>
                                    <h5 class="product-title">
                                        <a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a>
                                    </h5>
                                </td>

                                @if (session()->has('rates'))

                                <?php
                                $SubTotal = $Product->price;
                                $rates = Session::get('rates');
                                $Rates = DB::table('rates')->where('rates', $rates)->get();
                                ?>

                                @foreach ($Rates as $rt)
                                <td class="price-box">{{$rt->symbol}}<?php $total = ceil($SubTotal) * $rt->rates; echo ceil($total) ?></td>
                                @endforeach

                                @else
                                
                                <td class="price-box">ksh {{$Product->price}}</td>
                                @endif
                            

                                @if($Product->stock == 'In Stock')
                                <td>
                                    <span class="stock-status">In stock</span>
                                </td>
                                @else 
                                <td>
                                    <span class="stock-status">Out of stock</span>
                                </td>
                                @endif
                                <td class="action">
                                    <a href="{{url('/')}}/product-quick-view/{{$Product->slung}}" class="btn btn-quickview mt-1 mt-md-0"
                                        title="Quick View">Quick
                                        View</a>
                                    <a href="{{url('/')}}/shopping-cart/add-to-cart/{{$Product->id}}" class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                                        ADD TO CART
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @endforeach
                    @else
                        <?php $UserIP = \Request::ip();  ?>
                        <?php
                        
                            $WishList = \javcorreia\Wishlist\Facades\Wishlist::getUserWishList($UserIP,'session');    
                        ?>
                        @foreach($WishList as $CartItem)
                        <?php
                        $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get();
                        ?>
                        @foreach($ProductsForCart as $Product)
                            <tr class="product-row">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="{{url('/')}}/product/{{$Product->slung}}" class="product-image">
                                            <img src="{{url('/')}}/uploads/product/{{$Product->thumbnail}}" alt="product">
                                        </a>

                                        <a href="{{url('/')}}/wishlist/remove-from-wishlist/{{$CartItem->item_id}}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                    </figure>
                                </td>
                                <td>
                                    <h5 class="product-title">
                                        <a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a>
                                    </h5>
                                </td>

                                @if (session()->has('rates'))

                                <?php
                                $SubTotal = $Product->price;
                                $rates = Session::get('rates');
                                $Rates = DB::table('rates')->where('rates', $rates)->get();
                                ?>

                                @foreach ($Rates as $rt)
                                <td class="price-box">{{$rt->symbol}}<?php $total = ceil($SubTotal) * $rt->rates; echo ceil($total) ?></td>
                                @endforeach

                                @else
                                
                                <td class="price-box">ksh {{$Product->price}}</td>
                                @endif
                            

                                @if($Product->stock == 'In Stock')
                                <td>
                                    <span class="stock-status">In stock</span>
                                </td>
                                @else 
                                <td>
                                    <span class="stock-status">Out of stock</span>
                                </td>
                                @endif
                                <td class="action">
                                    <a href="{{url('/')}}/product-quick-view/{{$Product->slung}}" class="btn btn-quickview mt-1 mt-md-0"
                                        title="Quick View">Quick
                                        View</a>
                                    <a href="{{url('/')}}/shopping-cart/add-to-cart/{{$Product->id}}" class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                                        ADD TO CART
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div><!-- End .cart-table-container -->
    </div><!-- End .container -->
</main><!-- End .main -->
@endsection