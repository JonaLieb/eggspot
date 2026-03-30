<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'delivery_date' => fake()->optional()->dateTimeBetween('now', '+2 weeks'),
            'status' => fake()->randomElement([
                'pending',
                'processing',
                'completed',
                'cancelled',
            ]),
            'notes' => fake()->optional()->sentence(),
            'reference' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => fake()->randomFloat(2, 100, 5000),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            OrderItem::factory()
                ->count(rand(1, 5))
                ->create([
                    'order_id' => $order->id,
                ]);

            $order->update([
                'total_amount' => $order->items()->sum('line_total'),
            ]);
        });
    }
}
