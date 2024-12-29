@extends('layout.home')

@section('content')
    <!-- Hero Slider -->
    <section class="hero-wrap text-center relative">
        <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated">
            @foreach ($sliders as $slider)
                <div class="hero-slide overlay" style="background-image:url(/uploads/{{ $slider->foto }})">
                    <div class="container">
                        <div class="hero-holder">
                            <div class="hero-message" data-aos="fade-up">
                                <h1 class="hero-title nocaps">{{ $slider->nama_slider }}</h1>
                                <h2 class="hero-subtitle lines">{{ $slider->deskripsi }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section> <!-- end hero slider -->

    <section class="section-wrap-sm new-arrivals pb-50" style="margin-top: 50px" data-aos="fade-up">
        <div class="container">

            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading">Terbaru di toko</span>
                    <h2 class="heading bottom-line">
                        produk terbaru
                    </h2>
                </div>
            </div>

            <div class="row items-grid">
                @foreach ($products->take(4) as $product)
                    <div class="col-md-3 col-xs-6">
                        <div class="product-item hover-trigger">
                            <div class="product-img">
                                <a href="/front/shop-single.html">
                                    <img src="/uploads/{{ $product->foto }}" alt="">
                                </a>
                                <div class="hover-overlay">

                                    <div class="product-details valign">
                                        <span class="category">
                                            <a
                                                href="/products/{{ $product->id_subkategori }}">{{ $product->subcategory->nama_subkategori }}</a>
                                        </span>
                                        <h3 class="product-title">
                                            <a href="/product/{{ $product->id }}">{{ $product->nama_produk }}</a>
                                        </h3>
                                        <span class="price">
                                            <ins>
                                                <span class="amount">Rp. {{ number_format($product->harga) }}</span>
                                            </ins>
                                        </span>
                                        <div class="btn-quickview">
                                            <a href="/product/{{ $product->id }}" class="btn btn-md btn-color">
                                                <span>More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- end row -->
        </div>
    </section> <!-- end trendy products -->



    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <section class="about-section">
            <!-- Judul Bagian -->
            <h2 class="section-title heading bottom-line" style="text-align: center; font-size: 28px; font-weight: bold; margin-bottom: 10px;">
                Sedikit Tentang Kami
            </h2>
            {{-- <div class="title-underline"
                style="width: 60px; height: 4px; background-color: black; margin: 0 auto 20px;">
            </div> --}}
    
            <!-- Kontainer Flexbox -->
            <div class="about-content"
                style="display: flex; align-items: center; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <!-- Foto di Kiri -->
                <div class="about-image"
                    style="width: 100%; max-width: 400px; height: auto; border-radius: 8px;">
                    <img src="/front/about.jpg" alt="About Us Image" style="width: 80%; height: auto; border-radius: 8px;">
                </div>
    
                <!-- Teks di Kanan -->
                <div class="about-text"
                    style="flex: 1; text-align: justify; line-height: 1.6; font-size: 16px; color: #333;">
                    <p>
                        {{ $about->deskripsi }}
                    </p>
                </div>
            </div>
        </section>
    </div>

   
    <!-- Promo Banners -->
    <section class="section-wrap promo-banners pb-30">

        <div class="row heading-row">
            <div class="col-md-12 text-center">
                <span class="subheading">Kategori yang ada</span>
                <h2 class="heading bottom-line">
                    kategori produk
                </h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-xs-4 col-xxs-12 mb-30 promo-banner">
                        <a href="/products_category/{{ $category->id }}">
                            <img src="/uploads/{{ $category->foto }}" alt="">
                            <div class="overlay"></div>
                            <div class="promo-inner valign">
                                <h2>{{ $category->nama_kategori }}</h2>
                                <span>{{ $category->deskripsi }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section> <!-- end promo banners -->


    <!-- Trendy Products -->
    <section class="section-wrap-sm new-arrivals pb-50">
        <div class="container">

            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading">Terbaru di toko</span>
                    <h2 class="heading bottom-line">
                        produk terbaru
                    </h2>
                </div>
            </div>

            <div class="row items-grid">
                @foreach ($products as $product)
                    <div class="col-md-3 col-xs-6">
                        <div class="product-item hover-trigger">
                            <div class="product-img">
                                <a href="/front/shop-single.html">
                                    <img src="/uploads/{{ $product->foto }}" alt="">
                                </a>
                                <div class="hover-overlay">

                                    <div class="product-details valign">
                                        <span class="category">
                                            <a
                                                href="/products/{{ $product->id_subkategori }}">{{ $product->subcategory->nama_subkategori }}</a>
                                        </span>
                                        <h3 class="product-title">
                                            <a href="/product/{{ $product->id }}">{{ $product->nama_produk }}</a>
                                        </h3>
                                        <span class="price">
                                            <ins>
                                                <span class="amount">Rp. {{ number_format($product->harga) }}</span>
                                            </ins>
                                        </span>
                                        <div class="btn-quickview">
                                            <a href="/product/{{ $product->id }}" class="btn btn-md btn-color">
                                                <span>More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- end row -->
        </div>
    </section> <!-- end trendy products -->

    <section class="text-center my-8 px-4" style="margin-bottom: 50px">
        <div class="btn-quickview">
            <a href="/produk_tampil" class="btn btn-md btn-color">
                <span>Lainnya</span>
            </a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-wrap relative testimonials bg-parallax overlay"
        style="background-image:url(/front/img/testimonials/testimonial_bg.jpg);">
        <div class="container relative">

            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2 class="heading white bottom-line">WarKo, Doa Petani Menyertai</h2>
                </div>
            </div>

            <div id="owl-testimonials" class="owl-carousel owl-theme text-center">
                @foreach ($testimonies as $testimony)
                    <div class="item">
                        <div class="testimonial">
                            <p class="testimonial-text">{{ $testimony->deskripsi }}</p>
                            <span>{{ $testimony->nama_testimoni }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section> <!-- end testimonials -->



@endsection
