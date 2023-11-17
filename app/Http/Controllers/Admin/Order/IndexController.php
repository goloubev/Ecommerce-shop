<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $order->products = json_decode($order->products);
        }

        return view('admin/orders/index', [
            'orders' => $orders,
        ]);
    }
}
