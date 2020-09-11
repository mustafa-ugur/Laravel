<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $table = "blog";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';
}
