<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;

class ServicesController extends Controller
{
    /**
     * Get all the services list.
     */
    public function services() {
        return ServiceResource::collection(Service::all());
    }
}
