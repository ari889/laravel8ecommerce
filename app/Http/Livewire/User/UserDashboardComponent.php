<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserDashboardComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $orders = Order::orderBy('created_at', "DESC")->where('user_id', Auth::user()->id)->paginate(12);
        $totalCost = Order::where('status', '!=', 'cancel')->where('user_id', Auth::user()->id)->sum('total');
        $totalPurchase = Order::where('status', '!=', 'cancel')->where('user_id', Auth::user()->id)->count();
        $totalDelivered = Order::where('status', 'delivered')->where('user_id', Auth::user()->id)->count();
        $totalCancelled = Order::where('status', 'cancel')->where('user_id', Auth::user()->id)->count();
        return view('livewire.user.user-dashboard-component', [
            'orders' => $orders,
            'totalCost' => $totalCost,
            'totalPurchase' => $totalPurchase,
            'totalDelivered' => $totalDelivered,
            'totalCancelled' => $totalCancelled
        ])->layout('layouts.base');
    }
}
