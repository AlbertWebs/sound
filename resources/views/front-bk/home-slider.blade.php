<?php $Slider = DB::table('product')->where('slider','1')->limit('10')->get(); ?>
<div class="intro-slider slide-animate owl-carousel owl-theme show-nav-hover nav-inside nav-big"
        data-owl-options="{
        'loop': false,
        'dots': false,
        'nav': true
    }">
        @foreach($Slider as $slide)

                <div class="banner intro-slide2" style="background: url({{asset('theme/assets/images/demoes/demo42/slider/slide2.jpg')}}) rgb(255, 255, 255); min-height: 530px; background-position: left center; background-repeat: no-repeat;">
                    <div class="container">
                        <div class="wrapper">
                            <svg class="custom-svg-2" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
                                <path fill="#FFF"
                                    d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
                                    L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z">
                                </path>
                                <path class="appear-animate appear-animate-svg" data-animation-name="customLineAnim"
                                    data-animation-duration="5000" fill="none" stroke="#222529" stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603"
                                    style="animation-delay: 300ms; animation-duration: 5s;"></path>
                            </svg>
                        </div>
                        <div class="row h-100">
                            <div class="col-md-7">
                                <div class="banner-content banner-layer-middle text-right">
                                    <div class=" appear-animate" data-animation-name="fadeInRightShorter"
                                        data-animation-delay="500">
                                        <div class="brand-logo px-3 mb-1">
                                            <?php $Brand = DB::table('brands')->where('name',$slide->brand)->get(); ?>
                                            @foreach ($Brand as $item)
                                            <h6 style="color:#ffffff; padding:5px;">{{$item->name}}</h6>
                                            @endforeach

                                        </div>
                                        <h3 class="banner-subtitle pt-1 mb-1">{{$slide->meta}}</h3>
                                        <h2 class="banner-title pb-1">{{$slide->name}}</h2>



                                        <?php $SubTotal = $slide->price; ?>
                                        @if (session()->has('rates'))

                                        <?php
                                        $rates = Session::get('rates');
                                        $Rates = DB::table('rates')->where('rates', $rates)->get();
                                        ?>

                                        @foreach ($Rates as $rt)
                                        <h5 class="text-price align-top align-left">
                                            Starting At {{$rt->symbol}}<strong class="font-weight-bold"><?php $total = ceil($SubTotal) * $rt->rates; echo ceil($total) ?></strong>
                                        </h5>
                                        @endforeach

                                        @else
                                        <h5 class="text-price align-top align-left">
                                            Starting At ksh<strong class="font-weight-bold">{{$SubTotal}}</strong>
                                        </h5>
                                        @endif
                                        <ul class="info-list mr-0">
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Better Heat Dissipation
                                                </div>
                                            </li>
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Complete Bolt-On Kit
                                                </div>
                                            </li>
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Made in the USA
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="banner-action">
                                            <a href="{{url('/')}}/product/{{$slide->slung}}"
                                                class="btn btn-primary btn-rounded btn-icon-right" role="button">Shop
                                                Now
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 banner-media appear-animate d-none d-md-block "
                                data-animation-name="fadeInLeftShorter">
                                <img src="{{url('/')}}/uploads/product/{{$slide->thumbnail}}" width="504" height="347"
                                    alt="{{$slide->name}}" />
                                <div style="background:#f26100" class="mark-deal"><i>%
                                        Deal</i></div>
                            </div>

                        </div>
                    </div>
                </div>

        @endforeach



    </div>
    {{-- End Slider --}}

