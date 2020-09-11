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
                            <h5 class="m-b-10">Ürün Listesi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item"><a href="#">Ürün Listesi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin-top: 10px;">urunler Listesi</h5>
                        <a href="{{ route('admin.urunler.ekle') }}" class="btn btn-primary float-right"> Ürün Ekle </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="autofill" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Resim</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Kodu</th>
                                        <th>Satış Fiyatı</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Stok</th>
                                        <th>Çoklu Resim Ekleme</th>
                                        <th>Site</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $lis)
                                    <tr>
                                        <td>{{ $lis->id }}</td>
                                        <td style="width: 5%;">
                                            <img src="/upload/urunler/{{ $lis->resim }}" class="wid-70 align-top m-r-15">
                                        </td>
                                        <td>{{ $lis->baslik }}</td>
                                        <td>{{ $lis->kod }}</td>
                                        <td>{{ $lis->satis_fiyat }}</td>
                                        <td>{{ $lis->created_at }}</td>
                                        <td>{{ $lis->stok }}</td>
                                        <td style="width: 10%;"> <a href="#{{ $lis->id }}" class="btn btn-primary open-dialog"> Resim Ekle </a> </td>

                                        <td style="width: 2%;">
                                        @if ($lis->aktif == 1)
                                            <a class="btn aktif" href="{{ route('admin.urunler.pasif', $lis->id) }}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            @else
                                            <a class="btn pasif" href="{{ route('admin.urunler.aktif', $lis->id) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @endif
                                        </td>
                                        <td class="table-action" style="width: 10%;">
                                            <a href="{{ route('admin.urunler.duzenle', $lis->id) }}" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="{{ route('admin.urunler.sil', $lis->id) }}" onclick="return confirmDel();" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <div id="{{ $lis->id }}" style="display: none; width: 70%;">

                                            <section class="pcoded-main-container" style="margin-left: 0px; min-height: auto; background: transparent">
                                                <div class="pcoded-content" style="margin-top: 20px;">

                                                    <div class="page-header">
                                                        <div class="page-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <div class="page-header-title">
                                                                        <h5 class="m-b-10">File Upload</h5>
                                                                    </div>
                                                                    <ul class="breadcrumb">
                                                                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                                        <li class="breadcrumb-item"><a href="file-upload.html#!">File Upload</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>Çoklu Resim Ekleme</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form class="upload-form" method="post" action="http://localhost:8888/e-ticaret/dosya_yukle/upload.php" enctype="multipart/form-data">
                                                                    <input name="data_id" value="{{ $lis->id }}" type="hidden">

                                                                        <div class="input-group mb-3">
                                                                            <div class="custom-file">
                                                                                <input type="file" name="file[]" id="file" multiple class="custom-file-input  file" required>
                                                                                <label class="custom-file-label" for="inputGroupFile01">Dosyaları Seçiniz</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="gallery"></div>

                                                                        <div class="form-group col-md-12">
                                                                            <button type="submit" id="submit" class="btn btn-success btn-lg px-5">YÜKLE</button>
                                                                        </div>

                                                                        <div class="progress" style="height: 30px; display: none;">
                                                                            <div class="progress-bar bg-success" role="progressbar"   aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                        <div class="return"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

<style>
    .gallery img{
        width: 20%;
        float: left;
        padding: 20px;
    }
</style>

<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

<script>

        function removeImage(item) {

            item.parent().remove();
        }
        jQuery(document).ready(function($){
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();


                        reader.onload = function(event) {
                            var htmlImage =  '<div>';
                            htmlImage = htmlImage +  '<img  src="'+event.target.result+'" />';
                            //htmlImage = htmlImage +  '<input onclick="removeImage($(this))" type="button" value="Resmi Sil" />';
                            htmlImage = htmlImage +  '</div>';
                            $($.parseHTML(htmlImage)).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#file').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

        $(".upload-form").on('submit', (function(ev) {
            ev.preventDefault();
            var dt = new FormData($(this)[0]);
            $("#submit").hide();
            $(".progress").show();
            var prog = $(".progress-bar");
            $.ajax({
                xhr: function()
                {

                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total * 100;
                            prog.css("width",parseInt(percentComplete)+"%");
                            prog.html(parseInt(percentComplete)+"%");
                            if (parseInt(percentComplete) === 100){
                                setTimeout(function () {
                                    prog.addClass("progress-bar-striped progress-bar-animated");
                                    prog.html("Yükleme Tamamlandı. Veriler Kaydediliyor...");
                                },500);
                            }
                        }
                    }, false);
                    xhr.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total * 100;
                            prog.css("width",parseInt(percentComplete)+"%");
                            prog.html(parseInt(percentComplete)+"%");
                            if (parseInt(percentComplete) === 100){
                                setTimeout(function () {
                                    prog.addClass("progress-bar-striped progress-bar-animated");
                                    prog.html("Yükleme Tamamlandı. Veriler Kaydediliyor...");
                                },500);
                            }
                        }
                    }, false);
                    return xhr;
                },
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                type: 'POST',
                url: "http://localhost:8888/e-ticaret/dosya_yukle/upload.php",
                data: dt,
                processData: false,
                contentType: false,
                success: function (data) {
                    $("#submit").show();
                    $(".progress").hide();
                    $(".upload-form")[0].reset();
                    console.log(data);
                    var obj = jQuery.parseJSON(data);

                    $(".return").append("<div class='alert alert-success'>Toplam <strong>"+obj.yuklenen+"</strong> Adet Dosya Başarıyla Yüklendi.<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                        "    <span aria-hidden=\"true\">&times;</span>\n" +
                        "  </button></div>");

                    if (obj.hata > 0){
                        $(".return").append("<div class='alert alert-danger'><strong>"+obj.hata+"</strong> Hata Oluştu.</div><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                            "    <span aria-hidden=\"true\">&times;</span>\n" +
                            "  </button>");
                    }
                }
            });
        }));
    });
</script>

                                    </div>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Resim</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Kodu</th>
                                        <th>Satış Fiyatı</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Stok</th>
                                        <th>Çoklu Resim Ekleme</th>
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
