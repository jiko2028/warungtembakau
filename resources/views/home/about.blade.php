@extends('layout.home')

@section('title', 'About')

@section('content')

<section class="section-wrap relative testimonials bg-parallax overlay"
    style="background-image:url(/front/img/testimonials/testimonial_bg.jpg);">
    <div class="container relative">

        <div class="row heading-row mb-20">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="heading white bottom-line">Lokasi Kami</h2>
            </div>
        </div>
    </div>
</section> 
    <!-- Intro -->
    <section class="section-wrap intro pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mb-50">
                    <h2 class="intro-heading">Tentang Kami</h2>
                    <p>{{ $about->deskripsi }}</p>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <span class="result">
                        <a href="/front/#"><i class="fa fa-facebook"></i></a>
                    </span>
                    <p>Facebook WarKo</p>
                    <span class="result">
                        <a href="https://www.instagram.com/warko_id/"><i class="fa fa-instagram"></i></a>
                    </span>
                    <p>Instagram WarKo</p>
                    <span class="result">
                        <a href="https://api.whatsapp.com/send/?phone=6283196646614&text&type=phone_number&app_absent=0"><i class="fa fa-whatsapp"></i></a>
                    </span>
                    <p>Whatsapp WarKo</p>
                </div>
            </div>
            <hr class="mb-0">
        </div>
    </section> <!-- end intro -->
    <section class="section-wrap testimonials">
        <div class="container">
            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <span class="subheading">Lokasi Kami</span>
                    <h2 class="heading bottom-line">Google Maps</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Google Maps Embed -->
                    <iframe src="https://www.google.com/maps/embed?pb=!4v1734175259308!6m8!1m7!1spMsM6t6K5QlOar5Mq_xW7A!2m2!1d-7.816507808627726!2d110.3760654482918!3f108!4f1.2199999999999989!5f0.6173638183087221"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section> <!-- end testimonials -->
    
@endsection
