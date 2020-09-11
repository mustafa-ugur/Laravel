<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Urunler;

class KategorilerController extends Controller
{
    public function index($id)
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        //$kategoriler = Kategoriler::with('ust_kategori')->orderByDesc('created_at')->paginate(1000);
        $tum_kategoriler = Kategoriler::all();

        $kategoriler = kategoriler::where('id', $id)->firstOrFail();
        $alt_kategoriler = kategoriler::where('ust_id', $kategoriler->id)->get();
        $urunler = urunler::where('kid', $kategoriler->id)->where('aktif', 1)->get();
        
        return view('kategoriler', compact('kategoriler', 'alt_kategoriler', 'urunler', 'tum_kategoriler', 'ana_kategori'));
    }
}