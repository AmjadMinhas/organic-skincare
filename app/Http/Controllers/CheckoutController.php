<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $cartItems = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->price * $details['quantity']
                ];
                $total += $product->price * $details['quantity'];
            }
        }

        $user = Auth::user();
        
        return view('checkout.index', compact('cartItems', 'total', 'user'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'save_details' => 'boolean',
            // 'password' => 'required_if:save_details,true|min:8'
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();
        
        try {
            $user = null;
            
            // Check if user wants to save details
            if ($request->save_details) {
                $user = User::where('email', $request->email)->first();
                
                if (!$user) {
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'password' => Hash::make($request->password)
                    ]);
                } else {
                    $user->update([
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'address' => $request->address
                    ]);
                }
            }

            // Calculate total
            $total = 0;
            foreach ($cart as $id => $details) {
                $product = Product::find($id);
                if ($product) {
                    $total += $product->price * $details['quantity'];
                }
            }

            // Create order
            $order = Order::create([
                'user_id' => $user ? $user->id : null,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_price' => $total,
                'status' => 'pending',
                'payment_method' => 'cash_on_delivery'
            ]);

            // Create order items
            foreach ($cart as $id => $details) {
                $product = Product::find($id);
                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $details['quantity'],
                        'price' => $product->price
                    ]);
                }
            }

            DB::commit();
            
            // Clear cart
            session()->forget('cart');
            
            return redirect()->route('checkout.success', $order)->with('success', 'Order placed successfully!');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
