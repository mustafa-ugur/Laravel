<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use Illuminate\Http\Request;

class IletisimController extends Controller
{
    public function index()
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        return view('iletisim', compact('ana_kategori', 'tum_kategoriler'));
    }
}
