<?php
$CartItems = Cart::getContent();
?>
<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="{{url('/')}}">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{url('/')}}/products/shop-by-category" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{url('/')}}/wishlist" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{url('/')}}/products/shop-by-category" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{url('/')}}/shopping-cart" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">{{ $CartItems->count() }}</span>
            </i>Cart
        </a>
    </div>
</div>
