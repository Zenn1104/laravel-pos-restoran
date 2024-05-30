<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    public $show = false;
    public CustomerForm $form;
    
    #[On('createCustomer')]
    public function createCustomer()
    {
        $this->show = true;
    }

    #[On('editCustomer')]
    public function editCustomer(Customer $customer)
    {
        $this->form->setMenu($customer);
        $this->show = true;
        $this->dispatch('reload');
    }

    #[On('deleteCustomer')]
    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();
    }

    public function  simpan()
    {
        if(isset($this->form->customer)) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        $this->closeMenuModal();
        $this->dispatch('reload');
    }

    public function closeMenuModal()
    {
        $this->show = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.customer.actions');
    }
}