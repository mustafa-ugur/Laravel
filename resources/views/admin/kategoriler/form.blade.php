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
                            <h5 class="m-b-10">Kategoriler {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Kategoriler {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Kategoriler {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.kategoriler.kaydet', $entry->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Üst Kategori Seçiniz</label>
                                        <select name="ust_id" id="ust_id" class="form-control">
                                            <option value="">Lüften Seçiniz</option>
                                            @foreach($kategoriler as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $kategori->id == $entry->ust_id ? 'selected' : '' }}> @if($kategori->ust_id != null) - @endif {{ $kategori->baslik }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Adı</label>
                                        <input type="text" class="form-control" name="baslik" placeholder="Kategori Adı" value="{{ $entry->baslik }}" require>
                                    </div>

                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" name="goster" value="1" {{ $entry->goster ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Anasayfada Göster</label>
                                        <br>
                                        <label for="exampleInputEmail1">(Sadece Ana Kategoriler İçin Seçiniz)</label>
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