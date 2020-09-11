
<!DOCTYPE HTML>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Resim Yükle</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<div class="page-wrapper">
    <div class="container">


        <div class="card mt-3">
            <div class="card-header bg-success">
                <h5 style="color:#fff;" class="mb-0">Fotoğraf Yükleme Formu</h5>
            </div>
            <div class="card-body border-primary p-4">
                <form class="upload-form" method="post" action="upload.php" enctype="multipart/form-data">
                  <input name="data_id" value="5" type="hidden">

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="file[]" id="file" multiple class="custom-file-input  file" required>
                            <label class="custom-file-label" for="inputGroupFile01">Dosyaları Seçiniz</label>
                        </div>
                    </div>

                    <div class="form-group">
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

<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function($){
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
                type: 'POST',
                url: "upload.php",
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
</body>
</html>
