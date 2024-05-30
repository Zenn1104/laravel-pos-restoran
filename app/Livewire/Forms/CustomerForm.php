<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
    public $name;
    public $contact;
    public $description;

    public ?Customer $customer;

    public function setMenu(Customer $customer)
    {
        $this->customer = $customer;
        $this->name = $customer->name;
        $this->contact = $customer->contact;
        $this->description = $customer->description;
    }

    public function store()
    {
        $valid = $this->validate([
            'name' => 'required',
            'contact' => 'required',
            'description' => '',
        ]);

        Customer::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'name' => 'required',
            'contact' => 'required',
            'description' => '',
        ]);

        $this->customer->update($valid);
        $this->reset();
    }
}