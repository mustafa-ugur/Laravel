@extends('admin.bolum.master')
@section('title', 'Admin Panel')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Blog {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Blog {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <form action="{{ route('admin.blog.kaydet', $entry->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Başlığı</label>
                                        <input type="text" class="form-control" name="baslik" placeholder="Blog Başlığı" value="{{ $entry->baslik }}" require>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Kısa Açıklama</label>
                                        <textarea name="ozet" rows="3" class="form-control" placeholder="Blog Kısa Açıklama"> {{ $entry->ozet }} </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Açıklama</label>
                                        <textarea name="aciklama" id="aciklama" rows="3" class="form-control" placeholder="Blog Açıklama"> {{ $entry->aciklama }} </textarea>
                                    </div>

                                    <div class="form-group">
                                        @if($entry->resim != null)
                                            <img src="/upload/blog/{{ $entry->resim }}" alt="" style="width: 30%;">
                                            <br>
                                        @endif
                                        <label for="exampleInputEmail1">Resim Ekle</label>
                                        <input type="file" class="form-control" name="resim">
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