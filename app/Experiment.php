<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $fillable = [
        'start_date'
    ];

    protected $dates = [
        'start_date'
    ];

    public static function fromTargetAndDecoys($target, $decoys)
    {
        $experiment = Experiment::create();
        $targets = array_merge($decoys, []);
        $targets[] = $target;
        shuffle($targets);
        $experiment->targets()->saveMany($targets);
//        $experiment->target()->save($target);
//        $experiment->decoys()->saveMany($decoys);
        $experiment->save();
        return $experiment;
    }

    public function setStartDateAttribute($date)
    {
        $c = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        $this->attributes['start_date'] = $c;//Carbon::createFromFormat('Y-m-d H:i:s', $date);
    }

    public function getTarget()
    {
        return $this->target()->first();
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'targets')->orderBy('id');
    }

    public function decoys()
    {
        return $this->hasMany(\App\Target::class)->where('is_decoy', true);
    }

    public function target()
    {
        // just the actual target, not the decoys
        return $this->hasMany(\App\Target::class)->where('is_decoy', false);
    }

    public function targets()
    {
        // all targets, including decoys
        return $this->hasMany(\App\Target::class);
    }

    public function trials()
    {
        return $this->hasMany(Trial::class);
    }
}
