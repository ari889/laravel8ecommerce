<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponsConponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    public function updated($fields){
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'value' => 'required',
            'cart_value' => 'required',
            'expiry_date' => 'required'
        ]);
    }

    public function storeCoupon(){
        $this->validate([
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message', 'Coupon added successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupons-conponent')->layout('layouts.base');
    }
}
