<?php

namespace App\Http\Controllers\Admin\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $password = Hash::make('123');

        $user = User::firstOrCreate([
            'email' => $data['email'] // unique
        ], [
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => $password,
        ]);

        $order = Order::create([
            'products' => json_encode($data['products']),
            'total_price' => $data['total_price'],
            'user_id' => $user->id,
        ]);

        return new OrderResource($order);
    }
}
