<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customercontroller extends Controller
{
   public function product(){

    $products=Product::all();
    $cart_items  = Cart::where("customer_id",Auth::guard('customer')->id())->pluck('product_id');
    return view("auth.customer.product",compact("products",'cart_items'));
   }
   public function main(){
      return view("auth.customer_layout.main");

     }
     public function cart(){
        $cart_items  = Cart::where("customer_id",Auth::guard('customer')->id())->pluck('product_id');
        $cart = json_decode($cart_items,true);
        $product = Product::whereIn('id', $cart)->get();
        return view("auth.customer.cart",compact("product"));
     }
     public function add_cart($id){
        $custmer_id = auth()->guard('customer')->id();
        $cart = new Cart();
        $cart->customer_id = $custmer_id;
        $cart->product_id = $id;
        $cart->quantity = 1;
        $cart->total_price = 0;
        $cart->save();
        return redirect()->back();
     }
     public function remove($id){
        $b = Product::findOrFail($id);
        $b->delete();
       return redirect()->route('customer.add_cart');
     }
}
