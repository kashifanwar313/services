<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'square_foot_id',
        'story_id',
        'price',
        'time',
        'plan_id',
        'driveway_sidewalk_patio_id',
        'nu_of_car_id'
    ];

    public function square_foot(){
        return $this->belongsTo(SquareFoot::class);
    }

    public function story(){
        return $this->belongsTo(Story::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function driveway_sidewaik_patios(){
        return $this->belongsTo(DrivewaySidewalkPatios::class, 'driveway_sidewalk_patio_id');
    }

    public function nu_of_car(){
        return $this->belongsTo(NuOfCar::class);
    }
}
