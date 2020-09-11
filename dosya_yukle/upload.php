<?php
ini_set("max_execution_time", 0);
ini_set("set_time_limit", 0);
ini_set('max_file_uploads', '200');
require_once 'cropper/autoload.php';
use Gregwar\Image\Image;
header('Content-Type: text/html; charset=utf-8');

$uploaded = [];
$allowed = ['png', "zip", "jpg", "jpeg"];

$succeeded = [];
$failed = [];

$db = new PDO("mysql:host=localhost;dbname=larvel_ecommerce;charset=utf8", "root", "root");

$ext = ".png";

$imageFolder = "images/";
$fileFolder = "../public/upload/urunler/";

set_time_limit(0);

$yuklenen = 0;
$hata = 0;
$data_id = @$_POST["data_id"];
$toplam = 0;
if(!empty($_FILES['file'])){
	foreach($_FILES['file']['name'] as $key => $name){
		if($_FILES['file']['error'][$key] === 0){
			$temp = $_FILES['file']['tmp_name'][$key];

            $ext = explode('.', $name);
            $ext = strtolower(end($ext));


            if(in_array($ext, $allowed)){
                /*
                $rand = rand(1111111111, 9999999999);
                $fileName = $rand.".".$ext;
                */
                $rand = rand((int)1111111111, (int)9999999999);
                $fileName = "$rand"."."."$ext";

                    $yukle = move_uploaded_file($temp, $fileFolder.$fileName);

                    if ($yukle){

                        Image::open($fileFolder . $fileName)->scaleResize(0, 1400)->save($fileFolder . $fileName);

                        $query = $db->prepare("INSERT INTO resimler SET data_id = ?, resim = ?");

                        $insert = $query->execute(array(
                            $data_id, $fileName
                        ));

                        if ($insert) {
                            $toplam++;
                            $yuklenen++;
                        }

                    }
                    else {
                        $hata++;
                    }

            }

		}
	}
    echo json_encode(array(
        'toplam'=>$toplam,
        'yuklenen' => $yuklenen,
        'hata' => $hata
    ));

}


