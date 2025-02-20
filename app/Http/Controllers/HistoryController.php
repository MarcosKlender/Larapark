<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index');
    }

    public function search(Request $request)
    {
        try {
            // Convertir las fechas de MM/DD/YYYY a un formato universal (YYYY-MM-DD)
            $from = \Carbon\Carbon::parse($request->from_date)->toDateString();
            $to = \Carbon\Carbon::parse($request->to_date)->toDateString();

            $vehicles = Vehicles::where('is_parked', false)
                ->whereBetween('start_date', [$from, $to])
                ->orderBy('start_time', 'desc')
                ->get();

            return view('history.search', ['vehicles' => $vehicles, 'from' => $from, 'to' => $to]);
        } catch (\Exception $e) {
            return back()->with('error', 'Formato de fecha inválido');
        }
    }
}
