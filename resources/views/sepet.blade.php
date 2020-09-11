@extends('bolum.master')
@section('title', 'Sepet')
@section('content')

<section class="heading-banner-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a><span class="breadcome-separator">></span></li>
                            <li>Sepet</li>
                        </ul>
                    </div>
                    <div class="heading-banner-title">
                        <h1>Sepet</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if (count(Cart::content())>0)
<div class="shopping-cart-area mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="wishlist-table table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-remove"></th>
                                <th class="product-cart-img">
                                    <span class="nobr">Product Image</span>
                                </th>
                                <th class="product-name">
                                    <span class="nobr">Ürün Adı</span>
                                </th>
                                <th class="product-quantity">
                                    <span class="nobr">Adet</span>
                                </th>
                                <th class="product-price">
                                    <span class="nobr"> Ürün Fiyatı </span>
                                </th>
                                <th class="product-total-price">
                                    <span class="nobr"> Toplam Fiyat </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $urunCartItem)
                            <tr>
                                <td class="product-remove">
                                    <form action="{{ route('sepet.kaldir', $urunCartItem->rowId ) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="x">
                                    </form>
                                </td>
                                <td class="product-cart-img">
                                    @foreach($urunler as $urun)
                                    @if($urun->id == $urunCartItem->id)
                                        <a href="{{route('urun', $urunCartItem->id)}}"><img src="/upload/urunler/{{ $urun->resim }}" alt="" style="width: 50px;"></a>
                                    @endif
                                    @endforeach
                                </td>
                                <td class="product-name">
                                    <a href="{{route('urun', $urunCartItem->id)}}">{{ $urunCartItem->name }}</a>
                                </td>
                                <td class="product-quantity">
                                    <a href="#" class="btn btn-xs btn-default urun-adet-azalt" data-id="{{ $urunCartItem->rowId }}" data-adet="{{ $urunCartItem->qty-1 }}">-</a>
                                    <span style="padding: 10px 20px">{{ $urunCartItem->qty }} </span>
                                    <a href="#" class="btn btn-xs btn-default urun-adet-artir" data-id="{{ $urunCartItem->rowId }}" data-adet="{{ $urunCartItem->qty+1 }}">+</a>

                                </td>
                                <td class="product-price">
                                    <span><ins>{{ $urunCartItem->price }} ₺ </ins></span>
                                </td>
                                <td class="product-total-price">
                                    <span>{{ $urunCartItem->subtotal }} ₺ </span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{ route('sepet.bosalt') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="cart-collaterals">
                        <div class="cart-cuppon">
                            <input type="submit" class="update-btn" value="Sepeti Boşalt">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="shopping-cart-total">
                    <h2>Sepet Tutarı</h2>
                    <div class="shop-table table-responsive">
                        <table>
                            <tbody>
                            <tr class="cart-subtotal">
                                <td data-title="Alt Toplam"><span>{{ Cart::subtotal() }} ₺ </span></td>
                            </tr>
                            <tr class="shipping">
                                <td data-title="KDV"><span>{{ Cart::tax() }} ₺ </span></td>
                            </tr>
                            <tr class="order-total">
                                <td data-title="Toplam Fiyat"><span><strong>{{ Cart::total() }} ₺ </strong></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="proceed-to-checkout">
                        <a class="checkout-button " href="{{route('odeme')}}">Ödeme Yap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   @else
        <div class="container">
            <div class="alert alert-danger">Sepetinizde Ürün Yok !</div>
        </div>
   @endif
@endsection
