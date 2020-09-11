<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::redirect('/', '/admin/oturumac');

    Route::match(['get', 'post'],'/oturumac', 'KullaniciController@oturumac')->name('admin.oturumac');
    Route::get('/cikis', 'KullaniciController@cikis')->name('admin.cikis');

   Route::group(['middleware' => 'admin'], function () {
     Route::get('/index', 'IndexController@index')->name('admin.index');

     Route::group(['prefix' => 'kullanici'], function() {
        Route::match(['get', 'post'], '/', 'KullaniciController@index')->name('admin.kullanici');
            Route::get('/ekle', 'KullaniciController@form')->name('admin.kullanici.ekle');
            Route::get('/duzenle/{id}', 'KullaniciController@form')->name('admin.kullanici.duzenle');
            Route::post('/kaydet/{id?}', 'KullaniciController@kaydet')->name('admin.kullanici.kaydet');
            Route::get('/sil/{id}', 'KullaniciController@sil')->name('admin.kullanici.sil');
            Route::get('/aktif/{id}', 'KullaniciController@aktif')->name('admin.kullanici.aktif');
            Route::get('/pasif/{id}', 'KullaniciController@pasif')->name('admin.kullanici.pasif');
       });


       Route::group(['prefix' => 'kategoriler'], function() {
        Route::match(['get', 'post'], '/', 'KategorilerController@index')->name('admin.kategoriler');
        Route::get('/ekle', 'KategorilerController@form')->name('admin.kategoriler.ekle');
        Route::get('/duzenle/{id}', 'KategorilerController@form')->name('admin.kategoriler.duzenle');
        Route::post('/kaydet/{id?}', 'KategorilerController@kaydet')->name('admin.kategoriler.kaydet');
        Route::get('/sil/{id}', 'KategorilerController@sil')->name('admin.kategoriler.sil');
        Route::get('/aktif/{id}', 'KategorilerController@aktif')->name('admin.kategoriler.aktif');
        Route::get('/pasif/{id}', 'KategorilerController@pasif')->name('admin.kategoriler.pasif');
    });


    Route::group(['prefix' => 'marka'], function() {
        Route::match(['get', 'post'], '/', 'MarkaController@index')->name('admin.marka');
        Route::get('/ekle', 'MarkaController@form')->name('admin.marka.ekle');
        Route::get('/duzenle/{id}', 'MarkaController@form')->name('admin.marka.duzenle');
        Route::post('/kaydet/{id?}', 'MarkaController@kaydet')->name('admin.marka.kaydet');
        Route::get('/sil/{id}', 'MarkaController@sil')->name('admin.marka.sil');
        Route::get('/aktif/{id}', 'MarkaController@aktif')->name('admin.marka.aktif');
        Route::get('/pasif/{id}', 'MarkaController@pasif')->name('admin.marka.pasif');
    });


    Route::group(['prefix' => 'urunler'], function() {
        Route::match(['get', 'post'], '/', 'UrunlerController@index')->name('admin.urunler');
        Route::get('/ekle', 'UrunlerController@form')->name('admin.urunler.ekle');
        Route::get('/duzenle/{id}', 'UrunlerController@form')->name('admin.urunler.duzenle');
        Route::post('/kaydet/{id?}', 'UrunlerController@kaydet')->name('admin.urunler.kaydet');
        Route::get('/sil/{id}', 'UrunlerController@sil')->name('admin.urunler.sil');
        Route::get('/aktif/{id}', 'UrunlerController@aktif')->name('admin.urunler.aktif');
        Route::get('/pasif/{id}', 'UrunlerController@pasif')->name('admin.urunler.pasif');
        Route::post('/resimEkle', 'UrunlerController@resimEkle')->name('admin.urunler.resimEkle');
    });


    Route::group(['prefix' => 'sayfa'], function() {
        Route::match(['get', 'post'], '/', 'SayfaController@index')->name('admin.sayfa');
        Route::get('/ekle', 'SayfaController@form')->name('admin.sayfa.ekle');
        Route::get('/duzenle/{id}', 'SayfaController@form')->name('admin.sayfa.duzenle');
        Route::post('/kaydet/{id?}', 'SayfaController@kaydet')->name('admin.sayfa.kaydet');
        Route::get('/sil/{id}', 'SayfaController@sil')->name('admin.sayfa.sil');
        Route::get('/aktif/{id}', 'SayfaController@aktif')->name('admin.sayfa.aktif');
        Route::get('/pasif/{id}', 'SayfaController@pasif')->name('admin.sayfa.pasif');
    });


    Route::group(['prefix' => 'slayt'], function() {
        Route::match(['get', 'post'], '/', 'SlaytController@index')->name('admin.slayt');
        Route::get('/ekle', 'SlaytController@form')->name('admin.slayt.ekle');
        Route::get('/duzenle/{id}', 'SlaytController@form')->name('admin.slayt.duzenle');
        Route::post('/kaydet/{id?}', 'SlaytController@kaydet')->name('admin.slayt.kaydet');
        Route::get('/sil/{id}', 'SlaytController@sil')->name('admin.slayt.sil');
        Route::get('/aktif/{id}', 'SlaytController@aktif')->name('admin.slayt.aktif');
        Route::get('/pasif/{id}', 'SlaytController@pasif')->name('admin.slayt.pasif');
    });


    Route::group(['prefix' => 'blog'], function() {
        Route::match(['get', 'post'], '/', 'BlogController@index')->name('admin.blog');
        Route::get('/ekle', 'BlogController@form')->name('admin.blog.ekle');
        Route::get('/duzenle/{id}', 'BlogController@form')->name('admin.blog.duzenle');
        Route::post('/kaydet/{id?}', 'BlogController@kaydet')->name('admin.blog.kaydet');
        Route::get('/sil/{id}', 'BlogController@sil')->name('admin.blog.sil');
        Route::get('/aktif/{id}', 'BlogController@aktif')->name('admin.blog.aktif');
        Route::get('/pasif/{id}', 'BlogController@pasif')->name('admin.blog.pasif');
    });
});
});

