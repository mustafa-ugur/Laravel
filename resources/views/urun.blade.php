@extends('bolum.master')
@section('title', $urun->baslik)
@section('content')
    <div class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
                                <li> <a href=""> Anasayfa </a><span class="breadcome-separator">></span> </li>
                                @if($urun_kategori->ust_id != null)
                                    <li><a href="{{ route('kategoriler', $urun_ust_kategori->id) }}">{{ $urun_ust_kategori->baslik }}</a> <span class="breadcome-separator">></span> </li>
                                @endif
                                    <li><a href="{{ route('kategoriler', $urun_kategori->id) }}">  {{ $urun_kategori->baslik }} </a> </li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<section class="single-product-area mt-20">
		    <div class="container">
                <div class="row single-product-info mb-50">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-product-tab-content tab-content">

                            <div id="w1" class="tab-pane fade in active">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="/upload/urunler/{{ $urun->resim }}">
                                        <img src="/upload/urunler/{{ $urun->resim }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-tab">
                            <div class="nav single-product-tab-menu owl-carousel">
                            @foreach($resimler as $resim)
                                <a data-fancybox="gallery" href="/upload/urunler/{{ $resim->resim }}"><img src="/upload/urunler/{{ $resim->resim }}" alt=""></a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-product-content">
                            <h1 class="product-title">{{ $urun->baslik }}</h1>
                            <div class="single-product-price">
                                <span class="old-price">{{ $urun->ana_fiyat }} ₺ </span>
                                <span class="new-price">{{ $urun->satis_fiyat }} ₺</span>
                            </div>
                            <div class="product-description">
                                <p>{{ $urun->ozet }}</p>
                            </div>
                            <div class="single-product-quantity">
                                <form action="{{ route('sepet.ekle') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $urun->id }}">
                                    <input type="submit" class="quantity-button" value="Sepete Ekle">
                                </form>
                            </div>
                            <div class="wislist-compare-btn">
                                <ul>
                                    <li><a class="wishlist" href="#">Add To Wishlist</a></li>
                                    <li><a class="compare" href="#">Compare</a></li>
                                </ul>
                            </div>
                            <div class="product-meta">
                                <span class="posted-in">
                                    Kategorileri:
                                    <a href="{{ route('kategoriler', $urun_kategori->id) }}"> {{ $urun_kategori->baslik }}</a>
                                </span>
                            </div>
                            <div class="single-product-sharing">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
		        <div class="row">
		            <div class="discription-tab">
		                <div class="col-lg-12">
		                    <div class="discription-review-contnet mb-40">
		                        <div class="discription-tab-menu">
                                    <ul class="nav">
                                        <li><a class="active" data-toggle="tab" href="#description">Açıklama</a></li>
                                    </ul>
                                </div>
                                <div class="discription-tab-content tab-content">
                                  <div id="description" class="tab-pane fade show active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="description-content">
                                                <p> {{ $urun->aciklama }} </p>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
@endsection
