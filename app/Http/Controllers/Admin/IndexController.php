<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kullanici;
use App\Models\Kategoriler;
use App\Models\Urunler;
use App\Models\kullanicidetay;

class IndexController extends Controller
{
    public function index()
    {
        $kullanicilar = kullanici::all();
        $kullanici_sayisi = kullanici::count();
        $kategori_sayisi = kategoriler::count();
        $urun_sayisi = urunler::count();
        return view('admin.index', compact('kullanicilar', 'kullanici_sayisi', 'kategori_sayisi', 'urun_sayisi'));
    }
}
