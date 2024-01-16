<?php $Combo = DB::table('product')->where('combo','1')->limit(5)->get(); ?>
@if($Combo->isEmpty())

@else
<section class="category-section container">
    <div class="d-lg-flex align-items-center appear-animate" data-animation-name="fadeInLeftShorter">
        <h2 class="title title-underline divider">Shop Combo</h2>
        <a href="{{url('/')}}/products/shop-by-category" class="sicon-title">VIEW CATEGORIES<i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
        'loop': false,
        'dots': false,
        'nav': true,
        'responsive': {
            '0': {
                'items': 2
            },
            '576': {
                'items': 3
            },
            '991': {
                'items': 4
            }
        }
    }">
        @foreach ($Combo as $item)
        <div class="product-category">
            <a href="{{url('/')}}/product/{{$item->slung}}">
                <figure>
                    <img src="{{url('/')}}/uploads/product/{{$item->thumbnail}}" alt="{{$item->name}}" width="250"
                        height="250">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-titles" style="text-align:center;">{{$item->name}}</h3>
                <ul class="sub-categories">
                    {{-- {!! $item->meta !!} --}}
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
