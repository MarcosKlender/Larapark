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
        $from = $request->from_date;
        $to = $request->to_date;

        $vehicles = Vehicles::where('is_parked', FALSE)
            ->whereBetween('start_date', [$from, $to])
            ->orderBy('start_time', 'desc')
            ->get();

        return view('history.search', ['vehicles' => $vehicles, 'from' => $from, 'to' => $to]);
    }
}
