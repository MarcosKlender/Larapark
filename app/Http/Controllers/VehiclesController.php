<?php

namespace App\Http\Controllers;

use App\Models\Rates;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function index()
    {
        $today = \Carbon\Carbon::today()->toDateString();
        $vehicles = Vehicles::where('is_parked', TRUE)
            ->orWhere('start_date', $today)
            ->orWhere('end_date', $today)
            ->orderBy('is_parked', 'desc')
            ->orderBy('start_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    public function create()
    {
        $types = Rates::orderBy('cost_per_hour', 'asc')->pluck('name');

        return view('vehicles.create', ['types' => $types]);
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

        return redirect()->route('vehicles.index')->with('success', 'VEHÍCULO CREADO');
    }

    public function show(Vehicles $vehicles)
    {
        //
    }

    public function edit(Vehicles $vehicle)
    {
        $types = Rates::orderBy('cost_per_hour', 'asc')->pluck('name');

        return view('vehicles.edit', ['vehicle' => $vehicle, 'types' => $types]);
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

        return redirect()->route('vehicles.index')->with('success', 'VEHÍCULO EDITADO');
    }

    public function destroy(Vehicles $vehicle)
    {
        $vehicle->delete();

        return back()->with('deleted', 'VEHÍCULO ELIMINADO');
    }

    public function dashboard()
    {
        $vehicles_count = Vehicles::count();
        $active_count = Vehicles::where('is_parked', TRUE)->count();
        $money_count = Vehicles::where('is_parked', FALSE)->sum('final_cost');

        return view('dashboard', ['vehicles_count' => $vehicles_count, 'active_count' => $active_count, 'money_count' => $money_count]);
    }

    public function close(Request $request)
    {
        $vehicle = Vehicles::find($request->id);
        $type = $vehicle->type;
        $cost = Rates::where('name', $type)->value('cost_per_hour');

        // Asegurar que total_time no tiene AM/PM y está en el formato correcto
        $total_time = $request->total_time; // Se recibe en HH:MM:SS
        list($hours, $minutes, $seconds) = explode(':', $total_time);

        // Convertir a número total de horas con decimales
        $total_hours = (int)$hours + ((int)$minutes / 60);

        // Calcular el costo total
        $total_cost = ceil($total_hours) * $cost; // Se redondea hacia arriba para cobrar hora completa

        $vehicle->update([
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
            'total_time' => $total_time,
            'final_cost' => $total_cost,
            'is_parked' => $request->is_parked,
        ]);

        return back()->with('success', 'SALIDA MARCADA');
    }
}
