<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCouponsConponent extends Component
{
    use WithPagination;

    public function deleteCoupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message', 'Coupon has been deleted successfully!');
    }

    public function render()
    {
        $coupons = Coupon::paginate();
        return view('livewire.admin.admin-coupons-conponent', ['coupons' => $coupons])->layout('layouts.base');
    }
}
