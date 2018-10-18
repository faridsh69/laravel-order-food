<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function city()
    {
    	return $this->belongsTo('App\Models\City')->first();
    }
}
