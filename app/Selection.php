<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    protected $table = 'target_trial';

    public function trial()
    {
        return $this->belongsTo(Trial::class);
    }
}
