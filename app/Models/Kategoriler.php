<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategoriler extends Model
{
    use SoftDeletes;
    protected $table = "kategoriler";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';


    public function ust_kategori()
    {
        return $this->belongsTo('App\Models\Kategoriler', 'ust_id')->withDefault([
            'baslik' => ''
        ]);
    }
    
}
