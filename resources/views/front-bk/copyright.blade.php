@extends('front.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/')}}"><i class="icon-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Copyright Statement
                </li>
            </ol>
        </div>
    </nav>


    <?php $SiteSettings = DB::table('sitesettings')->get() ?>
    @foreach ($SiteSettings as $Settings)
    <div class="container contact-us-container">
        <div class="contact-info">
            <div class="row">
                <div class="col-12">
                    <h2 class="ls-n-25 m-b-1">
                        Copyright Statement
                    </h2>

                    @foreach ($Copyright as $copy)
                    <p>
                       {!!html_entity_decode($copy->content)!!}
                    </p>
                    @endforeach
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="sicon-location-pin"></i>
                        <div class="feature-box-content">
                            <h3>Address</h3>
                            <h5>{{$Settings->location}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="fa fa-mobile-alt"></i>
                        <div class="feature-box-content">
                            <h3>Phone Number</h3>
                            <h5>{{$Settings->mobile}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="far fa-envelope"></i>
                        <div class="feature-box-content">
                            <h3>E-mail Address</h3>
                            <h5>{{$Settings->email}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="far fa-calendar-alt"></i>
                        <div class="feature-box-content">
                            <h3>Working Days/Hours</h3>
                            <h5>Mon - Sat / 8:00 AM - 6:00 PM Sun 9:00 AM-1:00 PM</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="mb-8"></div>
</main>
@endsection
