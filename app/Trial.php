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
            $t = Trial::create();
            $t->experiment_id = $experiment->id;
            $t->save();
            $user->trials()->save($t);
        }

        // make sure one trial is unlocked and not complete
        $active = $user->trials()->whereUnlocked(true)->whereComplete(false)->get();
        if ($active->count() > 1) {
            throw new \Exception('More than 1 active trial');
        }
        if ($active->count() == 0 && $user->trials()->whereUnlocked(false)->count() > 0) {
            // user has trials available, but all are locked, so unlock the first
            $active = $user->trials()->whereUnlocked(false)->orderBy('experiment_id', 'asc')->first();
            $active->unlocked = true;
            $active->save();
        }
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function experiment()
    {
        return $this->belongsTo(\App\Experiment::class);
    }
}
