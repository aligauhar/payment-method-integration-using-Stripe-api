<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
     public function checkout()
    {
        return view('checkout');
    }
 
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $name = $request->input('name');
        $price = $request->input('price');
        $price=$price*100;
        $quantity = $request->input('quantity');

        // Validate the quantity value to ensure it is a positive integer
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $total = $price * $quantity;

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            'name' => $name,
                        ],
                        'unit_amount' => $price,
                    ],
                    'quantity' => (int)$quantity, // Cast the 'quantity' to integer
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'), // Redirect back to the form on cancel
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
    
}
