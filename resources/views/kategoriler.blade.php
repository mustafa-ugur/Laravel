@extends('bolum.master')
@section('title', $kategoriler->baslik)
@section('content')

<div class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
                                    <li><a href="#">Anasayfa</a><span class="breadcome-separator">></span></li>   
                                    <li>{{ $kategoriler->baslik }}</li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="product-list-grid-view-area mt-20">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-9 order-lg-2 order-1">                          
                          <div class="shop-product-area">
                              <div class="tab-content">
                                  <div id="grid-view" class="tab-pane fade show active">
                                      <div class="row product-container">
                                          @foreach($urunler as $urun)
                                          <div class="col-lg-3 col-md-3 item-col2">
                                              <div class="single-product">
                                                <div class="product-img">
                                                    <a href="{{ route('urun', $urun->id) }}">
                                                        <img class="first-img" src="/upload/urunler/{{ $urun->resim }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="{{ route('urun', $urun->id) }}">{{ $urun->baslik }}</a></h2>
                                                    <div class="product-price">
                                                    <span class="old-price">{{ $urun->ana_fiyat }} ₺ </span>
                                                        <span class="new-price">{{ $urun->satis_fiyat }} ₺ </span>
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
                          <!-- 
                            <div class="pagination pb-10">
                             <ul class="page-number">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                             </ul> 
                          </div>

                          -->
		            </div>
		            <div class="col-lg-3 order-lg-1 order-2">
		                <div class="widget widget-shop-categories">
		                    <h3 class="widget-shop-title">{{ $kategoriler->baslik }}</h3>
		                    <div class="widget-content">
		                        <ul class="product-categories">
                                @foreach($alt_kategoriler as $kat)
                                    <li><a href="{{ route('kategoriler', $kat->id) }}"> {{ $kat->baslik }} </a> </li>
                                @endforeach
		                        </ul>
		                    </div>
		                </div>
		        
		                <div class="widget widget-brand">
		                    <h3 class="widget-title">Marka</h3>
		                    <div class="widget-content">
		                        <ul class="brand-menu">
		                            <li><input type="checkbox"><a href="#">Brand2</a> <span class="pull-right">(1)</span></li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
        </div>
    @endsection