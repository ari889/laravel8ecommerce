<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttrubuteValue;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
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
    public $images;
    public $scategory_id;
    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attributes_values;

    public function mount(){
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function add(){
        if(!in_array($this->attr, $this->attribute_arr)){
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
    }

    public function remove($attr){
        unset($this->inputs[$attr]);
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'slug' => 'required|string|unique:products,slug',
            'short_description' => 'required|max:255',
            'description' => 'required',
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
            'description' => 'required',
            'regular_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'SKU' => 'required|unique:products,SKU',
            'stock_status' => 'required',
            'featured' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif',
            'category_id' => 'required|integer',
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

        if($this->images){
            $imagesName = '';
            foreach($this->images as $key=>$image){
                $imgName = Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('products', $imgName);
                $imagesName = $imagesName . ','.$imgName;
            }
            $product->images = $imagesName;
        }

        if($this->scategory_id){
            $product->subcategory_id = $this->scategory_id;
        }
        $product->category_id = $this->category_id;
        $product->save();

        foreach($this->attributes_values as $key=>$attributes_value){
            $avalues = explode(",", $attributes_value);
            foreach($avalues as $avalue){
                $attr_value = new AttrubuteValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }

        session()->flash('message', 'Product added successfully');
    }

    public function changeSubcategory(){
        $this->scategory_id = 0;
    }


    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-conponent', ['categories' => $categories, 'scategories' => $scategories, 'pattributes' => $pattributes])->layout('layouts.base');
    }
}
