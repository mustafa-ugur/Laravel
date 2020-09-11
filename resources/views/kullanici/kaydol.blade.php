@extends('bolum.master')
@section('title','Kaydol')
@section('content')

<section class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
		                            <li><a href="{{ route('index') }}">Anasayfa</a><span class="breadcome-separator">></span></li>
		                            <li>Üye Ol</li>
		                        </ul>
		                    </div>
		                    <div class="heading-banner-title">
		                        <h1>Üye Ol</h1>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
		<!--Heading Banner Area End-->
		<!--My Account Area Start-->
		<section class="my-account-area mt-20">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-8 col-md-8 col-md-offset-2">
		                <div class="customer-login-register register-pt-0">
		                    <!-- <div class="form-register-title">
		                        <h2>Üye Ol</h2>
		                    </div> -->
		                    <div class="register-form">
		                        <form method="POST" action="{{ route('kullanici.kaydol') }}">
                                    {{ csrf_field() }}
		                            <div class="form-fild">
		                                <p><label>Kullanıcı Adı <span class="required">*</span></label></p>
		                                <input type="text" name="adsoyad" value="{{ old('adsoyad') }}" required>
                                    </div>
                                    <div class="form-fild">
		                                <p><label>E-Posta <span class="required">*</span></label></p>
		                                <input type="text" name="email" value="{{ old('email') }}" required>
		                            </div>
		                            <div class="form-fild">
		                                <p><label>Şifre <span class="required">*</span></label></p>
		                                <input type="password" name="sifre" value="{{ old('sifre') }}" required>
                                    </div>
                                    
                                    <div class="form-fild">
		                                <p><label>Şifre Tekrar <span class="required">*</span></label></p>
		                                <input type="password" name="sifre_confirmation" required>
		                            </div>
		                            <div class="register-submit">
		                                <button type="submit" class="form-button">Üye Ol</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		            <!--Register Form End-->
		        </div> 
		    </div>
		</section>

@endsection