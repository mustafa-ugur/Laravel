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
                            <h5 class="m-b-10">Kategoriler Listesi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Kategoriler Listesi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin-top: 10px;">Kategoriler Listesi</h5>
                        <a href="{{ route('admin.kategoriler.ekle') }}" class="btn btn-primary float-right"> Kategoriler Ekle </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="autofill" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori Adı</th>
                                        <th>Üst Kategorisi</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Site</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $lis)
                                    <tr>
                                        <td>{{ $lis->id }}</td>
                                        <td>{{ $lis->baslik }}</td>
                                        <td>{{ $lis->ust_kategori->baslik }}</td>
                                        <td>{{ $lis->created_at }}</td>
                                        
                                        <td style="width: 2%;">
                                        @if ($lis->aktif == 1)
                                            <a class="btn aktif" href="{{ route('admin.kategoriler.pasif', $lis->id) }}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            @else
                                            <a class="btn pasif" href="{{ route('admin.kategoriler.aktif', $lis->id) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @endif
                                        </td>
                                        
                                        <td class="table-action" style="width: 10%;">
                                            <a href="{{ route('admin.kategoriler.duzenle', $lis->id) }}" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="{{ route('admin.kategoriler.sil', $lis->id) }}" onclick="return confirmDel();" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori Adı</th>
                                        <th>Üst Kategorisi</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Site</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection