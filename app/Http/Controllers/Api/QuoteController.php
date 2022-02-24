<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use App\Models\Quote;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuotesExport;

use PDF;

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

    public function update_quote()
    {
        $quote = Quote::where('hash_id', request()->quoteId)->first();
        if($quote)
        {
            if($quote->quote_status==1){
                $update_quote = $quote->update([
                    'plans_id' => json_encode(request()->selectedPlans),
                    'signature' => request()->signature,
                    'total_estimated_time' => request()->totalTime,
                    'total_amount' => request()->totalPrice,
                    'quote_status' => 3
                ]);
                if($update_quote){
                    return response()->json([
                        'success' => 'Quoted Successfully With Hash ID: '. request()->quoteId,
                        'email' => json_decode($quote->contact)->email,
                        'quote_id' => $quote->hash_id,
                        'status' => 200,
                        'quote_status' => $quote->quote_status
                    ]);
                }
            } else {
                return response()->json([
                    'success' => 'Quoted Already Planned With Hash ID: '. request()->quoteId,
                    'email' => json_decode($quote->contact)->email,
                    'quote_id' => $quote->hash_id,
                    'status' => 200,
                    'quote_status' => $quote->quote_status
                ]);
            }

        }
        else
        {
            return response()->json([
                'error' => 'No Quote Found With Hash ID: '. request()->quoteId,
                'status' => 500
            ]);
        }
    }

    public function get_quote()
    {
        $quote = Quote::where('hash_id', request()->hash_id)->first();
        $price_sheets = Plan::with(['service', 'price_sheet'])->whereIn('service_id', json_decode($quote->checkedServices))->get();

        if($quote){
            return response()->json([
                'price_sheets' => $price_sheets,
                'quote_id' => $quote->hash_id,
                'email' => json_decode($quote->contact)->email,
                'quote_status' => $quote->quote_status,
            ]);
        }
        else{
            return response()->json([
                'error' => 'No Quote Found With Hash ID: '. request()->quoteId,
                'status' => 500
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

    public function createPDF() {
        return Excel::download(new QuotesExport, 'quotes.xlsx');
    }
}
