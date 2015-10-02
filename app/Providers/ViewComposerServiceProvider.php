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
            $active = $user->trials()->whereUnlocked(true)->whereComplete(false)->first();

            // get the completed trials
            $history = $user->trials()->whereComplete(true)->get();

            // get the next available experiment
            $next = Experiment::where('start_date', '>', Carbon::now())
                    ->orderBy('start_date', 'asc')
                    ->first();

            // attach the data to the view
            $view->with(['active' => $active, 'history' => $history, 'next' => $next]);
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