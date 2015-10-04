<?php

namespace App\Http\Controllers;

use App\Trial;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TrialsController extends Controller
{
    public function walkthrough(Request $request)
    {
        $trial = Trial::findOrFail($request->trialId);

        if ($trial->revealed) {
            // don't allow any previous stages if target was already revealed
            $trial->stage = 'reveal';

            // posting from the reveal stage, means they
            // want the next experiment
            if ($request->stage == 'reveal') {
                $trial->complete = true;
            }
            $trial->save();
            return redirect('/home');
        }

        switch ($request->stage) {
            case 'start':
                $trial->stage = 'view';
                $trial->save();
                return redirect('/home');

            case 'view':
                $trial->stage = 'feedback';
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
                    $trial->stage = 'reveal';
                    $trial->revealed = true;
                    $trial->save();
                }
                return redirect('/home');

            case 'reveal':
                $trial->complete = true;
                $trial->save();
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
