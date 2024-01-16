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
                    Contact Us
                </li>
            </ol>
        </div>
    </nav>

    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.266044126078!2d36.827792!3d-1.2839931!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x69ba04f279949126!2sCrystal%20Car%20Audio!5e0!3m2!1sen!2ske!4v1648821969454!5m2!1sen!2ske" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <?php $SiteSettings = DB::table('sitesettings')->get() ?>
    @foreach ($SiteSettings as $Settings)
    <div class="container contact-us-container">
        <div class="contact-info">
            <div class="row">
                <div class="col-12">
                    <h2 class="ls-n-25 m-b-1">
                        Why choose Us
                    </h2>

                    <p>
                       {!!html_entity_decode($Settings->welcome)!!}
                    </p>
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
