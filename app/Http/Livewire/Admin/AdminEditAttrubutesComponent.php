<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminEditAttrubutesComponent extends Component
{
    public $name;
    public $attribute_id;

    public function mount($id){
        $attribute = ProductAttribute::find($id);
        $this->name = $attribute->name;
        $this->attribute_id = $attribute->id;
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string'
        ]);
    }


    public function updateAttribute(){
        $this->validate([
            'name' => 'required|string'
        ]);
        $attribute = ProductAttribute::find($this->attribute_id);
        $attribute->name = $this->name;
        $attribute->save();

        session()->flash('message', 'Attribute updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-attrubutes-component')->layout('layouts.base');
    }
}
