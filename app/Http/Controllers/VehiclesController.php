<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehiclesRequest;
use App\Http\Requests\UpdateVehiclesRequest;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vehicles.index', [
            'vehicles' => Vehicles::orderBy('start_time', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Vehicles $vehicle)
    {
        return view('vehicles.create', ['vehicle' => $vehicle]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'plate' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'created_by' => 'required'
        ]);

        $vehicle = Vehicles::create([
            'type' => $request->type,
            'plate' => strtoupper($request->plate),
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'created_by' => $request->created_by,
        ]);

        $vehicle->save();

        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicles $vehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicles $vehicle)
    {
        return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicles $vehicle)
    {
        $request->validate([
            'type' => 'required',
            'plate' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'created_by' => 'required'
        ]);

        $vehicle->update([
            'type' => $request->type,
            'plate' => strtoupper($request->plate),
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicles $vehicle)
    {
        $vehicle->delete();

        return back();
    }
}
