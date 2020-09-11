<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slayt extends Model
{
    use SoftDeletes;
    protected $table = "slayt";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';
}
