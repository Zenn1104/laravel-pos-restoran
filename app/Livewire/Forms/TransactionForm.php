<?php

namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionForm extends Form
{
    public $customer_id;
    public $items;
    public $description;
    public $price;
    public $done = false;
    public ?Transaction $transaction;

    public function setTransaction(Transaction $transaction)
    {
        $this->transaction = $transaction;

        $this->customer_id = $transaction->customer_id;
        $this->items = $transaction->items;
        $this->description = $transaction->description;
        $this->price = $transaction->price;
        $this->done = $transaction->done;
    }

    public function store()
    {
        $validate = $this->validate([
            'customer_id' => '',
            'items' => 'required',
            'description' => 'required',
            'price' => 'required',
            'done' => 'required',
        ]);

        Transaction::create($validate);
        $this->reset();
    }

    public function update()
    {
        $validate = $this->validate([
            'customer_id' => 'required',
            'items' => 'required',
            'description' => 'required',
            'price' => 'required',
            'done' => 'required',
        ]);

        $this->transaction->update($validate);
        $this->reset();
    }
}