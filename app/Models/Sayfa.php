<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sayfa extends Model
{
    use SoftDeletes;
    protected $table = "sayfa";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';
}
