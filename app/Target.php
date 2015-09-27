<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Target extends Model
{
    protected $fillable = [
        'coordinates'
    ];

    public static function fromLocationWithCoordinates($location_id, $coordinates)
    {
        $location = Location::find($location_id);
        $target = Target::create();
        $target->location()->associate($location);
        $target->coordinates = $coordinates;
        $target->save();
        return $target;
    }

    public function location()
    {
        return $this->belongsTo(\App\Location::class);
    }

    public function experiment()
    {
        return $this->belongsTo(\App\Experiment::class);
    }

}
