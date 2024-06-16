@extends('layouts.app-public')
@section('title', 'Home')
@section('content')
    <div class="site-wrapper-reveal">
        <div class="hero-box-area">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <!-- Hero Slider Area Start -->
                        <div class="hero-area" id="product-preview">
                        </div>
                        <!-- Hero Slider Area End -->
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us-area section-space--ptb_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-us-content_6 text-center">
                            <h2>Skincare&nbsp;&nbsp;Store</h2>
                            <p>
                                <small>
                                Apakah Anda mencari inovasi perawatan kulit terbaik, solusi terbaik yang tak lekang oleh waktu, atau produk-produk tersembunyi yang jarang diketahui, koleksi kami yang dikurasi dengan hati-hati memiliki sesuatu untuk setiap orang. Staf kami yang bersemangat untuk membantu Anda menemukan produk yang sempurna, dan lingkungan kami yang nyaman dan ramah mengundang Anda untuk tinggal dan menjelajah. Perbincangan dengan komunitas penggemar perawatan kulit kami dan biarkan kami membantu Anda. Kunjungi kami hari ini dan rasakan kebahagiaan menemukan rutinitas perawatan kulit yang sempurna untuk Anda. &#10084;
                                </small>
                            </p>
                            <p class="mt-5">Find your window to the world! Or, even, <span class="text-color-primary">unlock hidden worlds, one page at a time!</span> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Video Area Start -->
        <div class="banner-video-area overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-video-box">
                            <img src="https://tse2.mm.bing.net/th?id=OIP.Yt8PL5FLVRXOstLEJOdYhgHaEK&pid=Api&P=0&h=180" alt="">
                            <div class="video-icon">
                                <a href="https://cdn.pixabay.com/video/2022/01/03/103255-662114536_large.mp4" class="popup-youtube"><i class="linear-ic-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Video Area End -->

        <!-- Our Brand Area Start -->
        <div class="our-brand-area section-space--pb_90">
            <div class="container">
                <div class="brand-slider-active">
                    @php
                        $partner_count = 8;
                    @endphp
                    @for($i = 1;$i<=$partner_count;$i++)
                        <div class="col-lg-12">
                            <div class="single-brand-item">
                                <a href="#"><img src="assets/images/brand/partnerb{{$i}}.jpg" class="img-fluid" alt="Partner Images"></a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <!-- Our Brand Area End -->

        <!-- Our Member Area Start -->
        <div class="our-member-area section-space--pb_120">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="member--box">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-4">
                                    <div class="section-title small-mb__40 tablet-mb__40">
                                        <h4 class="section-title">Join the community!</h4>
                                        <p>Become one of the member and get discount 50% off</p>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <div class="member-wrap">
                                        <form action="#" class="member--two">
                                            <input class="input-box" type="text" placeholder="Your email address">
                                            <button class="submit-btn"><i class="icon-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Member Area End -->

    </div>
@endsection
@section('addition_css')
@endsection
@section('addition_script')
    <script src="{{asset('pages/js/home.js')}}"></script>
@endsection