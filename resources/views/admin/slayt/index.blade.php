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
                            <h5 class="m-b-10">Slayt Listesi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Slayt Listesi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin-top: 10px;">Slayt Listesi</h5>
                        <a href="{{ route('admin.slayt.ekle') }}" class="btn btn-primary float-right"> Slayt Ekle </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="autofill" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Resim</th>
                                        <th>Slayt Başlığı</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Sİte</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slaytlar as $slayt)
                                    <tr>
                                        <td>{{ $slayt->id }}</td>
                                        <td style="width: 5%;">
                                            <img src="/upload/slayt/{{ $slayt->resim }}" class="wid-70 align-top m-r-15">
                                        </td>
                                        <td>{{ $slayt->baslik }}</td>
                                        <td>{{ $slayt->created_at }}</td>
                                        <td style="width: 2%;">
                                        @if ($slayt->aktif == 1)
                                            <a class="btn aktif" href="{{ route('admin.slayt.pasif', $slayt->id) }}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            @else
                                            <a class="btn pasif" href="{{ route('admin.slayt.aktif', $slayt->id) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @endif
                                        </td>
                                        <td class="table-action" style="width: 10%;">
                                            <a href="{{ route('admin.slayt.duzenle', $slayt->id) }}" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="{{ route('admin.slayt.sil', $slayt->id) }}" onclick="return confirmDel();" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Resim</th>
                                        <th>Slayt Başlığı</th>
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