<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Urunler;
use App\Models\Slayt;
use App\Models\Blog;
use App\Models\Marka;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $blog = blog::all();
        $markalar = marka::all();
        $slayt = slayt::all();
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        //$kategoriler = Kategoriler::with('ust_kategori')->orderByDesc('created_at')->paginate(1000);
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        //$urunler = urunler::with('kategoriler')->where('id', 'id')->get();
        $one_cikan = urunler::where('one_cikan', 1)->where('aktif', 1)->get();
        $cok_satan = urunler::where('cok_satan', 1)->where('aktif', 1)->get();
        $hafta = urunler::where('hafta', 1)->where('aktif', 1)->get();
        $yeni_urunler = urunler::where('aktif', 1)->orderByDesc('created_at')->get();

        return view('index' , compact('blog', 'slayt', 'one_cikan', 'cok_satan', 'hafta', 'tum_kategoriler', 'ana_kategori', 'yeni_urunler', 'markalar', 'yeni_kat'));
    }
}
