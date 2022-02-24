<?php

namespace App\Exports;

use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QuotesExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.quotes.view_pdf', [
            'quotes' => Quote::with('story')->orderBy('id', 'DESC')->get()
        ]);
    }
}
