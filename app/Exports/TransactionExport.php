<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExport implements FromView
{
    public $month;
    public $year;
    public function __construct($month)
    {
        [$this->year, $this->month] = explode("-", $month);
    }
    public function view(): View
    {
        return view('export.transaction', [
            'transactions' => Transaction::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->get()
        ]);
    }
}