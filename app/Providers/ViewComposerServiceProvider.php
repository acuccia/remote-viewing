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

            // get the target for the active trial
            $target = null;
            if ($active) {
                $target = $active->experiment->target->first();
            }

            // get the next available experiment
            $next = Experiment::where('start_date', '>', Carbon::now())
                ->orderBy('start_date', 'asc')
                ->first();

            // attach the data to the view
            $view->with(compact('active', 'next', 'target'));
        });

        // compose the history page view
        view()->composer('trials.history', function($view) {
            $user = Auth::user();
            $history = $user->trials()->whereComplete(true)->get();
            $view->with(compact('history'));
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
