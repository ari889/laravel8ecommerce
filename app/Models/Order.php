<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * order with user one to one relation ship
     */
    public function users(){
        return $this->belongsTo(User::class);
    }

    /**
     * one order to many order item one to many relationship
     */
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    /**
     * order with shipping one to one relation ship
     */
    public function shipping(){
        return $this->hasOne(Shipping::class);
    }


    /**
     * order with transection one to one relationship
     */
    public function transection(){
        return $this->hasOne(Transection::class);
    }
}
