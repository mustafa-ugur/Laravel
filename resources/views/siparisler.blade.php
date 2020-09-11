@extends('bolum.master')
@section('title', 'Siparişler')
@section('content')
<section class="heading-banner-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a><span class="breadcome-separator">></span></li>
                            <li> Siparişler </li>
                        </ul>
                    </div>
                    <div class="heading-banner-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-area mt-20">
    <div class="container">
        <div class="row">
            <table class="table-bordered table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ürün Adı</th>
                    <th scope="col">Sipariş Tutarı</th>
                    <th scope="col">Adet</th>
                    <th scope="col">Durum</th>
                    <th>Detay</th>
                </tr>
                </thead>
                <tbody>
                @foreach($siparisler as $siparis)
                <tr>
                    <th scope="row"> {{ $siparis->id }} </th>
                    <td>
                        @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                            {{ $sepet_urun->urun->baslik }}
                            <br>
                        @endforeach
                    </td>
                    <td>{{ $siparis->siparis_tutari }} ₺ </td>
                    <td>{{ $siparis->sepet->sepet_urun_adet() }}</td>
                    <td>{{ $siparis->durum }}</td>
                    <td style="width: 5%;"><a href="{{ route('siparis', $siparis->id) }}" class="btn btn-danger"> <i class="fa fa-link"></i> </a></td>
                </tr>
                @endforeach
                <!--
                @foreach($siparisler as $siparis)
                    @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                        <tr>
                            <th scope="row"> {{ $siparis->id }} </th>
                        <td>
                                {{ $sepet_urun->urun->baslik }}
                            </td>
                            <td>{{ $siparis->siparis_tutari }} ₺ </td>
                        <td>{{ $sepet_urun->adet }}</td>
                        <td>{{ $siparis->durum }}</td>
                        <td style="width: 5%;"><a href="{{ route('siparis', $siparis->id) }}" class="btn btn-danger"> <i class="fa fa-link"></i> </a></td>
                    </tr>
                    @endforeach
                @endforeach
-->
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
