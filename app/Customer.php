<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Customer extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['birthday', 'created_at', 'updated_at', 'deleted_at'];

    public function pref()
    {
        return $this->belongsTo('App\Pref');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
