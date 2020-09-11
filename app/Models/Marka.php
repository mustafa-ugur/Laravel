<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marka extends Model
{
    use SoftDeletes;
    protected $table = "marka";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';
}
