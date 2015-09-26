<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{

    public function decoys()
    {
        return $this->belongsToMany(\App\Location::class, 'decoys');
    }

    public function target()
    {
        return $this->hasOne(\App\Target::class);
    }
}
