<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $bloglar = blog::all();
        return view('admin.blog.index', compact('bloglar'));
    }

    public function form($id = 0)
    {
        $entry = new blog;
        if ($id > 0) {
            $entry = blog::find($id);
        }

        $blog = blog::all();

        return view('admin.blog.form', compact('entry', 'blog'));
    }

    public function kaydet ($id = 0)
    {
        $data = request()->only('baslik', 'ozet', 'aciklama');
        

        if ($id > 0)
        {
            $entry = blog::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        else
        {
            $entry  = blog::create($data);
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
                $resim->move('upload/blog', $dosya_adi);

                blog::updateOrCreate(
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
        //return redirect()->route('admin.blog' ,$entry->id);
        return redirect()->route('admin.blog');
        //return view('yonetim.kategori.index', compact('entry'));
    }


    public function aktif($id)
    {
        
        $data = ['aktif' => 1 ];
        if ($id > 0)
        {
            $entry = blog::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.blog');

    }


    public function pasif($id)
    {
        
        $data = ['aktif' => 0 ];
        if ($id > 0)
        {
            $entry = blog::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.blog');

    }


 

    public function sil($id)
    {
        blog::destroy($id);

        return redirect()->route('admin.blog');
    }
}
