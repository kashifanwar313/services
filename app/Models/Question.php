<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'question', 'type_id'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
