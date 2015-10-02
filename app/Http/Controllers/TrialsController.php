<?php

namespace App\Http\Controllers;

use App\Trial;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TrialsController extends Controller
{
    public function setStage($trialId, $stage)
    {
        $trial = Trial::findOrFail($trialId);
        $trial->stage = $stage;
        $trial->save();

        return view('pages.home');
    }

    public function saveNotes($trialId, Request $request)
    {
        $trial = Trial::findOrFail($trialId);
        $trial->notes = $request->notes;
        $trial->stage = 4;
        $trial->save();

        return view('pages.home');
    }

    public function saveChoices($trialId, Request $request)
    {
        $trial = Trial::findOrFail($trialId);
//        $trial->notes = $request->notes;
        $trial->stage = 5;
        $trial->save();

        return view('pages.home');
    }

    public function edit($trialId)
    {
        $trial = Trial::findOrFail($trialId);
        $trial->stage = 4;
        $trial->save();

        return view('pages.home');
    }

    public function confirm($trialId)
    {
        $trial = Trial::findOrFail($trialId);
        $trial->stage = 6;
        $trial->save();

        return view('pages.home');
    }

    public function next($trialId)
    {
        $trial = Trial::findOrFail($trialId);
        $trial->complete = true;
        $trial->save();

        return view('pages.home');
    }

    public function score($trialId)
    {
        $trial = Trial::findOrFail($trialId);
        $trial->update(['complete' => true]);
    }

}
