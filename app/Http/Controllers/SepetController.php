<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use App\Models\Sepet;
use App\Models\Sepeturun;
use App\Models\Urunler;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SepetController extends Controller
{
    public function index() {
        $ana_kategori = Kategoriler::whereRaw('ust_id is null')->where('aktif', 1)->get();
        $tum_kategoriler = Kategoriler::where('aktif', 1)->get();
        $urunler = urunler::where('aktif', 1)->get();
        return view('sepet', compact('ana_kategori', 'tum_kategoriler', 'urunler'));
    }

    public function ekle()
    {
        $urun = urunler::find(request('id'));
        $cartItem = Cart::add($urun->id, $urun->baslik, 1, $urun->satis_fiyat);
        //$cartItem = Cart::add($urun->id, $urun->baslik, 1, $urun->satis_fiyat, ['resim' => $urun->resim]);

        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');

            if (!isset($aktif_sepet_id))
            {
                $aktif_sepet = Sepet::create([
                    'uye_id' => auth()->id()
                ]);
                $aktif_sepet_id = $aktif_sepet->id;
                session()->put('aktif_sepet_id', $aktif_sepet_id);
            }

            SepetUrun::updateOrCreate(
                ['sepet_id' => $aktif_sepet_id, 'urun_id' => $urun->id],
                ['adet' => $cartItem->qty, 'fiyat' => $urun->satis_fiyat, 'durum' => 'Beklemede']
            );
        }
        return redirect()->route('sepet');
    }

    public function kaldir ($rowid)
    {
        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::get($rowid);
            SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->delete();
        }
        Cart::remove($rowid);
        return redirect()->route('sepet');
    }

    public function bosalt ()
    {
        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            SepetUrun::where('sepet_id', $aktif_sepet_id)->delete();
        }

        Cart::destroy();
        return redirect()->route('sepet');
    }

    public function guncelle($rowid)
    {

        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::get($rowid);

            if (request('adet') == 0)
            {
                SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->where('urun_id', $cartItem->id)->delete();
            }
            else
            {
                SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->where('urun_id', $cartItem->id)->update(['adet' => request('adet')]);
            }
        }
        Cart::update($rowid, request('adet'));
        return response()->json(['success'=>true]);
    }
}
