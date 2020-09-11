<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;

class KategorilerController extends Controller
{
    public function index ()
    {
        $list2 = Kategoriler::get();
        $list = Kategoriler::with('ust_kategori')->orderByDesc('created_at')->paginate(1000);
        //$ustu == Kategoriler::
        return view('admin.kategoriler.index', compact('list', 'list2'));
    }

    public function form($id = 0)
    {
        $entry = new Kategoriler;
        if ($id > 0) {
            $entry = Kategoriler::find($id);
        }

        $kategoriler = Kategoriler::all();

        return view('admin.kategoriler.form', compact('entry', 'kategoriler'));
    }



    public function kaydet($id = 0)
    {
        $data = request()->only('baslik', 'goster', 'ust_id');

        if ($id > 0)
        {
            $entry = Kategoriler::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        else
        {
            $entry  = Kategoriler::create($data);
        }

        return redirect()->route('admin.kategoriler' ,$entry->id);
        //return view('yonetim.kategori.index', compact('entry'));
    }


    public function aktif($id)
    {
        
        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = Kategoriler::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.kategoriler');

    }


    public function pasif($id)
    {
        
        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = Kategoriler::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.kategoriler');

    }

    public function sil($id)
    {
        Kategoriler::destroy($id);

        return redirect()->route('admin.kategoriler');
    }
}
