<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NuofcarResource;
use App\Models\NuOfCar;
use Illuminate\Http\Request;

class NuofcarController extends Controller
{
    public function nu_of_cars()
    {
        return NuofcarResource::collection(NuOfCar::all());
    }
}
