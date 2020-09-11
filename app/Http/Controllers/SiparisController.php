<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use App\Models\Siparis;
use App\Models\Urunler;
use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function index()
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        $siparisler = Siparis::with('sepet.sepet_urunler.urun')
            ->whereHas('sepet', function($query) {
                $query->where('uye_id', auth()->id());
            })->get();
        $urunler = Urunler::all();
        return view('siparisler', compact('ana_kategori', 'tum_kategoriler', 'siparisler', 'urunler'));
    }


    public function detay($id)
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        $siparis = Siparis::with('sepet.sepet_urunler.urun')
            ->whereHas('sepet', function($query) {
                $query->where('uye_id', auth()->id());
            })
            ->where('siparis.id', $id)
            ->firstOrFail();
        return view('siparis', compact('siparis','ana_kategori', 'tum_kategoriler'));
    }
}
