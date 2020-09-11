<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Kullanici;
use App\Models\Kullanicidetay;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class KullaniciController extends Controller
{
    public function kaydol_form()
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        return view('kullanici.kaydol', compact('ana_kategori', 'tum_kategoriler'));
    }

    public function giris_form()
    {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        return view('kullanici.giris', compact('ana_kategori', 'tum_kategoriler'));
    }

    public function giris()
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
                'password' => request()->get('sifre')
            ];
            if (auth()->attempt($credentials))
            {
                return redirect()->route('index');
            }

            else {
                return back()->withInput();
            }

        }
        
            return view('giris');   
    }


    public function kaydol()
    {
        $this->validate(request(), [
            'adsoyad' => 'required|min:5|max:60',
            'email' => 'required|email|unique:kullanici',
            'sifre' => 'required|confirmed|min:5|max:30'
        ]);
        $kullanici = kullanici::create([
            'adsoyad' => request('adsoyad'),
            'email' => request('email'),
            'sifre' => Hash::make(request('sifre')),
            'yonetici' => 0
        ]);
        $kullanici->detay()->save(new KullaniciDetay());

        //auth()->login($kullanici);

        return redirect()->route('index');

    }

    public function cikis ()
    {
       Auth()->logout();
       request()->session()->flush();
       request()->session()->regenerate();
       return redirect()->route('kullanici.giris');
    }

}
