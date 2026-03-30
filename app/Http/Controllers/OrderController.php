<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function create(Request $request)
    {

        $products = Product::active()->get();

        return view('orders.create', [
            'user' => $request->user(),
            'products' => $products
        ]);
    }

    public function store()
    {

    }

    public function index()
    {

    }
}
