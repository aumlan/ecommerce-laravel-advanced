<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class CartController extends Controller
{
    public function showCart()
    {
        $data=[];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'],'sub_total'));
        return view('frontend.products.cart',$data);
    }

    public function addToCart(Request $request)
    {
        try {
            $this->validate($request,[
                'product_id' => 'required'
            ]);
        }catch (ValidationException $e){
            return redirect()->back();

        }

        $product = Product::findOrFail($request->input('product_id'));
        $cart = session()->has('cart') ? session()->get('cart') : [];

        if (array_key_exists($product->id, $cart)){
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['sub_total'] = ($product->sale_price !== null && $product->sale_price > 0) ? ($product->sale_price * $cart[$product->id]['quantity']) : ($product->price * $cart[$product->id]['quantity']);
        }else{
            $cart[$product->id] = [
                'title' => $product->title,
                'quantity' => 1,
                'img' => $product->getFirstMediaUrl('products'),
                'price'=> ($product->sale_price !== null && $product->sale_price > 0) ? $product->sale_price : $product->price,
                'sub_total' =>($product->sale_price !== null && $product->sale_price > 0) ? $product->sale_price : $product->price
            ];
        }

        session(['cart'=> $cart]);
//        session()->remove('cart');
        setSuccess($product->title.' Added To Cart');

        return redirect()->route('frontend.cart.show');
    }

    public function removeFromCart(Request $request)
    {
        try {
            $this->validate($request,[
                'product_id' => 'required'
            ]);
        }catch (ValidationException $e){
            return redirect()->back();

        }

        $cart = session()->has('cart') ? session()->get('cart') : [];
        unset($cart[$request->input('product_id')]);
        session(['cart'=> $cart]);
        setSuccess('Product Removed From Cart');

        return redirect()->back();

    }

    public function clearCart()
    {
        session()->remove('cart');
        setSuccess('Cart Has been Cleared');

        return redirect()->back();
    }

    public function checkoutCart()
    {
        $data=[];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'],'sub_total'));
        return view('frontend.products.checkout',$data);
    }

    public function processOrder()
    {
        $data=[];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'],'sub_total'));

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => 'aumlan',
            'customer_phone_number' => '01767125279',
            'address' => 'bashundhara',
            'city' => 'dhaka',
            'postal_code' => '1229',
            'total_amount' =>$data['total'],
            'paid_amount' => $data['total'],
            'payment_details' => 'COD',
            'processed_by' => auth()->user()->id
        ]);

        foreach ($data['cart'] as $product_id=>$product){
            $order->products()->create([
                'product_id' => $product_id,
                'quantity' => $product['quantity'],
                'price' => $product['sub_total']
            ]);
        }

        session()->forget('cart','total');
        setSuccess('order created');
        return redirect()->route('frontend.home');

    }






}
