<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Home')</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700'
        rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/front/css/magnific-popup.css" />
    <link rel="stylesheet" href="/front/css/font-icons.css" />
    <link rel="stylesheet" href="/front/css/sliders.css" />
    <link rel="stylesheet" href="/front/css/style.css" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="/front/img/favicon.ico">
    <link rel="apple-touch-icon" href="/front/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/front/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/front/img/apple-touch-icon-114x114.png">

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


</head>

<body claos="relative">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>

    <main class="main-wrapper">

        <header class="nav-type-1">

            <!-- Pencarian layar penuh -->
            <div class="search-wrap">
                <div class="search-inner">
                    <div class="search-cell">
                        <form method="get" action="{{route('search')}}">
                            <div class="search-field-holder">
                                <input type="search" class="form-control main-search-input" placeholder="Cari" value="{{ request()->input('search') }}">
                                <i class="ui-close search-close" id="search-close"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- akhir pencarian layar penuh -->

            <nav class="navbar navbar-static-top">
                <div class="navigation" id="sticky-nav">
                    <div class="container relative">

                        <div class="row flex-parent">

                            <div class="navbar-header flex-child">
                                <!-- Logo -->
                                <div class="logo-container">
                                    <div class="logo-wrap">
                                        <a href="/">
                                            @php
                                            $about = App\Models\About::first();
                                            @endphp
                                            <img class="logo-dark2" src="/uploads/{{$about->logo}}" alt="logo" style="width: 50px">
                                        </a>
                                    </div>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse">
                                    <span class="sr-only">Buka navigasi</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Keranjang Mobile -->
                                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                                    <div class="nav-cart-outer">
                                        <div class="nav-cart-inner">
                                            <a href="" class="nav-cart-icon">
                                                <span class="nav-cart-badge">2</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- akhir navbar-header -->

                            <div class="nav-wrap flex-child">
                                <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                                    <ul class="nav navbar-nav">

                                        <li class="dropdown">
                                            <a href="/">Beranda</a>
                                        </li>

                                        @php
                                        $categories = App\Models\Category::all();
                                        @endphp

                                        <li class="dropdown">
                                            <a href="/produk_tampil">Toko</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                            <ul class="dropdown-menu megamenu-wide">
                                                <li>
                                                    <div class="megamenu-wrap container">
                                                        <div class="row">
                                                            @foreach ($categories as $category)
                                                            <div class="col-md-3 megamenu-item">
                                                                <ul class="menu-list">
                                                                    <li>
                                                                        <span>{{$category->nama_kategori}}</span>
                                                                    </li>
                                                                    @php
                                                                    $subcategories =
                                                                    App\Models\Subcategory::where('id_kategori',
                                                                    $category->id)->get();
                                                                    @endphp
                                                                    @foreach ($subcategories as $subcategory)
                                                                    <li>
                                                                        <a
                                                                            href="/products/{{$subcategory->id}}">{{$subcategory->nama_subkategori}}</a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        <li class="dropdown">
                                            <a href="/about">Tentang</a>
                                        </li>

                                        <!-- Pencarian Mobile -->
                                        <li id="mobile-search" class="hidden-lg hidden-md">
                                            <form method="get" class="mobile-search">
                                                <input type="search" class="form-control" placeholder="Cari...">
                                                <button type="submit" class="search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </li>

                                    </ul> <!-- akhir menu -->
                                </div> <!-- akhir collapse -->
                            </div> <!-- akhir col -->

                            <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                                <ul>
                                    <li class="nav-register">
                                        @if (Auth::guard('webmember')->check())
                                            <div class="dropdown">
                                                <a href="/profile">{{ Auth::guard('webmember')->user()->nama_member }}</a>
                                                <div class="dropdown-content">
                                                    {{-- <a href="/akun_saya">Akun Saya</a> --}}
                                                    <a href="/orders">Pesanan Saya</a>
                                                </div>
                                            </div>
                                        @else
                                            <a href="/login_member">Masuk</a>
                                        @endif
                                    </li>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                    <li class="nav-cart">
                                        <div class="nav-cart-outer">
                                            <div class="nav-cart-inner">
                                                <a href="/cart" class="nav-cart-icon"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-register">
                                        @if (Auth::guard('webmember')->check())
                                        <a href="/logout_member">Keluar</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- akhir row -->
                    </div> <!-- akhir container -->
                </div> <!-- akhir navigation -->
            </nav> <!-- akhir navbar -->
        </header>

        <div class="content-wrapper oh">

            @yield('content')
            <!-- Footer Type-1 -->
            <footer class="footer footer-type-1">
                <div class="container">
                    <div class="footer-widgets">
                        <div class="row">

                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="widget footer-about-us">
                                    {{-- <img src="/front/img/logo_dark.png" alt="" class="logo"> --}}
                                    <h1 class="widget-title bottom-line left-align grey">WARKO</h1>
                                    <p class="mb-30">WarKo Tembakau, Doa Petani Menyertai</p>
                                    <div class="footer-socials">
                                        <div class="social-icons nobase">
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href="https://www.instagram.com/warko_id/"><i class="fa fa-instagram"></i></a>
                                            <a href="https://wa.me/6283196646614"><i class="fa fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end about us -->

                            <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12">
                                <div class="widget footer-links">
                                    <h5 class="widget-title bottom-line left-align grey">Hubungi Kami</h5>
                                    <ul class="list-no-dividers">
                                        <li><a href="https://api.whatsapp.com/send/?phone=6283196646614&text&type=phone_number&app_absent=0">Whatsapp : 083196646614</a></li>
                                        <li><a href="">Email : warko@gmail.com</a></li>
                                        
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="widget footer-links">
                                    <h5 class="widget-title bottom-line left-align grey">Alamat</h5>
                                    <ul class="list-no-dividers">
                                        <li><a href="https://maps.app.goo.gl/FcXWgFxXXG19gvcC8">Jalan Lowanu No 08 Umbulharjo Yogyakarta</a></li>
                                         
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="widget footer-links">
                                    <h5 class="widget-title bottom-line left-align grey">Sosial Media</h5>
                                    <ul class="list-no-dividers">
                                        <li><a href="https://www.instagram.com/warko_id/">Instagram : @warko.id</a></li>
                                        <li><a href="">Facebook : Warkoid</a></li>
                                       
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="widget footer-links">
                                    <h5 class="widget-title bottom-line left-align grey">Produk Kami</h5>
                                    <ul class="list-no-dividers">
                                        @php
                                        // Ambil 4 produk terbaru 
                                        $footer_products = App\Models\Product::latest()->take(4)->get();
                                        @endphp
                            
                                        @foreach ($footer_products as $product)
                                        <li>
                                            <a href="/product/{{ $product->id }}">
                                                {{ $product->nama_produk }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->

                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-6 copyright sm-text-center">
                                <span>
                                    &copy; 2024 Warung Tembakau dibuat oleh : <a href="/">25's</a>
                                </span>
                            </div>

                            <div class="col-sm-6 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
                                <i class=""><img src="https://iconape.com/wp-content/files/yh/207674/png/midtrans-logo.png" alt="" style="width: 50%"></i>
                            </div>

                        </div>
                    </div>
                </div> <!-- end bottom footer -->
            </footer> <!-- end footer -->

            <div id="back-to-top">
                <a href="#top"><i class="fa fa-angle-up"></i></a>
            </div>

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/front/js/plugins.js"></script>
    <script type="text/javascript" src="/front/js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back', // Customize easing effect
            duration: 1000,          // Customize duration of the animation
            once: true,              // Trigger the animation only once
        });
    </script>
    @stack('js')
</body>

</html>
