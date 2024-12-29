@extends('layout.home')

@section('title', 'Product')

@section('content')

    <section class="section-wrap relative testimonials bg-parallax overlay"
        style="background-image:url(/front/img/testimonials/testimonial_bg.jpg);">
        <div class="container relative">

            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2 class="heading white bottom-line">{{ $product->nama_produk }}</h2>
                </div>
            </div>
        </div>
    </section> <!-- end testimonials -->

    <!-- Single Product -->
    <section class="section-wrap pb-40 single-product">
        <div class="container-fluid semi-fluid">
            <div class="row">

                <div class="col-md-6 col-xs-12 product-slider mb-60">

                    <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

                        <div class="gallery-cell">
                            <a href="/uploads/{{ $product->foto }}" class="lightbox-img">
                                <img src="/uploads/{{ $product->foto }}" alt="" />
                                <i class="ui-zoom zoom-icon"></i>
                            </a>
                        </div>
                        <div class="gallery-cell">
                            <a href="/uploads/{{ $product->foto }}" class="lightbox-img">
                                <img src="/uploads/{{ $product->foto }}" alt="" />
                                <i class="ui-zoom zoom-icon"></i>
                            </a>
                        </div>
                        <div class="gallery-cell">
                            <a href="/uploads/{{ $product->foto }}" class="lightbox-img">
                                <img src="/uploads/{{ $product->foto }}" alt="" />
                                <i class="ui-zoom zoom-icon"></i>
                            </a>
                        </div>
                        <div class="gallery-cell">
                            <a href="/uploads/{{ $product->foto }}" class="lightbox-img">
                                <img src="/uploads/{{ $product->foto }}" alt="" />
                                <i class="ui-zoom zoom-icon"></i>
                            </a>
                        </div>
                        <div class="gallery-cell">
                            <a href="/uploads/{{ $product->foto }}" class="lightbox-img">
                                <img src="/uploads/{{ $product->foto }}" alt="" />
                                <i class="ui-zoom zoom-icon"></i>
                            </a>
                        </div>
                    </div> <!-- end gallery main -->

                    <div class="gallery-thumbs">
                        <div class="gallery-cell">
                            <img src="/uploads/{{ $product->foto }}" alt="" />
                        </div>
                        <div class="gallery-cell">
                            <img src="/uploads/{{ $product->foto }}" alt="" />
                        </div>
                        <div class="gallery-cell">
                            <img src="/uploads/{{ $product->foto }}" alt="" />
                        </div>
                        <div class="gallery-cell">
                            <img src="/uploads/{{ $product->foto }}" alt="" />
                        </div>
                        <div class="gallery-cell">
                            <img src="/uploads/{{ $product->foto }}" alt="" />
                        </div>
                    </div> <!-- end gallery thumbs -->

                </div> <!-- end col img slider -->

                <div class="col-md-6 col-xs-12 product-description-wrap">
                    <ol class="breadcrumb">
                        <li>
                            <a href="/">Beranda</a>
                        </li>
                        <li>
                            <a
                                href="/products/{{ $product->id_subkategori }}">{{ $product->subcategory->nama_subkategori }}</a>
                        </li>
                        <li class="active">
                            Katalog
                        </li>
                    </ol>
                    <h1 class="product-title">{{ $product->nama_produk }}</h1>
                    <span class="price">
                        <ins>
                            <span class="amount">Rp. {{ number_format($product->harga) }}</span>
                        </ins>
                    </span>
                    <p class="short-description">{{ $product->deskripsi }}</p>
                    <div class="product-actions">
                        <span>Jumlah / gram:</span>

                        <div class="quantity buttons_added">
                            <input type="number" step="1" min="0" value="1" title="Qty"
                                class="input-text jumlah qty text" />
                            <div class="quantity-adjust">
                                <a href="#" class="plus">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                                <a href="#" class="minus">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>
                        </div>

                        <a href="#" class="btn btn-dark btn-lg add-to-cart"><span>Masukkan ke Keranjang</span></a>
                    </div>


                    <div class="product_meta">
                        <span class="brand_as">Kategori: <a
                                href="#">{{ $product->category->nama_kategori }}</a></span>
                    </div>

                    <!-- Accordion -->
                    <div class="panel-group accordion mb-50" id="accordion">
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                    class="minus">Deskripsi<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{ $product->deskripsi }}
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                    class="plus">Info<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body" style="margin-bottom: 30px">
                                    <table class="table shop_attributes">
                                        <tbody>
                                            <tr>
                                                <th>Stok:</th>
                                                <td>{{ $product->stok }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="add-rating-form mt-30" style="margin-top: 30px">
                            <h3>Berikan Ulasan</h3>
                            <form action="{{ route('add.rating') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <div class="rating-input">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" name="rating" id="rating-{{ $i }}"
                                                value="{{ $i }}" required>
                                            <label for="rating-{{ $i }}" class="star">★</label>
                                        @endfor
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Komentar</label>
                                    <textarea name="review" class="form-control" rows="4" placeholder="Tulis review Anda"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                            </form>
                        </div>

                        <style>
                            .rating-input {
                                display: flex;
                                flex-direction: row-reverse;
                                justify-content: flex-start;
                            }

                            .rating-input input[type="radio"] {
                                display: none;
                            }

                            .rating-input label {
                                font-size: 30px;
                                color: #d1d5db;
                                cursor: pointer;
                                transition: color 0.3s;
                            }

                            .rating-input label:hover,
                            .rating-input label:hover~label {
                                color: #fbbf24;
                            }

                            .rating-input input[type="radio"]:checked~label {
                                color: #fbbf24;
                            }
                        </style>

                    </div>
                </div> <!-- end col product description -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end single product -->
    <div class="container">
        <div class="container-er"
            style="background-color: #f3f4f6; font-family: Arial, sans-serif; margin: 0; padding: 20px;">
            <div class="header" style="background-color: #d1d5db; padding: 16px; text-align: left; border-radius: 8px;">
                <h1 style="font-size: 1.5rem; font-weight: bold; margin: 0;">Ulasan Produk</h1>
            </div>

            <div class="reviews" style="margin-top: 20px;">
                <?php
                use App\Models\Review;
                $productReviews = Review::with('member')
                    ->where('id_produk', $product->id)
                    ->get();
                ?>

                <?php foreach ($productReviews as $review): ?>
                <div class="review"
                    style="
                    background-color: #fff;
                    border-radius: 8px;
                    margin-bottom: 16px;
                    padding: 16px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <!-- Stars Section -->
                    <div class="stars" style="margin-bottom: 8px;">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span
                            style="color: <?= $i <= $review->rating ? '#fbbf24' : '#d1d5db' ?>; font-size: 20px;">&#9733;</span>
                        <?php endfor; ?>
                    </div>
                    <h4 class="review-title">Review dari <?= htmlspecialchars($review->member->nama_member) ?></h2>
                        <p class="review-body"><?= htmlspecialchars($review->review) ?></p>
                        <!-- Reviewer Information -->
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                            <img src="https://via.placeholder.com/40" alt="Reviewer"
                                style="width: 40px; height: 40px; border-radius: 50%; margin-right: 12px;">
                            <div>
                                <p style="margin: 0; font-weight: bold; color: #374151; font-size: 0.875rem;">
                                    <?= htmlspecialchars($review->member->nama_member ?? 'Reviewer name') ?>
                                </p>
                                <p style="margin: 0; color: #6b7280; font-size: 0.75rem;">
                                    <?= $review->created_at->format('d M Y') ?>
                                </p>
                            </div>
                        </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <style>
        @media (max-width: 768px) {
            .container-er {
                padding: 10px;
            }

            .review {
                padding: 12px;
            }

            h1 {
                font-size: 1.25rem;
            }

            h2 {
                font-size: 1rem;
            }

            p {
                font-size: 0.875rem;
            }
        }
    </style>

    <!-- Related Products -->
    <section class="section-wrap pt-0 shop-items-slider" style="margin-top: 30px">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <h2 class="heading bottom-line">
                        Produk Terbaru
                    </h2>
                </div>
            </div>

            <div class="row">

                <div id="owl-related-items" class="owl-carousel owl-theme">
                    @foreach ($latest_products as $produk)
                        <div class="product">
                            <div class="product-item hover-trigger">
                                <div class="product-img">
                                    <a href="/product/{{ $produk->id }}">
                                        <img src="/uploads/{{ $produk->foto }}" alt="">
                                        <img src="/uploads/{{ $produk->foto }}" alt="" class="back-img">
                                    </a>
                                    <div class="product-label">
                                        <span class="sale">sale</span>
                                    </div>
                                    <div class="hover-2">
                                        <div class="product-actions">
                                            <a href="#" class="product-add-to-wishlist">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="/product/{{ $produk->id }}" class="product-quickview">More</a>
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">
                                        <a href="/product/{{ $produk->id }}">{{ $produk->nama_produk }}</a>
                                    </h3>
                                    <span class="category">
                                        <a
                                            href="/products/{{ $produk->id_subkategori }}">{{ $produk->subcategory->nama_subkategori }}</a>
                                    </span>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="amount">Rp. {{ number_format($produk->harga) }}</span>
                                    </ins>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- end slider -->

            </div>
        </div>
    </section> <!-- end related products -->

@endsection


@push('js')
    <script>
        $(function() {
            $('.add-to-cart').click(function(e) {
                // Check if user is authenticated
                @guest('webmember')
                    // If not logged in, redirect to login page
                    window.location.href = "/login_member";
                    return false; // Prevent further execution
                @else
                    // User is logged in, proceed with adding to cart
                    id_member = {{ Auth::guard('webmember')->user()->id }};
                    id_produk = {{ $product->id }};
                    jumlah = $('.jumlah').val();
                    total = {{ $product->harga }} * jumlah;
                    is_checkout = 0;

                    $.ajax({
                        url: '/add_to_cart',
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        data: {
                            id_member,
                            id_produk,
                            jumlah,
                            total,
                            is_checkout,
                        },
                        success: function(data) {
                            window.location.href = '/cart';
                        }
                    });
                @endguest
            });
        });
    </script>
@endpush
