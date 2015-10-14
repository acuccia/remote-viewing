<?php

namespace App\Providers;

use App\Experiment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // compose the home page view showing user's trials
        view()->composer('pages.home', function($view) {
            $user = Auth::user();
            \App\Trial::refreshTrials($user);

            // get the active trial
            $active = $user->trials()->whereLocked(false)->whereComplete(false)->first();

            // get the target and expiration for the active trial
            $target = null;
            $expiration = null;
            if ($active) {
                $target = $active->experiment->target->first();
                $expiration = $active->experiment->start_date->copy();
                $expiration->addDays(1);
            }

            // get the next available experiment
            $next = Experiment::where('start_date', '>', Carbon::now())
                ->orderBy('start_date', 'asc')
                ->first();

            // attach the data to the view
            $view->with(compact('active', 'next', 'target', 'expiration'));
        });

        // compose the history page view
        view()->composer('trials.history', function($view) {
            $user = Auth::user();
            $history = $user->trials()
                ->whereComplete(true)
                ->get();
            $chance = 0;
            $actual = 0;

            if ($history->count() > 0) {
                // stats
                $totalTrials = 0;
                $totalSelections = 0;
                $totalTargets = 0;
                $totalHits = 0;
                foreach($history as $trial) {
                    if ($trial->expired()) {
                        // only do stats on trials that have expired and
                        // thus have had the target and correct answers revealed
                        $totalTrials++;
                        $totalTargets += $trial->experiment->targets()->count();
                        $totalSelections += $trial->selections()->count();
                        if ($trial->success()) {
                            $totalHits++;
                        }
                    }
                }
//
//                $totalTrials = $user->trials()
//                    ->whereComplete(true)
//                    ->count();
//                $totalSelections = $user->selections()->count();
//                $totalTargets = $totalTrials * 5;
//                $totalHits = $user->trials()->has('hits', 1)->count();
                if ($totalTrials && $totalTargets) {
                    $chance = ($totalSelections / $totalTargets) * 100; // as a percentage
                    $actual = ($totalHits / $totalTrials) * 100; // as a percentage
                }
            }

            $view->with(compact('history', 'chance', 'actual'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
