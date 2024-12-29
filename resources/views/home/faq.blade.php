@extends('layout.home')

@section('content')
<!-- Hero Slider -->
<section class="hero-wrap text-center relative">
    <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated">
        @foreach ($sliders as $slider)
        <div class="hero-slide overlay" style="background-image:url(/uploads/{{$slider->gambar}})">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps">{{$slider->nama_slider}}</h1>
                        <h2 class="hero-subtitle lines">{{$slider->deskripsi}}</h2>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section> <!-- end hero slider -->

<!-- Promo Banners -->
<section class="section-wrap promo-banners pb-30">@extends('layout.home')

    @section('title', 'FAQ')
    
    @section('content')
    <!-- FAQ -->
    <section class="section-wrap faq">
        <div class="container">
            <div class="row">
    
                <div class="col-sm-9">
                    <h2 class="mb-20"><small>delivery questions</small></h2>
    
                    <div class="panel-group accordion mb-50" id="accordion-1">
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1" class="minus">how to
                                    track my delivery?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    Our Theme is a very slick and clean e-commerce template with endless possibilities.
                                    Creating an awesome website. Canna Theme is a very slick and clean e-commerce template
                                    with endless possibilities.
                                </div>
                            </div>
                        </div>
    
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2" class="plus">where
                                    can I find tracking number?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We possess within us two minds. So far I have written only of the conscious mind. I
                                    would now like to introduce you to your second mind, the hidden and mysterious
                                    subconscious. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.And finally the subconscious is the mechanism through which
                                    thought impulses which are repeated regularly with feeling and emotion are quickened,
                                    charged. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.
                                </div>
                            </div>
                        </div>
    
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-3" class="plus">what
                                    delivery methods can I use?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We possess within us two minds. So far I have written only of the conscious mind. I
                                    would now like to introduce you to your second mind, the hidden and mysterious
                                    subconscious. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.And finally the subconscious is the mechanism through which
                                    thought impulses which are repeated regularly with feeling and emotion are quickened,
                                    charged. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.
                                </div>
                            </div>
                        </div>
                    </div> <!-- end accordion -->
    
    
                    <h2 class="mb-20 mt-80"><small>payment questions</small></h2>
    
                    <div class="panel-group accordion mb-50" id="accordion-2">
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-4" class="minus">what
                                    payment methods do you accept?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    Our Theme is a very slick and clean e-commerce template with endless possibilities.
                                    Creating an awesome website. Canna Theme is a very slick and clean e-commerce template
                                    with endless possibilities.
                                </div>
                            </div>
                        </div>
    
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-5" class="plus">how to
                                    pay via credit card?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We possess within us two minds. So far I have written only of the conscious mind. I
                                    would now like to introduce you to your second mind, the hidden and mysterious
                                    subconscious. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.And finally the subconscious is the mechanism through which
                                    thought impulses which are repeated regularly with feeling and emotion are quickened,
                                    charged. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.
                                </div>
                            </div>
                        </div>
    
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-6" class="plus">what
                                    credit cards do you accept?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We possess within us two minds. So far I have written only of the conscious mind. I
                                    would now like to introduce you to your second mind, the hidden and mysterious
                                    subconscious. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.And finally the subconscious is the mechanism through which
                                    thought impulses which are repeated regularly with feeling and emotion are quickened,
                                    charged. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.
                                </div>
                            </div>
                        </div>
    
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-7" class="plus">how to
                                    pay via paypal?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We possess within us two minds. So far I have written only of the conscious mind. I
                                    would now like to introduce you to your second mind, the hidden and mysterious
                                    subconscious. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.And finally the subconscious is the mechanism through which
                                    thought impulses which are repeated regularly with feeling and emotion are quickened,
                                    charged. Our subconscious mind contains such power and complexity that it literally
                                    staggers the imagination.
                                </div>
                            </div>
                        </div>
    
                    </div> <!-- end accordion -->
    
                </div> <!-- end col -->
    
                <aside class="sidebar col-sm-3">
                    <div class="contact-item">
                        <h6>Categories</h6>
                        <ul class="list-dividers">
                            <li>
                                <a href="#">Delivery</a>
                            </li>
                            <li>
                                <a href="#">Payment</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                            <li>
                                <a href="#">Common questions</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="contact-item">
                        <h6>Information</h6>
                        <ul>
                            <li>
                                <i class="fa fa-envelope"></i><a href="mailto:theme@support.com">theme@support.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i><span>+1 (800) 888 5260 52 63</span>
                            </li>
                            <li>
                                <i class="fa fa-skype"></i><span>zennashop</span>
                            </li>
                        </ul>
                    </div>
    
                </aside> <!-- end col -->
    
            </div>
        </div>
    </section> <!-- end faq -->
    @endsection
    
    <div class="container">
        <div class="row">

            @foreach ($categories as $category)
            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner">
                <a href="/front/#">
                    <img src="/uploads/{{$category->gambar}}" alt="">
                    <div class="overlay"></div>
                    <div class="promo-inner valign">
                        <h2>{{$category->nama_kategori}}</h2>
                        <span>{{$category->deskripsi}}</span>
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
                <span class="subheading">Hot items of this year</span>
                <h2 class="heading bottom-line">
                    trendy products
                </h2>
            </div>
        </div>

        <div class="row items-grid">
            @foreach ($products as $product)
            <div class="col-md-3 col-xs-6">
                <div class="product-item hover-trigger">
                    <div class="product-img">
                        <a href="/front/shop-single.html">
                            <img src="/uploads/{{$product->gambar}}" alt="">
                        </a>
                        <div class="hover-overlay">
                            <div class="product-actions">
                                <a href="/front/#" class="product-add-to-wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                            <div class="product-details valign">
                                <span class="category">
                                    <a
                                        href="/products/{{$product->id_subkategori}}">{{$product->subcategory->nama_subkategori}}</a>
                                </span>
                                <h3 class="product-title">
                                    <a href="/product/{{$product->id}}">{{$product->nama_barang}}</a>
                                </h3>
                                <span class="price">
                                    <ins>
                                        <span class="amount">Rp. {{number_format($product->harga)}}</span>
                                    </ins>
                                </span>
                                <div class="btn-quickview">
                                    <a href="/product/{{$product->id}}" class="btn btn-md btn-color">
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

<!-- Testimonials -->
<section class="section-wrap relative testimonials bg-parallax overlay"
    style="background-image:url(/front/img/testimonials/testimonial_bg.jpg);">
    <div class="container relative">

        <div class="row heading-row mb-20">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="heading white bottom-line">Happy Clients</h2>
            </div>
        </div>

        <div id="owl-testimonials" class="owl-carousel owl-theme text-center">
            @foreach ($testimonies as $testimony)

            <div class="item">
                <div class="testimonial">
                    <p class="testimonial-text">{{$testimony->deskripsi}}</p>
                    <span>{{$testimony->nama_testimoni}}</span>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section> <!-- end testimonials -->

@endsection
