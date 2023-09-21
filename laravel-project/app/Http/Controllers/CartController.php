<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;


class CartController extends Controller
{
    public function addProductToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $cartItem = $cart->cartItems->where('product_id', $request->input('product_id'))->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->input('quantity'));
        } else {

            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('quantity'),
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart successfully.');
    }


    public function removeProductFromCart($cart_item_id)
    {
        try {

            $cartItem = CartItem::where('id', $cart_item_id)
                ->firstOrFail();
            $cartItem->delete();
            return redirect()->route('cart')->with('success', 'Item removed from the cart successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Item not found or you do not have permission to remove it.');
        }
    }

    public function viewCart()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $cartItems = $cart ? $cart->cartItems->load('product') : [];
        return view('cart', ['cart_items' => $cartItems]);
    }
}