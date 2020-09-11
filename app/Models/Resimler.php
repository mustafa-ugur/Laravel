<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resimler extends Model
{
    use SoftDeletes;
    protected $table = "resimler";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';
}
