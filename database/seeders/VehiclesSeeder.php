<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('vehicles')->insert([
            'type' => 'Moto',
            'plate' => 'JD223P',
            'start_date' => Carbon::now()->format('Y-m-d'),
            'start_time' => Carbon::now()->format('H:i:s'),
            'end_date' => null,
            'end_time' => null,
            'total_time' => null,
            'final_cost' => null,
            'created_by' => 'Administrador',
            'is_parked' => 'true',
        ]);

        DB::table('vehicles')->insert([
            'type' => 'Liviano',
            'plate' => 'PDF9338',
            'start_date' => Carbon::now()->format('Y-m-d'),
            'start_time' => Carbon::now()->format('H:i:s'),
            'end_date' => null,
            'end_time' => null,
            'total_time' => null,
            'final_cost' => null,
            'created_by' => 'Administrador',
            'is_parked' => 'false',
        ]);
    }
}
