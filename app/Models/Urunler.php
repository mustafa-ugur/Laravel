<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Urunler extends Model
{
    use SoftDeletes;
    protected $table = "urunler";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';


}
