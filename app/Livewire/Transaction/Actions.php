<?php

namespace App\Livewire\Transaction;

use App\Livewire\Forms\TransactionForm;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Transaction;
use Livewire\Component;

class Actions extends Component
{
    public $search;
    public array $items = [];

    public TransactionForm $form;
    public ?Transaction $transaction;

    public function addItem(Menu $menu) 
    {
        if(isset($this->items[$menu->name])) {
            $item = $this->items[$menu->name];
            $this->items[$menu->name] = [
                'qty' => $item['qty'] + 1 ,
                'price' => $item['price'] + $menu->price
            ];
        } else {
            $this->items[$menu->name] = [
                'qty' => 1,
                'price' => $menu->price
            ];
        }
    }

    public function removeItem($key) 
    {
        $item = $this->items[$key];
        if($item['qty'] > 1) {
            $harga_satuan = $item['price'] / $item['qty'];
            $qty_new = $item['qty'] - 1;

            $this->items[$key]['qty'] = $qty_new;
            $this->items[$key]['price'] = $harga_satuan * $qty_new;
        } else {
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice()
    {
        if(isset($this->items)) {
            $pricess = array_column($this->items, 'price');
            return array_sum($pricess);
        } else {
            return 0;
        }
    }

    public function simpan()
    {
        $this->form->items = $this->items;
        $this->form->price = $this->getTotalPrice();

        if(isset($this->form->transaction)) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        $this->redirect(route('transaction.index'), true);
    }

    public function mount()
    {
        if(isset($this->transaction)) {
            $this->form->setTransaction($this->transaction);
            $this->items = $this->form->items;
        } 
    }

    public function render()
    {
        return view('livewire.transaction.actions', [
            'menus' => Menu::when($this->search, function ($menu){
                $menu->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('type', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%');
            })->get()->groupBy('type'),
            'customers' => Customer::pluck('name', 'id')
        ]);
    }
}