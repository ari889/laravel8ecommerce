<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttrubuteValue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attrubute_values';

    public function productAttribute(){
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
    }
}
