<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'plate', 'description', 'start_date', 'start_time', 'end_date',
        'end_time', 'total_time', 'final_cost', 'created_by', 'is_parked'
    ];

    public function types(): HasMany
    {
        return $this->hasMany(Types::class);
    }
}
