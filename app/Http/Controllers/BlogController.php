<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        $bloglar = blog::all();
        return view('bloglar', compact('ana_kategori', 'tum_kategoriler', 'bloglar'));
    }

    public function blog($id)
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        $bloglar = blog::all();
        $blog = blog::whereId($id)->firstOrFail();
        return view('blog', compact('ana_kategori', 'tum_kategoriler', 'blog', 'bloglar'));
    }

}
