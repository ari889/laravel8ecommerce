<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttrubutesComponent extends Component
{
    public $name;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string'
        ]);
    }

    public function storeAttribute(){
        $this->validate([
            'name' => 'required|string'
        ]);
        $attribute = new ProductAttribute();
        $attribute->name = $this->name;
        $attribute->save();

        session()->flash('message', 'Attribute addedd successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-attrubutes-component')->layout('layouts.base');
    }
}
