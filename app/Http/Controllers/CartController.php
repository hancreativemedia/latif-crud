<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) 
    {
        // cek apakah user memiliki produk
        $cart = Cart::where('user_id', auth()->id())->where('product_id', $id)->first();
        // dd($cart);

        // kondisi jika cart memiliki produk maka tambahkan quantitycart, dan jika tidak memiliki produk maka buatkan
        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->product_id = $id;
            $cart->quantity = 1;
        }
        $cart->save();


        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function cart() 
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();

        $totalPrice = $cartItems->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('transaction.checkout', compact('cartItems', 'totalPrice'));
    }

    public function checkout(Request $request) 
    {

        // selectedProduct
        // $selectedProduct = $request->input('product_ids', []);

        // handling error jika tidak memilih product
        // if (empty($selectedProduct)) {
        //     return redirect()->back()->with('error', 'No products selected for transaction');  
        // }

        // mengambil cartItems berdasarkan id selectedProduct
        $cartItems = Cart::where('user_id', auth()->id())->get();

        
        // totalkan cart quantity dengan product price
        $totalPrice = $cartItems->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        // buat transaction baru
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->total_price = $totalPrice;
        $transaction->save();

        // dd($transaction);

        // sold count untuk menambahkan total product di checkout

        // clear cart
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction completed successfully');
    }

    public function destroy(Cart $cart) 
    {
        // dd($cart);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully');
    }
}
