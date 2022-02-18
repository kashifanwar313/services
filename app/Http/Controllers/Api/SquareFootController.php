<?php

namespace App\Http\Controllers\Api;

use App\Models\SquareFoot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SquareFootResource;

class SquareFootController extends Controller
{
    /**
     * Get all the square foot list.
     */
    public function squareFoots() {
        return SquareFootResource::collection(SquareFoot::all());
    }
}
