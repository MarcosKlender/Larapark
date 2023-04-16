<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function index()
    {
        return view('vehicles.index', [
            'vehicles' => Vehicles::orderBy('start_time', 'desc')->get()
        ]);
    }

    public function create(Vehicles $vehicle)
    {
        return view('vehicles.create', ['vehicle' => $vehicle]);
    }

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

    public function show(Vehicles $vehicles)
    {
        //
    }

    public function edit(Vehicles $vehicle)
    {
        return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

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

    public function destroy(Vehicles $vehicle)
    {
        $vehicle->delete();

        return back();
    }

    public function close(Request $request)
    {
        $vehicle = Vehicles::find($request->id);

        $total_hours = substr((int)$request->total_time, 0, 2) + 1;
        $total_cost = $total_hours * 1;

        $vehicle->update([
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
            'total_time' => $request->total_time,
            'final_cost' => $total_cost,
            'is_parked' => $request->is_parked,
        ]);

        return back();
    }
}
