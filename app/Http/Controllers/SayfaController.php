<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use App\Models\Sayfa;
use Illuminate\Http\Request;

class SayfaController extends Controller
{
    public function index($id)
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        $sayfalar = sayfa::all();
        $sayfa = sayfa::whereId($id)->firstOrFail();
        return view('sayfa', compact('ana_kategori', 'tum_kategoriler', 'sayfa', 'sayfalar'));
    }
}
