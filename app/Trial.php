<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{

    /**
     * Make sure the user's trials are up to date with any newly
     * created experiments
     *
     * @param $user
     */
    public static function refreshTrials($user)
    {
        // add in new experiments
        $trial_ids = array_keys($user->trials->keyBy('experiment_id')->toArray());
        $newExperiments = Experiment::where('start_date', '<=', Carbon::now())->whereNotIn('id', $trial_ids)->get();
        foreach ($newExperiments as $experiment) {
            $t = new Trial;
            $t->experiment()->associate($experiment);
            $user->trials()->save($t);
        }

        // make sure one trial is unlocked and not complete
        $active = $user->trials()
            ->whereLocked(false)
            ->whereComplete(false)
            ->get();
        if ($active->count() > 1) {
            throw new \Exception('More than 1 active trial');
        }
        if ($active->count() == 0 && $user->trials()->whereLocked(true)->whereComplete(false)->count() > 0) {
            // user has trials available, but all are locked, so unlock the first
            $active = $user->trials()
                        ->whereLocked(true)
                        ->whereComplete(false)
                        ->orderBy('experiment_id', 'asc')
                        ->first();
            $active->locked = false;
            $active->save();
        }
    }

    public function success()
    {
        return $this->selections->contains($this->experiment->getTarget()->id);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function experiment()
    {
        return $this->belongsTo(\App\Experiment::class);
    }

    public function selections()
    {
        return $this->belongsToMany(Target::class);
    }
}
