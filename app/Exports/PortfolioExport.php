<?php

namespace App\Exports;

use App\Models\portfolio;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PortfolioExport implements FromView
{
    public function view(): View
    {
        $portfolios = portfolio::all();
        return view('layouts.backend.portfolio.excel', [
            'portfolios' => portfolio::all()
        ]);
    }
}
