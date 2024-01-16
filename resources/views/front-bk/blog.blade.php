<div class="container">


    <div class="blog-section font2 media-with-zoom appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="250">
        <div class="heading">
            <h2 class="text-uppercase">FROM THE BLOGS</h2>
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

            <?php $Blog = DB::table('blogs')->limit('4')->orderBy('id','DESC')->get(); ?>
            @foreach($Blog as $blog)
            <article class="post mb-3">
                <div class="post-box">
                    <div class="post-media">
                        <a href="{{$blog->link}}">
                            <img src="{{url('/')}}/uploads/blogs/{{$blog->image_one}}" data-zoom-image="{{url('/')}}/uploads/blogs/{{$blog->image_one}}" width="354" height="181" alt="Post">
                        </a>
                        <span class="prod-full-screen">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <div class="post-meta">
                            <span class="meta-date"><i class="far fa-calendar-alt"></i>{{date('M', strtotime($blog->created_at))}} {{date('d', strtotime($blog->created_at))}},
                                {{date('Y', strtotime($blog->created_at))}}</span>
                            <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                    title="Posts by John Doe" rel="author">Christine Nyabuto</a></span>

                        </div>

                        <h2 class="post-title">
                            <a href="{{$blog->link}}">{{$blog->title}}</a>
                        </h2>

                        <div class="post-content">
                            <p>
                                {{$blog->meta}}
                            </p>

                            <a style="border:2px solid #1DA098" href="{{$blog->link}}" class="btn btn-borders btn-rounded btn-outline ls-25">read more...</a>
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
    <!-- End .related-posts -->

    <div class="info-boxes-container row row-joined appear-animate" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="100">
        <div class="info-box info-box-icon-left col-lg-4">
            <i class="icon-shipping"></i>

            <div class="info-box-content">
                <h4>FREE SHIPPING &amp; RETURN</h4>
                <p class="text-body">Free shipping on all orders over $99.</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->

        <div class="info-box info-box-icon-left col-lg-4">
            <i class="icon-money"></i>

            <div class="info-box-content">
                <h4>MONEY BACK GUARANTEE</h4>
                <p class="text-body">100% money back guarantee</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->

        <div class="info-box info-box-icon-left col-lg-4">
            <i class="icon-support"></i>

            <div class="info-box-content">
                <h4>ONLINE SUPPORT 24/7</h4>
                <p class="text-body">Lorem ipsum dolor sit amet.</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->
    </div>
    <!-- End .instagram-section -->
</div>
