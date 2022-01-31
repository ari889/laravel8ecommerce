<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function subCategories(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function attributeValues(){
        return $this->hasMany(AttrubuteValue::class, 'product_id');
    }


}
