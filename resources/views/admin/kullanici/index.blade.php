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
                            <h5 class="m-b-10">Kullanıcı Listesi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Kullanıcı Listesi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin-top: 10px;">Kullanıcı Listesi</h5>
                        <a href="{{ route('admin.kullanici.ekle') }}" class="btn btn-primary float-right"> Kullanıcı Ekle </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="autofill" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-Posta</th>
                                        <th>Telefon</th>
                                        <th>Üyelik Tarihi</th>
                                        <th>Yönetici</th>
                                        <th>Site</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kullanicilar as $kullanici)
                                    <tr>
                                        <td>{{ $kullanici->id }}</td>
                                        <td>{{ $kullanici->adsoyad }}</td>
                                        <td>{{ $kullanici->email }}</td>
                                        <td>{{ $kullanici->detay->ceptelefon }}</td>
                                        <td>{{ $kullanici->created_at }}</td>
                                        @if ($kullanici->yonetici == 1)
                                        <td class="align-middle" style="width: 8%;">
                                            <span class="badge badge-success">Aktif</span>
                                        </td>
                                       <!--  <td class="text-right"><label class="badge badge-light-success"></label></td> -->
                                        @else
                                        <td class="align-middle" style="width: 8%;">
                                            <span class="badge badge-danger">Pasif</span>
                                        </td>
                                        @endif
                                        <td style="width: 2%;">
                                        @if ($kullanici->aktif == 1)
                                            <a class="btn aktif" href="{{ route('admin.kullanici.pasif', $kullanici->id) }}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            @else
                                            <a class="btn pasif" href="{{ route('admin.kullanici.aktif', $kullanici->id) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @endif
                                        </td>
                                        <td class="table-action" style="width: 10%;">
                                            <a href="{{ route('admin.kullanici.duzenle', $kullanici->id) }}" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="{{ route('admin.kullanici.sil', $kullanici->id) }}" onclick="return confirmDel();" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-Posta</th>
                                        <th>Telefon</th>
                                        <th>Üyelik Tarihi</th>
                                        <th>Yönetici</th>
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