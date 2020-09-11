<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use App\Models\Siparis;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class OdemeController extends Controller
{
    public function index()
    {
        if(!auth()->check()) {
            return redirect()->route('kullanici.giris');
        }
            $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
            $tum_kategoriler = Kategoriler::where('aktif', 1)->get();

            $kullanici_detay = auth()->user()->detay;

            return view('odeme', compact('ana_kategori', 'tum_kategoriler', 'kullanici_detay'));
    }

    public function odemeyap()
    {
        $siparis = request()->all();
        $siparis['sepet_id'] = session('aktif_sepet_id');
        $siparis['banka'] = "Garanti";
        $siparis['taksit_sayisi'] = 1;
        $siparis['durum'] = "Siparişiniz Alındı";
        //$siparis['siparis_tutari'] = Cart::subtotal();

        Siparis::create($siparis);
        Cart::destroy();
        session()->forget('aktif_sepet_id');

        return redirect()->route('siparisler');
    }

}
