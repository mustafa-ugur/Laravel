<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Kategoriler;
use Illuminate\Support\Facades\DB;

class UrunlerController extends Controller
{
    public function index($id)
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->get();
        //$kategoriler = Kategoriler::with('ust_kategori')->orderByDesc('created_at')->paginate(1000);
        $tum_kategoriler = Kategoriler::all();
        $resimler = DB::select('select * from resimler where data_id = '.$id);

        $urun = Urunler::whereId($id)->firstOrFail();

        $urun_kategori = kategoriler::where('id', $urun->kid)->firstOrFail();
        if ($urun_kategori->ust_id != null) {
            $urun_ust_kategori = kategoriler::where('id', $urun_kategori->ust_id)->firstOrFail();
            return view('urun', compact('urun', 'tum_kategoriler', 'ana_kategori', 'urun_ust_kategori', 'urun_kategori', 'resimler'));
        }
        else {
            return view('urun', compact('urun', 'tum_kategoriler', 'ana_kategori', 'urun_kategori', 'resimler'));
        }
        
    }
}
