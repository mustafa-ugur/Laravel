<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slayt;

class SlaytController extends Controller
{
    public function index()
    {
        $slaytlar = slayt::all();
        return view('admin.slayt.index', compact('slaytlar'));
    }

    public function form($id = 0)
    {
        $entry = new slayt;
        if ($id > 0) {
            $entry = slayt::find($id);
        }

        $slayt = slayt::all();

        return view('admin.slayt.form', compact('entry', 'slayt'));
    }

    public function kaydet ($id = 0)
    {
        $data = request()->only('baslik', 'ozet', 'link');
        

        if ($id > 0)
        {
            $entry = slayt::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        else
        {
            $entry  = slayt::create($data);
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
                $resim->move('upload/slayt', $dosya_adi);

                slayt::updateOrCreate(
                    ['id' => $entry->id],
                    ['resim' => $dosya_adi]

                );
            }
        }
        return redirect()->route('admin.slayt');
    }


    public function aktif($id)
    {
        
        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = slayt::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.slayt');

    }


    public function pasif($id)
    {
        
        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = slayt::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.slayt');

    }


    public function sil($id)
    {
        slayt::destroy($id);

        return redirect()->route('admin.slayt');
    }
}
