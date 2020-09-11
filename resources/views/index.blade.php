@extends('bolum.master')
@section('title', 'Anasayfa')
@section('content')
<section class="slider-area ptb-30 white-bg">
            <div class="container">
                <div class="row">
                    <!--Categories Menu Start-->
                    <div class="col-lg-3 col-md-3">
                        <div class="side-menu">
                            <div class="category-heading">
                                <h2><i class="ion-android-menu"></i><span>Kategoriler</span></h2>
                            </div>
                            <div id="cate-toggle" class="category-menu-list">
                                <ul>
                                   @foreach($ana_kategori as $kategori)
                                        <li class="right-menu"><a href="{{ route('kategoriler', $kategori->id) }}">  {{ $kategori->baslik }}  </a>
                                            <ul class="cat-dropdown">
                                            @foreach($tum_kategoriler as $kat)
                                                @if($kat->ust_id == $kategori->id)
                                                    <li><a href="{{ route('kategoriler', $kat->id) }}">{{ $kat->baslik }}</a></li>
                                                @endif
                                            @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="slider-wrapper theme-default">
                            <div id="slider" class="nivoSlider">
                            @foreach($slayt as $veri)
                                <img src="/upload/slayt/{{ $veri->resim }}" alt="" title="#htmlcaption{{ $veri->id }}" />
                            @endforeach
                            </div>
                            @foreach($slayt as $veri)
                            <div id="htmlcaption{{ $veri->id }}" class="nivo-html-caption">
                                <div class="slider-caption">
                                    <div class="slider-text">
                                        <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">{{ $veri->baslik }}</h1>
                                        <h4 class="wow animated fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">{{ $veri->ozet }}</h4>
                                        <div class="slider-button">
                                            <a href="{{ $veri->link }}" class="wow button sec-slide animated fadeInLeft" data-text="Shop now" data-wow-duration="2.5s" data-wow-delay="0.5s">İncele</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--Slider End-->
                </div>
            </div>
        </section>
        <!--Slider Area End-->
        <!--Corporate About Start-->

        <section class="all-product-area pt-100">
            <div class="container">
                <div class="row">
                    <!--Right Side Product Start-->
                    <div class="col-lg-3 col-md-3">

                    <div class="new-arrivals-product mb-50">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="new-arrivals-product-title">
                                        <!--Section Title2 Start-->
                                        <div class="section-title2">
                                            <h3>Yeni Ürünler</h3>
                                        </div>
                                        <!--Section Title2 End-->
                                        <!--Hot Deal Single Product Start-->
                                        <div class="hot-del-single-product">
                                            <div class="row slide-active2">
                                                    <!--Single Product Start-->
                                                    @foreach($yeni_urunler as $urun)
                                                    <div class="col-lg-12">
                                                        <div class="row no-gutters single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="{{ route('urun', $urun->id) }}">
                                                                        <img class="first-img" src="/upload/urunler/{{ $urun->resim }}" alt="">
                                                                        <!-- <img class="hover-img" src="img/product/16.jpg" alt=""> -->
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="{{ route('urun', $urun->id) }}"> {{ $urun->baslik }} </a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">{{ $urun->ana_fiyat }} ₺</span>
                                                                        <span class="new-price">{{ $urun->satis_fiyat }} ₺</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                        </div>
                                        <!--Hot Deal Single Product Start-->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="offer-img-area pb-50">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single-offer mb-20">
                                        <div class="offer-img img-full">
                                            <a href="#"><img src="img/offer/8.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="single-offer mb-20">
                                        <div class="offer-img img-full">
                                            <a href="#"><img src="img/offer/9.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="single-offer">
                                        <div class="offer-img img-full">
                                            <a href="#"><img src="img/offer/10.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-side-our-blog">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="right-side-Our-blog-title">
                                        <div class="section-title2">
                                            <h3>Blog</h3>
                                        </div>
                                        <div class="our-blog">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="our-blog-active owl-carousel">
                                                        @foreach($blog as $item)
                                                        <div class="our-single-blog">
                                                            <div class="our-blog-img img-full">
                                                                <a href="#">
		                                                            <img src="/upload/blog/{{ $item->resim }}" alt="">
		                                                        </a>
                                                            </div>
                                                            <div class="our-blog-content mt-15">
                                                                <h3><a href="#">{{ $item->baslik }}</a></h3>
                                                                <div class="our-blog-des mb-20">
                                                                    <p> {{ $item->ozet }} </p>
                                                                </div>
                                                            </div>
                                                            <div class="blog-meta">
                                                                <a href="#">Devamını Oku <i class="fa fa-angle-double-right"></i> </a>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9 col-md-9">

                        <div class="desktop-television-product">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>Haftanın Fırsat Ürünleri</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div id="amply" class="tab-pane fade show active">

                                        <div class="mb-90">
                                        <div class="row">
                                            @foreach($hafta as $urun)

                                            <div class="col-md-4">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('urun', $urun->id) }}">
                                                        <img class="first-img" src="/upload/urunler/{{ $urun->resim }}" alt="">
                                                    </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2><a href="{{ route('urun', $urun->id) }}">{{ $urun->baslik }}</a></h2>
                                                        <div class="product-price">
                                                            <span class="old-price">{{ $urun->ana_fiyat }}₺</span>
                                                            <span class="new-price">{{ $urun->satis_fiyat }}₺</span>
                                                            <a class="button add-btn" href="{{ route('urun', $urun->id) }}" data-toggle="tooltip" title="Ürünleri Gör">Ürünleri Gör</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-television-product">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>Öne Çıkan Ürünler</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="amply" class="tab-pane fade show active">
                                        <div class="mb-90">
                                        <div class="row">
                                            @foreach($one_cikan as $urun)
                                            <div class="col-md-4">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('urun', $urun->id) }}">
                                                        <img class="first-img" src="/upload/urunler/{{ $urun->resim }}" alt="">
                                                    </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2><a href="{{ route('urun', $urun->id) }}">{{ $urun->baslik }}</a></h2>
                                                        <div class="product-price">
                                                            <span class="old-price">{{ $urun->ana_fiyat }}₺</span>
                                                            <span class="new-price">{{ $urun->satis_fiyat }}₺</span>
                                                            <a class="button add-btn" href="{{ route('urun', $urun->id) }}" data-toggle="tooltip" title="Ürünü Gör">Ürünü Gör</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-television-product">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>Çok Satan Ürünler</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="amply" class="tab-pane fade show active">
                                    <div class="mb-90">
                                        <div class="row">
                                            @foreach($cok_satan as $urun)
                                            <div class="col-md-4">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('urun', $urun->id) }}">
                                                        <img class="first-img" src="/upload/urunler/{{ $urun->resim }}" alt="">
                                                    </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2><a href="{{ route('urun', $urun->id) }}">{{ $urun->baslik }}</a></h2>
                                                        <div class="product-price">
                                                            <span class="old-price">{{ $urun->ana_fiyat }}₺</span>
                                                            <span class="new-price">{{ $urun->satis_fiyat }}₺</span>
                                                            <a class="button add-btn" href="{{ route('urun', $urun->id) }}" data-toggle="tooltip" title="Ürünü Gör">Ürünü Gör</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="brand-area ptb-30 white-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-active owl-carousel">
                            @foreach($markalar as $marka)
                            <div class="single-brand img-full">
                                <a href="#"><img src="/upload/marka/{{ $marka->resim }}" alt=""></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
