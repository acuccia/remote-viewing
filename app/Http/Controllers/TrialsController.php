<?php

namespace App\Http\Controllers;

use App\Trial;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TrialsController extends Controller
{
    public function show($id)
    {
        if ( ! Auth::user()->is_admin) {
            return redirect('home');
        }

        $trial = Trial::findOrFail($id);
        return view('trials.show')->with('trial', $trial);
    }

    public function walkthrough(Request $request)
    {
        $trial = Trial::findOrFail($request->trialId);

        if ($trial->expired()) {
            $trial->delete();
            Trial::refreshTrials($request->user());
            Session::flash('message', 'The last trial has expired. Please try the next one.');
            return redirect('/home');
        }

        switch ($request->stage) {
            case 'start':
                $trial->stage = 'view';
                $trial->save();
                return redirect('/home');

            case 'view':
                $trial->stage = 'evaluate'; // skipping feedback for now
                $trial->save();
                return redirect('/home');

            case 'feedback':
                $trial->notes = $request->notes;
                $trial->stage = 'evaluate';
                $trial->save();
                return redirect('/home');

            case 'evaluate':
                $this->validate($request, ['targets' => 'required']);
                $this->saveChoices($trial, $request->targets);
                $trial->stage = 'confirm';
                $trial->save();
                return redirect('/home');

            case 'confirm':
                if ($request->Edit) {
                    $trial->stage = 'evaluate';
                    $trial->save();
                } else if ($request->Confirm) {
                    $trial->complete = true;
                    $trial->save();
                }
                return redirect('/home');
        }
    }

    private function saveChoices($trial, $selected)
    {
        $trial->selections()->sync($selected);
    }

    public function history()
    {
        return view('trials.history');
    }

}
