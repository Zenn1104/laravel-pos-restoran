<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class Home extends Component
{
    public function toggleDone(Transaction $transaction)
    {   
        $transaction->done = !$transaction->done;
        $transaction->save();
    }

    public function render()
    {
        $today = date('Y-m-d');
        [$year, $month] = explode("-", date('Y-m'));

        $transaction = Transaction::whereMonth('created_at', $month)->whereYear('created_at', $year);
        return view('livewire.home', [
            'monthly' => $transaction->get()->sum('price'),
            'daily' => $transaction->whereDate('created_at', $today)->get(),
            'pendings' => Transaction::where('done', false)->get()
        ]);
    }
}