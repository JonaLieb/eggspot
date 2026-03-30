<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $users = User::all();
        $products = Product::all();

        Order::factory()
            ->count(50)
            ->make()
            ->each(function ($order) use ($users, $products) {

                $order->user_id = $users->random()->id;
                $order->save();

                $items = collect();

                foreach (range(1, rand(1, 5)) as $i) {

                    $product = $products->random();
                    $quantity = rand(1, 5);
                    $unitPrice = $product->price;
                    $lineTotal = $quantity * $unitPrice;

                    $items->push(
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'quantity' => $quantity,
                            'unit_price' => $unitPrice,
                            'line_total' => $lineTotal,
                        ])
                    );
                }

                $order->update([
                    'total_amount' => $items->sum('line_total'),
                ]);
            });

        $recentOrders = Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('recentOrders'));

    }

}
