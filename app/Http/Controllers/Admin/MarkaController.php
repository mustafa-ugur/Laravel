<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marka;

class MarkaController extends Controller
{
    public function index()
    {
        $markalar = marka::all();
        return view('admin.marka.index', compact('markalar'));
    }

    public function form($id = 0)
    {
        $entry = new marka;
        if ($id > 0) {
            $entry = marka::find($id);
        }

        $marka = marka::all();

        return view('admin.marka.form', compact('entry', 'marka'));
    }

    public function kaydet ($id = 0)
    {
        $data = request()->only('baslik');
        

        if ($id > 0)
        {
            $entry = marka::where('id', $id)->firstOrFail();
            $entry->update($data);

        }

        else
        {
            $entry  = marka::create($data);
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
                $resim->move('upload/marka', $dosya_adi);

                marka::updateOrCreate(
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
        //return redirect()->route('admin.marka' ,$entry->id);
        return redirect()->route('admin.marka');
        //return view('yonetim.kategori.index', compact('entry'));
    }

    public function aktif($id)
    {
        
        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = marka::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.marka');

    }


    public function pasif($id)
    {
        
        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = marka::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.marka');

    }
 

    public function sil($id)
    {
        marka::destroy($id);

        return redirect()->route('admin.marka');
    }

}
