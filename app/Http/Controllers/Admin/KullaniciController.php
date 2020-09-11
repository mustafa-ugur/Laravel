<?php

namespace App\Http\Controllers\Admin;

use App\Models\KullaniciDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kullanici;
use Auth;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{
    function index()
    {
        $kullanicilar = Kullanici::all();
        return view('admin.kullanici.index', compact('kullanicilar'));
    }


    public function oturumac()
    {
        if (request()->isMethod('POST'))
        {
            $this->validate(request(), [
               'email' => 'required|email',
                'sifre' => 'required'
            ]);

            $credentials =
            [
                'email' => request()->get('email'),
                'password' => request()->get('sifre'),
                'yonetici' => 1
            ];
            if (Auth::guard('admin')->attempt($credentials))
            {
                return redirect()->route('admin.index');
            }

            else {
                return back()->withInput();
            }

        }

            return view('admin.oturumac');
    }


    public function form($id = 0)
    {
        $entry = new Kullanici;
        if ($id > 0) {
            $entry = Kullanici::find($id);
        }

        return view('admin.kullanici.form', compact('entry'));
    }

    public function kaydet($id = 0)
    {
            $this->validate(request(), [
                'adsoyad' => 'required',
                'email' => 'required|email'
            ]);

            $data = request()->only('adsoyad', 'email');
            if (request()->filled('sifre'))
            {
                $data['sifre'] = Hash::make(request('sifre'));
            }
            $data['yonetici'] = request()->has('yonetici') ? 1 : 0;

            if ($id > 0)
            {
                $entry = Kullanici::where('id', $id)->firstOrFail();
                $entry->update($data);
            }

            else
            {
                $entry  = Kullanici::create($data);
            }


        KullaniciDetay::updateOrCreate(
            ['kullanici_id' => $entry->id],
            ['adres' => request('adres'), 'telefon' => request('telefon'), 'ceptelefon' => request('ceptelefon')]

        );

            //return redirect()->route('admin.kullanici.duzenle', $entry->id);
            //return redirect()->route('admin.kullanici.duzenle' ,$entry->id);
            return redirect()->route('admin.kullanici');
    }


    public function aktif($id)
    {

        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = kullanici::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.kullanici');
    }


    public function pasif($id)
    {
        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = kullanici::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        return redirect()->route('admin.kullanici');
    }


    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()->route('admin.kullanici');
    }


    public function cikis ()
    {
        Auth::guard('admin')->logout();
       //Auth()->logout();
       request()->session()->flush();
       request()->session()->regenerate();
       return redirect()->route('admin.oturumac');
    }


}
