<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::active()->findOrFail($validated['product_id']);
        $quantity = (int) $validated['quantity'];

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'image_path' => $product->image_path,
                'unit' => $product->unit,
            ];
        }

        $cart[$product->id]['line_total'] =
            $cart[$product->id]['price'] * $cart[$product->id]['quantity'];

        session()->put('cart', $cart);

        return true;

//        return redirect()->back()->with('success', 'Product added to cart.');
    }
}
