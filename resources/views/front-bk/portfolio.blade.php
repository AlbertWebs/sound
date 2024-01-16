@extends('front.master')
@section('content')
<main class="main">

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Portfolio</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{url('/')}}/products/shop-by-brand">Brands</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">{{$page_name}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
        <div class="container   ">


            <div class="row entry-container max-col-3 " data-layout="fitRows">
                @foreach($Products as $Pro)
                <div class="entry-item lifestyle fashion col-sm-6 col-lg-4" style="padding-bottom:20px">
                    <article class="entry entry-grid text-center" style="border:2px solid #E8E8E8;">
                        <figure class="entry-media">
                            <div class="owl-carousel owl-simple owl-light owl-nav-inside entry-slider" data-toggle="owl">
                                @if($Pro->image_one == 'null' or $Pro->image_one == '')

                                @else
                                <a href="#">
                                    <img style="min-height:289px;" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_one}}" alt="image desc">
                                </a>
                                @endif

                                @if($Pro->image_two == 'null' or $Pro->image_two == '')

                                @else
                                <a href="#">
                                    <img style="min-height:289px;" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_two}}" alt="image desc">
                                </a>
                                @endif

                                @if($Pro->image_three == 'null' or $Pro->image_three == '')

                                @else
                                <a href="#">
                                    <img style="min-height:289px;" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_three}}" alt="image desc">
                                </a>
                                @endif


                                @if($Pro->image_four == 'null' or $Pro->image_four == '')

                                @else
                                <a href="#">
                                    <img style="min-height:289px;" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_four}}" alt="image desc">
                                </a>
                                @endif

                            </div><!-- End .owl-carousel -->
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">


                            <h2 class="entry-title">
                                <a href="{{url('/')}}/our-portfolio/{{$Pro->id}}" style="font-size:15px;">{{$Pro->title}}</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="#"><?php $Service = DB::table('services')->where('id',$Pro->service)->get() ?>@foreach($Service as $ser) {{$ser->title}} @endforeach</a>
                                {{-- <a href="#">Lifestyle</a> --}}
                            </div><!-- End .entry-cats -->

                            <div class="entry-content" style="min-height: 220px;">

                                {!!\Illuminate\Support\Str::limit(htmlspecialchars_decode($Pro->content),1000,"...")!!}

                                {{-- <a href="single.html" class="read-more">Continue Reading</a> --}}
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->
                @endforeach


            </div><!-- End .entry-container -->

            <nav aria-label="Page navigation">
               <?php echo $Products ?>
            </nav>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
