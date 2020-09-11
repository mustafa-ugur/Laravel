<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sayfa;

class SayfaController extends Controller
{
    public function index()
    {
        $sayfalar = sayfa::all();
        return view('admin.sayfa.index', compact('sayfalar'));
    }

    public function form($id = 0)
    {
        $entry = new sayfa;
        if ($id > 0) {
            $entry = sayfa::find($id);
        }

        $sayfa = sayfa::all();

        return view('admin.sayfa.form', compact('entry', 'sayfa'));
    }

    public function kaydet ($id = 0)
    {
        $data = request()->only('baslik', 'ozet', 'aciklama');
        

        if ($id > 0)
        {
            $entry = sayfa::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        else
        {
            $entry  = sayfa::create($data);
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
                $resim->move('upload/sayfa', $dosya_adi);

                sayfa::updateOrCreate(
                    ['id' => $entry->id],
                    ['resim' => $dosya_adi]

                );
            }

            //$resim = request()->resim;
            //$resim->extension(); uzantı çeker
            //$resim->getClientOriginalName(); dosyanın orjinal adı
            //$resim->hashName(); rast gele isim verme
        }


        //return redirect()->route('yonetim.kullanici.duzenle', $entry->id);
        //return redirect()->route('admin.sayfa' ,$entry->id);
        return redirect()->route('admin.sayfa');
        //return view('yonetim.kategori.index', compact('entry'));
    }

 

    public function aktif($id)
    {
        
        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = sayfa::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.sayfa');

    }


    public function pasif($id)
    {
        
        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = sayfa::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.sayfa');

    }



    public function sil($id)
    {
        sayfa::destroy($id);

        return redirect()->route('admin.sayfa');
    }
}
