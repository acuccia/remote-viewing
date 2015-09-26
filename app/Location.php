<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'link',
    ];

    public function targets()
    {
        return $this->hasMany(\App\Target::class);
    }

    public function experiments()
    {
        return $this->belongsToMany(\App\Experiment::class, 'decoys');
    }
}
