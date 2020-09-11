<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">UX Designer <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="#" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">5</small></a></li>
							<li class="list-inline-item"><a href="#" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
						</ul>
					</div>
				</div>
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Menü</label>
					</li>
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">Anasayfa</span></a></li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-newspaper"></i></span><span class="pcoded-mtext">Blog</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.blog') }}">Blog Listesi</a></li>
							<li><a href="{{ route('admin.blog.ekle') }}">Blog Ekle</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-file-alt"></i></span><span class="pcoded-mtext">Sayfalar</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.sayfa') }}">Sayfa Listesi</a></li>
							<li><a href="{{ route('admin.sayfa.ekle') }}">Sayfa Ekle</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-image"></i></span><span class="pcoded-mtext">Slayt</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.slayt') }}">Slayt Listesi</a></li>
							<li><a href="{{ route('admin.slayt.ekle') }}">Slayt Ekle</a></li>
						</ul>
					</li>

					<li class="nav-item pcoded-menu-caption">
						<label>Üye Yönetimi </label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Kullanıcılar</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.kullanici') }}">Kullanıcı Listesi</a></li>
							<li><a href="{{ route('admin.kullanici.ekle') }}">Kullanıcı Ekle</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Ürün Yönetimi </label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="fab fa-product-hunt"></i></span><span class="pcoded-mtext">Ürünler</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.urunler') }}">Ürün Listesi</a></li>
							<li><a href="{{ route('admin.urunler.ekle') }}">Ürün Ekle</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Kategoriler</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.kategoriler') }}">Kategori Listesi</a></li>
							<li><a href="{{ route('admin.kategoriler.ekle') }}">Kategori Ekle</a></li>
						</ul>
					</li>

					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-asterisk"></i></span><span class="pcoded-mtext">Markalar</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{ route('admin.marka') }}">Marka Listesi</a></li>
							<li><a href="{{ route('admin.marka.ekle') }}">Marka Ekle</a></li>
						</ul>
					</li>

					<li class="nav-item pcoded-menu-caption">
						<label>Sipariş Yönetimi</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Siparişler</span></a>
						<ul class="pcoded-submenu">
							<li><a href="#">Yeni Listesi</a></li>
							<li><a href="#">Sipariş Listesi</a></li>
						</ul>
					</li>
					 
					 
					<li class="nav-item pcoded-menu-caption">
						<label>Site Ayarları</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-cogs"></i></span><span class="pcoded-mtext">Genel Ayarlar</span></a>
						<ul class="pcoded-submenu">
							<li><a href="#">İletişim Bilgileri</a></li>
							<li><a href="#">Sosyal Medya</a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="{{ route('admin.cikis') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-power-off"></i></span><span class="pcoded-mtext">Çıkış Yap</span></a></li>
				</ul>
			</div>
		</div>
	</nav>