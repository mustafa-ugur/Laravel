<header>
            <div class="header-container">
                <!--Header Top Area Start-->
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="header-top-menu">
                                    <ul>
                                        <li><span>E-Posta:</span><a href="#">mustafa@cmdmedya.com </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 d-lg-block d-md-block d-none text-right">
                                <div class="header-top-menu">
                                    <ul>
                                        <li><a href="{{route('sayfa', 1)}}">Kurumsal</a></li>
                                        <li><a href="{{route('bloglar')}}">Blog</a></li>
                                        <li><a href="{{ route('iletisim') }}">İletişim</a></li>
                                        @auth()
                                            <li class="account"><a href="#">{{ Auth::user()->adsoyad }} / Hesabım <i class="fa fa-angle-down"></i></a>
                                                <ul class="ht-dropdown">
                                                    <li><a href="#">Profil</a></li>
                                                    <li><a href="{{ route('siparisler') }}">Siparişlerim</a></li>
                                                    <li><a href="{{ route('kullanici.cikis') }}">Çıkış Yap</a></li>
                                                </ul>
                                            </li>
                                        @endauth
                                        @guest
                                        <li class="account"><a href="#">Üye Ol / Giriş Yap <i class="fa fa-angle-down"></i></a>
                                            <ul class="ht-dropdown">
                                                <li><a href="{{ route('kullanici.kaydol') }}">Üye Ol</a></li>
                                                <li><a href="{{ route('kullanici.giris') }}">Giriş Yap</a></li>
                                            </ul>
                                        </li>
                                        @endguest

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-middel-area">
                    <div class="container">
                        <div class="row">
                            <!--Logo Start-->
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="logo">
                                    <a href="{{ route('index') }}"><img src="/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <!--Logo End-->
                            <!--Search Box Start-->
                            <div class="col-lg-6 col-md-5 col-12">
                                <div class="search-box-area">
                                    <form action="#">
                                       <div class="select-area">
                                            <select data-placeholder="" class="select" tabindex="1">
                                                <option value="">Tüm Kategoriler</option>
                                                @foreach($ana_kategori as $kategori)
                                                    <li><a href="{{ route('kategoriler', $kategori->id) }}">  {{ $kategori->baslik }}  </a>
                                                        <ul class="dropdown">
                                                            @foreach($tum_kategoriler as $kat)
                                                                @if($kat->ust_id == $kategori->id)
                                                                    <li><a href="{{ route('kategoriler', $kat->id) }}">{{ $kat->baslik }}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                                @foreach($ana_kategori as $kategori)
                                                    <optgroup label="{{ $kategori->baslik }}">
                                                        @foreach($tum_kategoriler as $kat)
                                                            @if($kat->ust_id == $kategori->id)
                                                                <option>{{ $kat->baslik }}</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                           </select>
                                        </div>
                                        <div class="search-box">
                                            <input type="text" name="search" id="search" placeholder="Ürün Ara" value='' onblur="if(this.value==''){this.value='Search product...'}" onfocus="if(this.value==''){this.value=''}">
                                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                               <div class="mini-cart-area">
                                   <ul>
                                       <li><a href="{{route('sepet')}}"><i class="ion-android-cart"></i><span class="cart-add">{{ Cart::count() }}</span><span class="cart-total">{{ Cart::total() }} ₺ <i class="fa fa-angle-down"></i></span></a>
                                           <ul class="cart-dropdown">
                                               @foreach(Cart::content() as $urunCartItem)
                                               <li class="cart-item">
                                                   <div class="cart-content">
                                                       <h4><a href="#">{{ $urunCartItem->name }}</a></h4>
                                                       <p class="cart-quantity">Adet: {{ $urunCartItem->qty }} </p>
                                                       <p class="cart-price">{{ $urunCartItem->price }} ₺ </p>
                                                   </div>
                                                   <div class="cart-close">
                                                       <form action="{{ route('sepet.kaldir', $urunCartItem->rowId ) }}" method="post">
                                                           {{ csrf_field() }}
                                                           {{ method_field('DELETE') }}
                                                           <input type="submit" value="x">
                                                       </form>
                                                   </div>
                                               </li>
                                               @endforeach
                                               <li class="cart-total-amount mtb-20">
                                                   <h4>Toplam Tutar : <span class="pull-right">{{ Cart::total() }} ₺ </span></h4>
                                               </li>
                                               <li class="cart-button">
                                                   <a href="{{route('sepet')}}" class="button2">Sepete Git</a>
                                               </li>
                                           </ul>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-area header-sticky">
                   <div class="container">
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="logo-sticky">
                                 <a href="{{ route('index') }}"><img src="img/logo/logo.png" alt=""></a>
                               </div>
                               <div class="main-menu-area">
                                   <nav>
                                       <ul class="main-menu">
                                           <li class="active"><a href="{{ route('index') }}">Anasayfa</a></li>
                                           @foreach($ana_kategori as $kategori)
                                                <li><a href="{{ route('kategoriler', $kategori->id) }}">  {{ $kategori->baslik }}  </a>
                                                    <ul class="dropdown">
                                                    @foreach($tum_kategoriler as $kat)
                                                        @if($kat->ust_id == $kategori->id)
                                                            <li><a href="{{ route('kategoriler', $kat->id) }}">{{ $kat->baslik }}</a></li>
                                                        @endif
                                                    @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                       </ul>
                                   </nav>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

                <div class="mobile-menu-area d-lg-none d-md-none d-block">
                   <div class="container">
                       <div class="row">
                           <div class="col-12">
                               <div class="mobile-menu">
                                   <nav>
                                       <ul>
                                           <li><a href="{{ route('index') }}">Anasayfa</a></li>
                                           @foreach($ana_kategori as $kategori)
                                               <li><a href="{{ route('kategoriler', $kategori->id) }}">  {{ $kategori->baslik }}  </a>
                                                   <ul>
                                                       @foreach($tum_kategoriler as $kat)
                                                           @if($kat->ust_id == $kategori->id)
                                                               <li><a href="{{ route('kategoriler', $kat->id) }}">{{ $kat->baslik }}</a></li>
                                                           @endif
                                                       @endforeach
                                                   </ul>
                                               </li>
                                           @endforeach
                                           <li><a href="{{ route('index') }}">Kurumsal</a></li>
                                           <li><a href="{{ route('index') }}">Blog</a></li>
                                           <li><a href="{{ route('index') }}">İletişim</a></li>
                                       </ul>
                                   </nav>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </header>
