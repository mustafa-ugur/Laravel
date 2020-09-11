@extends('bolum.master')
@section('title', 'İletişim')
@section('content')
<section class="heading-banner-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a><span class="breadcome-separator">></span></li>
                            <li> İletişim</li>
                        </ul>
                    </div>
                    <!-- <div class="heading-banner-title">
                        <h1>İLETİŞİM BİLGİLERİ</h1>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact-form-area mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-form-title">
                    <h2>Bize Yazın</h2>
                </div>
                <div class="contact-form">
                    <form id="contact-form" action="" method="post">
                        <div class="contact-input">
                            <div class="first-name">
                                <input type="text" name="" placeholder="Adınız Soyadınız *">
                            </div>
                            <div class="last-name">
                                <input type="text" name="" placeholder="Telefon Numaranız *">
                            </div>
                            <div class="email">
                                <input type="email" name="" placeholder="E-Posta Adresiniz *">
                            </div>
                            <div class="subject">
                                <input type="text" name="" placeholder="Konu *">
                            </div>
                        </div>
                        <div class="contact-message mb-20">
                            <div class="message pr-10 pr-xs-0">
                                <textarea name="" cols="40" rows="10" placeholder="Mesajınız *"></textarea>
                            </div>
                        </div>
                        <div class="contact-submit">
                            <button type="submit" class="form-button">Gönder</button>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-address-info">
                    <div class="contact-form-title">
                        <h2>İletişim Bilgileri</h2>
                    </div>
                    <div class="contact-address mb-35">
                        <ul>
                            <li><i class="fa fa-map-marker"></i> Adres : No 40 Baria Sreet 133/2 NewYork City</li>
                            <li><i class="fa fa-phone"></i> 0000 000 00 00</li>
                            <li><i class="fa fa-envelope-o"></i> mustafa@cmdmedya.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
