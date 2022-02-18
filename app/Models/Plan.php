<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_name', 'features', 'service_id'];

    public function service()
    {
    	return $this->belongsTo(Service::class);
    }
}
