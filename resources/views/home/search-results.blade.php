@extends('layout.home')

@section('title', 'Search Results')

@section('content')
    <section class="section-wrap relative testimonials bg-parallax overlay"
        style="background-image:url(/front/img/testimonials/testimonial_bg.jpg);">
        <div class="container relative">
            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2 class="heading white bottom-line">Hasil Pencarian: </h2>
                </div>
            </div>
        </div>
    </section> <!-- end testimonials -->

    <!-- Catalogue -->
    <section class="section-wrap pt-80 pb-40 catalogue">
        <div class="container relative">
            <div class="row items-grid">
                @foreach ($products as $product)
                    <div class="col-md-3 col-xs-6">
                        <div class="product-item hover-trigger">
                            <div class="product-img">
                                <a href="/product/{{ $product->id }}">
                                    <img src="/uploads/{{ $product->foto }}" alt="{{ $product->nama_produk }}">
                                </a>
                                <div class="hover-overlay">
                                    <div class="product-details valign">
                                        <span class="category">
                                            {{ $product->subcategory->nama_subkategori }}
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
                                                <span>Lihat Detail</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrap clearfix">
                <p class="result-count">
                    Menampilkan: {{ $products->firstItem() }} - {{ $products->lastItem() }} dari {{ $products->total() }} hasil
                </p>
                @if ($products->hasPages())
                    <nav class="pagination right clearfix">
                        {{-- Tombol Previous --}}
                        @if ($products->onFirstPage())
                            <span class="disabled"><i class="fa fa-angle-left"></i></span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="page-numbers"><i class="fa fa-angle-left"></i></a>
                        @endif

                        {{-- Halaman --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <span class="page-numbers current">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Tombol Next --}}
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="page-numbers"><i class="fa fa-angle-right"></i></a>
                        @else
                            <span class="disabled"><i class="fa fa-angle-right"></i></span>
                        @endif
                    </nav>
                @endif
            </div>
        </div> <!-- end container -->
    </section> <!-- end catalog -->
@endsection
