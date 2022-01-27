<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $noofproducts;

    public function mount(){
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->noofproducts = $category->no_of_products;
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'selected_categories' => 'required',
            'noofproducts' => 'required'
        ]);
    }

    public function updateHomeCategory(){
        $this->validate([
            'selected_categories' => 'required',
            'noofproducts' => 'required'
        ]);
        $category = HomeCategory::find(1);

        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_products = $this->noofproducts;
        $category->save();

        session()->flash('message', 'Home category has been updated successfully!');
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
