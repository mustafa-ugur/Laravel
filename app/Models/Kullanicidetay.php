<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kullanicidetay extends Model
{
    protected $table = "kullanici_detay";
    public $timestamps = false;
    protected $guarded = [];


    public function kullanici()
    {
        return $this->belongsTo('App\Models\Kullanici');
    }
}
