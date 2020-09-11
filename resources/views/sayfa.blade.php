@extends('bolum.master')
@section('title', $sayfa->baslik)
@section('content')
<section class="heading-banner-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a><span class="breadcome-separator">></span></li>
                            <li><a href="#">Kurumsal</a><span class="breadcome-separator">></span></li>
                            <li> {{ $sayfa->baslik }}</li>
                        </ul>
                    </div>
                    <div class="heading-banner-title">
                        <h1>{{ $sayfa->baslik }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-area mt-20">
    <div class="container">
        <div class="row">
            <!--Blog Image Post Start-->
            <div class="col-lg-9 col-md-12 col-12">
                <!--Blog Post Start-->
                <div class="blog-post-wrapper">
                    <div class="post-thumbnail img-full">
                        <img src="/upload/sayfa/{{ $sayfa->resim }}" alt="">
                    </div>
                    <div class="postinfo-wrapper">
                        <div class="post-header">
                            <h1 class="post-title">{{$sayfa->baslik}}</h1>
                        </div>
                        <div class="post-info">
                            <div class="entry-content mb-30">
                                <p>{{$sayfa->aciklama}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-12">
                <div class="right-sidebar-area">
                    <div class="widget widget-categories">
                        <h3 class="widget-title">Sayfalar</h3>
                        <ul class="sidebar-menu">
                            @foreach($sayfalar as $page)
                            <li><a href="{{ route('sayfa', $page->id) }}">{{$page->baslik}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
