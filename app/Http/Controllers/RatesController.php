<?php

namespace App\Http\Controllers;

use App\Models\Rates;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function index()
    {
        return view('rates.index', [
            'rates' => Rates::orderBy('id', 'asc')->get()
        ]);
    }

    public function create()
    {
        return view('rates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cost_per_hour' => 'required',
            'created_by' => 'required'
        ]);

        $rate = Rates::create([
            'name' => strtoupper($request->name),
            'cost_per_hour' => $request->cost_per_hour,
            'created_by' => $request->created_by,
        ]);

        $rate->save();

        return redirect()->route('rates.index')->with('success','TARIFA CREADA');
    }

    public function show(Rates $rates)
    {
        //
    }

    public function edit(Rates $rate)
    {
        return view('rates.edit', ['rate' => $rate]);
    }

    public function update(Request $request, Rates $rate)
    {
        $request->validate([
            'name' => 'required',
            'cost_per_hour' => 'required',
        ]);

        $rate->update([
            'name' => strtoupper($request->name),
            'cost_per_hour' => $request->cost_per_hour,
        ]);

        return redirect()->route('rates.index')->with('success','TARIFA EDITADA');
    }

    public function destroy(Rates $rate)
    {
        $rate->delete();

        return back()->with('deleted','TARIFA ELIMINADA');
    }
}
