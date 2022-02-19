<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function quote()
    {
        $query = Plan::query();
        if(count(request()->checkedServices) > 0){
            $query = $query->with(['service', 'price_sheet'])->whereIn('service_id', request()->checkedServices)->get();
        }
        return response()->json($query);
    }
}
