<?php

namespace App\Http\Controllers;

use App\Selection;
use App\Target;
use App\Trial;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function home()
    {
        if (Auth::guest()) {
            return view('pages.about');
        }

        // temp - send notification of user visiting home page
        // so I know who is in -ajc
        $user = Auth::user();
        Mail::raw('User Logged In: ' . $user->name, function ($message) use ($user) {
            $message->from('acuccia@gmail.com', 'RV Website');
            $date = Carbon::now()->format('m/d/y H:m:s');
            $message->to('acuccia@gmail.com')->subject($user->name . ' logged in at ' . $date);
        });
        return view('pages.home')->with('user', Auth::user());
    }

    public function statistics()
    {
        $users = User::whereHas('trials', function($query) {
            $query->where('complete', true);
        })->get();
        $totalUsers = $users->count();
        $totalTrials = Trial::whereComplete(true)->count();
        $totalHits = Trial::whereComplete(true)->has('hits', '>', 0)->count();
        $totalSelections = Selection::whereHas('trial', function($query) {
            $query->where('complete', true);
        })->count();
        $totalChoices = $totalTrials * 5;
        $targets = Target::has('expiredExperiment')->get();

//        $targets = Target

        return view('pages.statistics')->with(
            compact('totalUsers', 'totalTrials', 'totalHits', 'totalSelections',
                'totalChoices', 'targets'));
    }

}