Route::get('/', 'IndexController@index')->name('index');
Route::get('/kategoriler/{id}', 'KategorilerController@index')->name('kategoriler');
Route::get('/urun/{id}', 'UrunlerController@index')->name('urun');
Route::get('/sayfa/{id}', 'SayfaController@index')->name('sayfa');
Route::get('/bloglar', 'BlogController@index')->name('bloglar');
Route::get('/blog/{id}', 'BlogController@blog')->name('blog');
Route::get('/iletisim', 'IletisimController@index')->name('iletisim');


Route::group(['prefix'=>'kullanici'], function (){
    Route::get('/giris', 'KullaniciController@giris_form')->name('kullanici.giris');
    Route::post('/giris', 'KullaniciController@giris');
    Route::get('/kaydol', 'KullaniciController@kaydol_form')->name('kullanici.kaydol');
    Route::post('/kaydol', 'KullaniciController@kaydol');
    Route::post('/kaydol', 'KullaniciController@kaydol');
    Route::get('/cikis', 'KullaniciController@cikis')->name('kullanici.cikis');

});


Route::group(['prefix' => 'sepet'], function (){
    Route::get('/', 'SepetController@index')->name('sepet');
    Route::post('/ekle', 'SepetController@ekle')->name('sepet.ekle');
    Route::delete('/kaldir/{rowid}', 'SepetController@kaldir')->name('sepet.kaldir');
    Route::delete('/bosalt', 'SepetController@bosalt')->name('sepet.bosalt');
    Route::patch('/guncelle/{rowid}', 'SepetController@guncelle')->name('sepet.guncelle');
});

Route::get('/odeme', 'OdemeController@index')->name('odeme');
Route::post('/odemeyap', 'OdemeController@odemeyap')->name('odemeyap');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/siparisler', 'SiparisController@index')->name('siparisler');
    Route::get('/siparisler/{id}', 'SiparisController@detay')->name('siparis');
});
