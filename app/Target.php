<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'coordinates'
    ];

    public function location()
    {
        return $this->belongsTo(\App\Location::class);
    }

    public function experiment()
    {
        return $this->belongsTo(\App\Experiment::class);
    }

}
