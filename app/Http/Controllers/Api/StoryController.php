<?php

namespace App\Http\Controllers\Api;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoryResource;

class StoryController extends Controller
{
    /**
     * Get all the stories list.
     */
    public function stories() {
        return StoryResource::collection(Story::all());
    }
}
