<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\OrderItem;

use App\Models\Product;

class OrderController extends Controller

{

    public function store(Request $request)

    {

        $request->validate([

            'product_id' => 'required|exists:products,id',

            'quantity' => 'required|integer|min:1',

        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {

            return back()->with('error', 'Not enough stock.');

        }

        $order = Order::create([

            'user_id' => auth()->id(),

            'total' => $product->price * $request->quantity,

            'status' => 'pending',

        ]);

        OrderItem::create([

            'order_id' => $order->id,

            'product_id' => $product->id,

            'quantity' => $request->quantity,

            'price' => $product->price,

        ]);

        $product->decrement('stock', $request->quantity);

        return back()->with('success', 'Order placed successfully.');

    }

}