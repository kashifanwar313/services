<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use App\Models\Quote;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function create_quote()
    {
        $quote = Quote::create([
            'hash_id' => Str::uuid()->toString(),
            'quote_status' => 1,
            'numOfFloors' => request()->numOfFloors,
            'houseSquareFootageVal' => request()->houseSquareFootageVal,
            'houseSquareFootageKnow' => request()->houseSquareFootageKnow,
            'houseSquareFootageDontKnow' => request()->houseSquareFootageDontKnow,
            'houseWash' => json_encode(request()->houseWash),
            'checkedServices' => json_encode(request()->checkedServices),
            'note' => request()->note,
            'roof' => json_encode(request()->roof),
            'driveway' => json_encode(request()->driveway),
            'contact' => json_encode(request()->contact)
        ]) ;
        if($quote){
            $query = Plan::query();
            if(count(request()->checkedServices) > 0){
                $query = $query->with(['service', 'price_sheet'])->whereIn('service_id', request()->checkedServices)->get();
            }
            return response()->json([
                'price_sheets' => $query,
                'quote_id' => $quote->hash_id,
                'email' => request()->contact['email']
            ]);
        }
        else{
            return response()->json([
                'error' => 'An Unknown error occured'
            ]);
        }
    }

    public function quotes()
    {
        $quotes = Quote::query();
        if(request()->has('plan'))
            $quotes = $quotes->with('story')->where('quote_status', request()->plan)->orderBy('id', 'DESC')->get();
        else
            $quotes = $quotes->with('story')->orderBy('id', 'DESC')->get();

        return view('dashboard.quotes.index', compact('quotes'));
    }

    public function quote_details()
    {
        $details = Quote::with('story')->where('id', request()->id)->orderBy('id', 'DESC')->get();
        return view('dashboard.quotes.details', compact('details'));
    }
}
