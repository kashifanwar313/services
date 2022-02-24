<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public $appends = ['services'];

    protected $fillable = [
        'hash_id',
        'quote_status',
        'numOfFloors',
        'houseSquareFootageVal',
        'houseSquareFootageKnow',
        'houseSquareFootageDontKnow',
        'houseWash',
        'checkedServices',
        'note',
        'roof',
        'driveway',
        'contact',
        'plans_id',
        'signature',
        'total_estimated_time',
        'total_amount'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class, 'numOfFloors');
    }

    public function square_foot()
    {
        return $this->belongsTo(SquareFoot::class, 'numOfFloors');
    }

    public function getServicesAttribute()
    {
        return json_decode($this->checkedServices);
    }
}
