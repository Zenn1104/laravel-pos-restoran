<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
    public $show = false;
    public Transaction $transaction;

    #[On('detailTransaction')]
    public function detailTransaction(Transaction $transaction)
    {
        $this->show = true;
        $this->transaction = $transaction;
    }

    public function closeModal()
    {
        $this->show = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.transaction.detail');
    }
}