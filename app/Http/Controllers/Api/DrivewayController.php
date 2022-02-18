<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DrivewayResource;
use App\Models\DrivewaySidewalkPatios;
use Illuminate\Http\Request;

class DrivewayController extends Controller
{
    public function driveway()
    {
        return DrivewayResource::collection(DrivewaySidewalkPatios::all());
    }
}
