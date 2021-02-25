<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function pref()
    {
        return $this->belongsTo('App\Pref');
    }

}
