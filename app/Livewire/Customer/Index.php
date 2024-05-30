<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $number = 1;
    protected $listeners = [
        'reload' => '$refresh'
    ];
    public function render()
    {
        return view('livewire.customer.index', [
            'customers' => Customer::when($this->search, function ($menu){
                $menu->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('contact', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%');
            })->get()
        ]);
    }
}