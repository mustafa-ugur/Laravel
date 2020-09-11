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
                            <h5 class="m-b-10">Marka {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Marka {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Marka {{ @$entry->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.marka.kaydet', $entry->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Marka Adı</label>
                                        <input type="text" class="form-control" name="baslik" placeholder="Marka Adı" value="{{ $entry->baslik }}" require>
                                    </div>

                                    <div class="form-group">

                                        @if($entry->resim != null)
                                            <img src="/upload/marka/{{ $entry->resim }}" alt="" style="    width: 30%;">
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