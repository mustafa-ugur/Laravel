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
                            <h5 class="m-b-10">Kullanıcı {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Kullanıcı {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Kullanıcı {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.kullanici.kaydet', $entry->id) }}" method="post">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adı Soyadı</label>
                                        <input type="text" class="form-control" name="adsoyad" placeholder="Adı Soyadı" value="{{ $entry->adsoyad }}" require>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefon</label>
                                        <input type="text" class="form-control" name="telefon" placeholder="Telefon" value="{{ $entry->detay->telefon }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cep Telefon</label>
                                        <input type="text" class="form-control" name="ceptelefon" placeholder="Cep Telefon" value="{{ $entry->detay->ceptelefon }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-Posta</label>
                                        <input type="email" class="form-control" name="email" placeholder="E-Posta" value="{{ $entry->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Şifre</label>
                                        <input type="password" class="form-control" name="sifre" placeholder="Şifre">
                                    </div>

                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" name="yonetici" value="1" {{ $entry->yonetici ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Yönetici Olarak Ekle</label>
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