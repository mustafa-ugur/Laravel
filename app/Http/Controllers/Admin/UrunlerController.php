<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Marka;
use App\Models\Kategoriler;
use App\Models\Resimler;

class UrunlerController extends Controller
{
    public function index ()
    {
        $list = urunler::all();
        //$kategoriler = $list->kategoriler()->distinct()->get();
        return view('admin.urunler.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new urunler;
        //$urun_kategorileri = [];
        if ($id > 0) {
            $entry = urunler::find($id);
            //$urun_kategorileri = $entry->kategoriler()->pluck('kategoriler_id')->all();
        }
        $urunler = urunler::all();
        $marka = marka::all();
        $kategoriler = kategoriler::all();
        return view('admin.urunler.form', compact('entry', 'urunler', 'marka', 'kategoriler'));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only('baslik', 'kod', 'marka', 'stok', 'ana_fiyat', 'satis_fiyat', 'aciklama', 'ozet', 'cok_satan', 'one_cikan', 'hafta', 'kid');

        //$kategori_ekle = request('kid');

        if ($id > 0)
        {
            $entry = urunler::where('id', $id)->firstOrFail();
            $entry->update($data);
            //$entry->kategoriler()->sync($kategori_ekle);
        }

        else
        {
            $entry  = urunler::create($data);
            $entry->kategoriler()->attach($kategori_ekle);
        }

        if (request()->hasFile('resim'))
        {
            $this->validate(request(), [
                'resim' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $resim = request()->file('resim');

            $dosya_adi = $entry->id . "-" . time() . "." . $resim->extension();

            if ($resim->isValid())
            {
                $resim->move('upload/urunler', $dosya_adi);

                urunler::updateOrCreate(
                    ['id' => $entry->id],
                    ['resim' => $dosya_adi]
                );
            }

        }

        return redirect()->route('admin.urunler');
        //return view('yonetim.kategori.index', compact('entry'));
    }





    public function aktif($id)
    {

        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = urunler::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.urunler');

    }


    public function pasif($id)
    {

        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = urunler::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.urunler');

    }



    public function sil($id)
    {
        urunler::destroy($id);

        return redirect()->route('admin.urunler');
    }



}
