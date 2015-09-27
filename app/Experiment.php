<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $dates = [
        'start_date'
    ];

    public static function fromTargetAndDecoys($target, $decoys)
    {
        $experiment = Experiment::create();
        $experiment->target()->save($target);
        $experiment->decoys()->saveMany($decoys->all());
        $experiment->save();
        return $experiment;
    }

    public function decoys()
    {
        return $this->belongsToMany(\App\Location::class, 'decoys');
    }

    public function target()
    {
        return $this->hasOne(\App\Target::class);
    }
}
