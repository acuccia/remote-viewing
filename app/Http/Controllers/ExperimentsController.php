<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Location;
use \App\Target;
use \App\Experiment;


class ExperimentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('experiments.index')->with('experiments', Experiment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total = Location::all()->count();
        $used = Location::has('targets')->count() + Location::has('experiments')->count();
        $free = $total - $used;
        if ($free < 5) {
            return redirect('/locations');
        }
        $location = Location::pickUnused(1);
        return view('experiments.create', compact('location', 'free'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * TODO Set the date of the experiment (add it to form)
         */

        // create the target
        $target = Target::fromLocationWithCoordinates($request->location_id, $request->coordinates);
        // pick the decoys
        $decoys = Location::pickUnused(4);
        // create the experiment, attach target and decoys
        Experiment::fromTargetAndDecoys($target, $decoys);
        // redirect to experiments list
        return redirect('/experiments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}