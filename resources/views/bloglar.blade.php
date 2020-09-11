@extends('bolum.master')
@section('title', 'Blog')
@section('content')
<section class="heading-banner-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-banner">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a><span class="breadcome-separator">></span></li>
                            <li> Blog</li>
                        </ul>
                    </div>
                    <div class="heading-banner-title">
                        <h1>Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="product-list-grid-view-area mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-lg-2 order-1">
                <div class="shop-product-area">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade show active">
                            <div class="row product-container">
                                @foreach($bloglar as $blog)
                                    <div class="col-lg-3 col-md-3 item-col2">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ route('blog', $blog->id) }}">
                                                    <img class="first-img" src="/upload/blog/{{ $blog->resim }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h2><a href="{{ route('blog', $blog->id) }}">{{ $blog->baslik }}</a></h2>
                                                <div class="product-price">
                                                    <a class="button add-btn" style="margin-top: -20px;" href="{{ route('blog', $blog->id) }}" data-toggle="tooltip" title="">Devamını Oku</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
