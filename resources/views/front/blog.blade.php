<?php $Blog = DB::table('blogs')->limit('4')->orderBy('id','DESC')->get(); ?>
@if($Blog->isEmpty())

@else

<div class="container">

    <div class="blog-section font2 media-with-zoom appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="250">
        <div class="heading">
            <h2 class="text-uppercase">News & Updates</h2>
        </div>

        <div class="owl-carousel owl-theme mb-0" data-owl-options="{
                'margin' : 20,
                'nav' : false,
                'dots' : false,
                'loop' : false,
                'responsive' : {
                    '576' : {
                        'items' : 2
                    },
                    '768' : {
                        'items' : 2
                    },
                    '992' : {
                        'items' : 3
                    }
                }
            }">
            <style>
             .post-media{
                width:100%;
                height:280px;
             }
             .post-media img{
                object-fit: cover;
             }
            </style>


            @foreach($Blog as $blog)
            <article class="post mb-3">
                <div class="post-box">
                    <div class="post-media">
                        <a href="{{url('/')}}/knowledge-base/{{$blog->slung}}">
                            <img src="{{$blog->image_one}}" data-zoom-image="{{$blog->image_one}}"  alt="Post">
                        </a>
                        <span class="prod-full-screen">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <div class="post-meta">
                            <span class="meta-date"><i class="far fa-calendar-alt"></i> &nbsp; {{date('M', strtotime($blog->created_at))}} {{date('d', strtotime($blog->created_at))}},
                                {{date('Y', strtotime($blog->created_at))}}</span>
                            <span class="meta-author"><i class="far fa-user"></i>&nbsp; By &nbsp; <a href="{{url('/')}}/knowledge-base/{{$blog->slung}}"
                                    title="Posts by John Doe" rel="author">SoundWave Audio</a></span>

                        </div>

                        <h2 class="post-title">
                            <a href="{{url('/')}}/knowledge-base/{{$blog->slung}}">{{$blog->title}}</a>
                        </h2>

                        <div class="post-content">
                            <p>
                                {{$blog->meta}}
                            </p>

                            <a style="border:2px solid #1DA098" href="{{url('/')}}/knowledge-base/{{$blog->slung}}" class="btn btn-borders btn-rounded btn-outline ls-25">read more...</a>
                        </div>
                        <!-- End .post-content -->
                    </div>
                    <!-- End .post-body -->
                </div>
            </article>
            @endforeach


        </div>
        <!-- End .owl-carousel -->
    </div>

</div>

@endif
