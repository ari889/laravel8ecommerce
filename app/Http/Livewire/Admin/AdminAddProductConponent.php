<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminAddProductConponent extends Component
{

    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function mount(){
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'slug' => 'required|string|unique:products,slug',
            'short_description' => 'required|max:255',
            'description' => 'required|max:5000',
            'regular_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'SKU' => 'required|unique:products,SKU',
            'stock_status' => 'required',
            'featured' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif',
            'category_id' => 'required|integer'
        ]);
    }

    public function addProduct(){
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:products,slug',
            'short_description' => 'required|max:255',
            'description' => 'required|max:5000',
            'regular_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'SKU' => 'required|unique:products,SKU',
            'stock_status' => 'required',
            'featured' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif',
            'category_id' => 'required|integer'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->sort_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'Product added successfully');
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-conponent', ['categories' => $categories])->layout('layouts.base');
    }
}
