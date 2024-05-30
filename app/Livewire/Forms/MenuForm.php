<?php

namespace App\Livewire\Forms;

use App\Models\Menu;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MenuForm extends Form
{
    public $name;
    public $price;
    public $description;
    public $type = "coffee";
    public $photo;

    public ?Menu $menu;

    public function setMenu(Menu $menu)
    {
        $this->menu = $menu;
        $this->name = $menu->name;
        $this->price = $menu->price;
        $this->description = $menu->description;
        $this->type = $menu->type;
    }

    public function store()
    {
        $valid = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
            'description' => '',
        ]);

        if($this->photo) {
            $validate['photo'] = $this->photo;
        }

        Menu::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
            'description' => '',
        ]);

        if($this->photo) {
            $validate['photo'] = $this->photo;
        }

        $this->menu->update($valid);
        $this->reset();
    }
}