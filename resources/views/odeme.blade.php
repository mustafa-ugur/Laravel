@extends('bolum.master')
@section('title', 'Ödeme Sayfası')
@section('content')

<section class="heading-banner-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a><span class="breadcome-separator">></span></li>
                            <li>Ödeme Sayfası</li>
                        </ul>
                    </div>
                    <div class="heading-banner-title">
                        <h1>Ödeme Sayfası</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="checkout-area mt-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout-form-area">
                    <div class="checkout-title">
                        <h3>FATURA BİLGİLERİ</h3>
                    </div>
                    <div class="ceckout-form">
                        <form action="{{route('odemeyap')}}" method="post">
                            {{ csrf_field() }}
                            <div class="billing-fields">
                                <div class="form-fild">
                                    <label for="kartno">Kredi Kartı Numarası</label>
                                    <input type="text" class="form-control kredikarti" id="kart_numarasi" name="kart_numarasi" style="font-size:20px;" required>
                                </div>
                                <div class="form-fild">
                                    <label for="cardexpiredatemonth">Son Kullanma Tarihi</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            Ay
                                            <select name="son_kullanma_tarihi_ay" class="select" required style="border: 1px solid #ddd;">
                                                <option>1</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            Yıl
                                            <select name="son_kullanma_tarihi_yil" class="select" required style="border: 1px solid #ddd;">
                                                <option>2017</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-fild">
                                    <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                                    <input type="text" class="form-control kredikarti_cvv" name="cvv" id="cvv" required>
                                </div>

                                <div class="form-fild first-name">
                                    <p><label>Adınız Soyadınız<span class="required">*</span></label></p>
                                    <input type="text" placeholder="" name="adsoyad" value="{{ auth()->user()->adsoyad }}">
                                </div>
                                <div class="form-fild last-name">
                                    <p><label>Telefon<span class="required">*</span></label></p>
                                    <input type="text" placeholder="" name="ceptelefon" value="{{$kullanici_detay->ceptelefon}}">
                                </div>
                                <div class="form-fild">
                                    <p><label>E-Posta<span class="required">*</span></label></p>
                                    <input type="text" placeholder="" name="email" value="{{ auth()->user()->email }}">
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="uye_id">
                                </div>
                            </div>
                            <div class="additional-fields">
                                <div class="order-notes">
                                    <div class="form-fild order-name">
                                        <p><label>Adres</label></p>
                                        <textarea name="adres" id="checkout-mess" placeholder="Siparişiniz gelmesini istediğiniz adresi yazınız..." rows="2" cols="5"> {{$kullanici_detay->adres}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="siparis_tutari" value="{{Cart::total()}}">
                            <!--Your Order Fields End-->
                            <div class="checkout-payment">
                                <button class="order-btn" type="submit">Ödemeyi Tamamla</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Checkout Area End-->
            <div class="col-md-4">
                <div class="your-order-fields mt-30">
                    <div class="your-order-title">
                        <h3>SİPARİŞİNİZ</h3>
                    </div>
                    <style>
                        th {
                            text-align: left !important;
                        }
                        td {
                            text-align: left !important;
                            width: 50%;
                        }
                    </style>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">Ürün</th>
                                <th class="product-total">FİYAT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $urunCartItem)
                                <tr class="cart_item">
                                    <td class="product-name">{{$urunCartItem->name}} <strong class="product-quantity"> ×{{$urunCartItem->qty}}</strong></td>
                                    <td class="product-total"><span class="amount">{{$urunCartItem->price}} ₺ </span></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th>Ara Toplam</th>
                                <td><span class="amount">{{Cart::subtotal()}} ₺ </span></td>
                            </tr>
                            <tr class="shipping">
                                <th>KDV</th>
                                <td data-title="KDV"><p>{{Cart::tax()}} ₺ </p></td>
                            </tr>
                            <tr class="order-total">
                                <th>Toplam</th>
                                <td><strong><span class="total-amount">{{Cart::total()}} ₺ </span></strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
