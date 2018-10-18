<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserImage extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function image()
    {
    	return $this->belongsTo('App\Models\Image');
    }
}
