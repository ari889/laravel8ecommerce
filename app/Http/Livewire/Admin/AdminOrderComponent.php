<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public function updateOrderStatus($order_id, $status){
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered"){
            $order->delivered_date = Carbon::today();
        }else if($status = "cancel"){
            $order->cancel_date = Carbon::today();
        }
        $order->save();

        session()->flash('order_message', 'Order status has been updaed successfully!');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.admin.admin-order-component', ['orders' => $orders])->layout('layouts.base');
    }
}
