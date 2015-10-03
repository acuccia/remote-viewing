<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Target extends Model
{
    protected $fillable = [
        'coordinates',
        'experiment_id',
        'location_id'
    ];

    public static function fromLocationWithCoordinates($location_id, $coordinates)
    {
        // DOES NOT SAVE TARGET -
        // must save through experiment for foreign key check
        $location = Location::find($location_id);
        $target = new Target;
        $target->location()->associate($location);
        $target->coordinates = $coordinates;
        $target->is_decoy = false;
        return $target;
    }

    public static function decoysFromLocations($locations)
    {
        $decoys = [];
        foreach($locations as $location) {
            $t = new Target;
            $t->location()->associate($location);
            $t->is_decoy = true;
            $decoys[] = $t;
        }

        return $decoys;
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
