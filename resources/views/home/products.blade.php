@extends('layout.home')

@section('title', 'List Products')

@section('content')
<section class="section-wrap relative testimonials bg-parallax overlay"
    style="background-image:url(/front/img/testimonials/testimonial_bg.jpg);">
    <div class="container relative">

        <div class="row heading-row mb-20">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="heading white bottom-line">Semua Produk {{$subcategory->nama_subkategori}}</h2>
            </div>
        </div>
    </div>
</section> <!-- end testimonials -->

<!-- Catalogue -->
<section class="section-wrap pt-80 pb-40 catalogue">
    <div class="container relative">
        <div class="row">
            <div class="col-md-12 catalogue-col right mb-50">
                <div class="shop-catalogue grid-view">

                    <div class="row items-grid">

                        @foreach ($products as $product)
                        <div class="col-md-4 col-xs-6 product product-grid">
                            <div class="product-item clearfix">
                                <div class="product-img hover-trigger">
                                    <a href="/product/{{$product->id}}">
                                        <img src="/uploads/{{$product->foto}}" alt="">
                                        <img src="/uploads/{{$product->foto}}" alt="" class="back-img">
                                    </a>
                                    <div class="hover-2">
                                        <div class="product-actions">
                                            <a href="#" class="product-add-to-wishlist">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="/product/{{$product->id}}" class="product-quickview">More</a>
                                </div>

                                <div class="product-details">
                                    <h3 class="product-title">
                                        <a href="/product/{{$product->id}}">{{$product->nama_produk}}</a>
                                    </h3>
                                    <span class="category">
                                        <a
                                            href="/products/{{$product->id_subkategori}}">{{$product->subcategory->nama_subkategori}}</a>
                                    </span>
                                </div>

                                <span class="price">
                                    <ins>
                                        <span class="amount">Rp. {{number_format($product->harga)}}</span>
                                    </ins>
                                </span>
                            </div>
                        </div> <!-- end product -->
                        @endforeach
                    </div> <!-- end row -->
                </div> <!-- end grid mode -->

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
                
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</section> <!-- end catalog -->
@endsection
