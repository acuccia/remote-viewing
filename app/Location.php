<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'link',
    ];

    public static function pickUnused($amount = 1)
    {
        $used = array_keys(Location::has('targets')->get()->keyBy('id')->toArray());
        $used = array_merge($used, array_keys(Location::has('experiments')->get()->keyBy('id')->toArray()));
        $available = Location::whereNotIn('id', $used)->get();
        $locations = $available->random($amount);
        return $locations;
    }



    public function targets()
    {
        return $this->hasMany(\App\Target::class);
    }

    public function experiments()
    {
        return $this->belongsToMany(\App\Experiment::class, 'decoys');
    }
}
