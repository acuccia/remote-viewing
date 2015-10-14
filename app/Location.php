<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'link',
    ];

    /**
     * @param $amount   - how many locations to pick
     * @param $exclude  - array of locations to exclude
     * @return mixed
     */
    public static function pickUnused($amount, $exclude = [])
    {
        $used = array_keys(Location::has('targets')->get()->keyBy('id')->toArray());
        foreach($exclude as $location) {
            $used[] = $location->id;
        }
        $available = Location::whereNotIn('id', $used)->get();
        $locations = $available->random($amount);
        return $locations;
    }

    public function selections()
    {
        return $this->hasManyThrough(\App\Selection::class, \App\Target::class);
    }

    public function targets()
    {
        return $this->hasMany(\App\Target::class);
    }

    public function experiments()
    {
        dd('Location.php: should not be here');
        return $this->belongsToMany(\App\Experiment::class, 'targets');
    }
}
