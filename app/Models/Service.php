<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    protected $appends = ['fullImage'];

    protected function getFullImageAttribute()
    {
        return url('uploads').'/'.$this->image;
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }
}
