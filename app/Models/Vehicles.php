<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'plate', 'description', 'start_date', 'start_time', 'end_date',
        'end_time', 'total_time', 'final_cost', 'created_by', 'is_parked'
    ];
}
