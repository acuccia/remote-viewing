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
        $location = $this->pickLocationAsTarget();
        return view('experiments.create', compact('location', 'free'));
    }

    private function pickLocationAsTarget()
    {
        // choose 1 of the available locations as a target

        // returns a location object instead of a collection when you
        // pick only 1
        $loc = $this->pickUnusedLocations(1);
        return $loc;
    }

    private function pickUnusedLocations($amount = 1)
    {
        $used = array_keys(Location::has('targets')->get()->keyBy('id')->toArray());
        $used = array_merge($used, array_keys(Location::has('experiments')->get()->keyBy('id')->toArray()));
        $available = Location::whereNotIn('id', $used)->get();
        $locations = $available->random($amount);
        return $locations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create the target from the location
        $location = Location::find($request->location_id);
        $target = Target::create();
        $target->location()->associate($location);
        $target->coordinates = $request->coordinates;
        $target->save();

        // pick the decoys
        $decoys = $this->pickUnusedLocations(4);

        // create the experiment, attach target and decoys
        $experiment = Experiment::create();
        $experiment->target()->save($target);
        $experiment->decoys()->saveMany($decoys->all());
        $experiment->save();

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
