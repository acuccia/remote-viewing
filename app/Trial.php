<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function experiment()
    {
        return $this->belongsTo(\App\Experiment::class);
    }
}
