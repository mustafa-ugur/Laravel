@extends('admin.bolum.master')
@section('title', 'Admin Panel')
@section('content')



<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ürün {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Ürün {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Ürün {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.urunler.kaydet', $entry->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ürün Adı</label>
                                        <input type="text" class="form-control" name="baslik" placeholder="Ürün Adı" value="{{ $entry->baslik }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ürün Kodu</label>
                                        <input type="text" class="form-control" name="kod" placeholder="Ürün Kodu" value="{{ $entry->kod }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ürün Stok</label>
                                        <input type="text" class="form-control" name="stok" placeholder="Ürün Stok" value="{{ $entry->stok }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Piyasa Fiyatı</label>
                                        <input type="text" class="form-control" name="ana_fiyat" placeholder="Piyasa Fiyatı" value="{{ $entry->ana_fiyat }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Satış Fiyatı</label>
                                        <input type="text" class="form-control" name="satis_fiyat" placeholder="Satış Fiyatı" value="{{ $entry->satis_fiyat }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ürün Kısa Açıklama</label>
                                        <textarea name="ozet" id="" class="form-control" rows="3" placeholder="Ürün Kısa Açıklama" >{{ $entry->ozet }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ürün Açıklama</label>
                                        <textarea name="aciklama" id="aciklama" class="form-control" id="" rows="5" placeholder="Ürün Açıklama" >{{ $entry->aciklama }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Marka Seçiniz</label>
                                        <select name="marka" class="form-control">
                                            <option value="">Lüften Seçiniz</option>
                                            @foreach($marka as $mark)
                                            <option value="{{ $mark->id }}" {{ $mark->id == $entry->kid ? 'selected' : '' }}> {{ $mark->baslik }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Seçiniz</label>
                                        <select class="form-control" name="kid">
                                            <option> Kategori Seçiniz </option>
                                            @foreach($kategoriler as $kat)
                                            <option value="{{ $kat->id }}" {{ $kat->id == $entry->kid ? 'selected' : '' }} >{{ $kat->baslik }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        @if($entry->resim != null)
                                            <img src="/upload/urunler/{{ $entry->resim }}" alt="" style="    width: 30%;">
                                        <br>
                                        @endif
                                        <label for="exampleInputEmail1">Resim Ekle</label>
                                        <input type="file" class="form-control" name="resim">
                                    </div>


                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" name="one_cikan" value="1" {{ $entry->one_cikan ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Öne Çıkan Ürünler</label>
                                    </div>


                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" name="cok_satan" value="1" {{ $entry->cok_satan ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Çok Satan Ürünler</label>
                                    </div>



                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" name="hafta" value="1" {{ $entry->hafta ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Haftanın Fırsatları</label>
                                    </div>


                                    <button type="submit" class="btn  btn-primary">{{ @$entry->id > 0 ? "Güncelle" : "Kaydet" }}</button>
                                </form>
                            </div>
                             
                        </div>
                      
                        
                       
                    </div>
                </div>
              
            </div>

        </div>
    </div>
</section>

@endsection