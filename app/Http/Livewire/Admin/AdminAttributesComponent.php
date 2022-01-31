<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAttributesComponent extends Component
{
    use WithPagination;

    public function deleteAttribute($id){
        $attribute = ProductAttribute::find($id);

        $attribute->delete();

        session()->flash('message', 'Attribute deleted successfully!');
    }

    public function render()
    {
        $attributes = ProductAttribute::latest()->paginate(12);
        return view('livewire.admin.admin-attributes-component', ['attributes' => $attributes])->layout('layouts.base');
    }
}
