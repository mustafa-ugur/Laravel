@extends('bolum.master')
@section('title', $siparis->baslik)
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
                        @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                            <h1>{{ $sepet_urun->urun->baslik }}</h1>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-area mt-20">
    <div class="container">
        <div class="row">


        </div>
    </div>
</section>
@endsection
