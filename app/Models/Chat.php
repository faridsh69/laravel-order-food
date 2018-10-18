<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = [];

    use SoftDeletes;

}
