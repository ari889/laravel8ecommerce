<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductConponent extends Component
{
    use WithPagination;

    public function deleteProduct($id){
        $product = Product::find($id);

        if($product->image){
            if(file_exists(public_path('assets/images/products'.'/'.$product->image))){
                unlink(public_path('assets/images/products'.'/'.$product->image));
            }
        }

        if($product->images){
            $images = explode(',', $product->images);
            foreach($images as $image){
                if($image){
                    if(file_exists(public_path('assets/images/products'.'/'.$image))){
                        unlink(public_path('assets/images/products'.'/'.$image));
                    }
                }
            }
        }

        $product->delete();
        session()->flash('message', 'Product Deleted!');
    }

    public function render()
    {
        $products = Product::latest()->paginate(10);
        return view('livewire.admin.admin-product-conponent', ['products' => $products])->layout('layouts.base');
    }
}
