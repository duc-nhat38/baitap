<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function allCart()
    {
        return view('cart');
    }

    public function addCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart');
        }

        $listProductCart = Session::get('cart');

        if (!empty($listProductCart)) {
            foreach ($listProductCart as $value) {

                if ($value['id'] == $product['id']) {
                    $value['quantity'] += 1;

                    return redirect()->route('allCart');
                }
            }
        }
        $product['quantity'] = 1;

        $request->session()->push('cart', $product);

        return redirect()->route('allCart');
    }

    public function delCart(Request $request)
    {

        $id = $request->id;

        $listProductCart = Session::get('cart');
        $totalPrice = 0;
        foreach ($listProductCart as $key => $value) {

            if ($value['id'] == $id) {

                $request->session()->forget("cart.$key");

                continue;
            }
            $totalPrice += ($value['price'] * $value['quantity']);
        }

        return response()->json($totalPrice);
    }


    public function addQuantityProductCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $product = Product::find($id);

        $listProductCart = Session::get('cart');
        $totalPrice = 0;
        foreach ($listProductCart as $value) {

            if ($value['id'] == $product['id']) {
                $value['quantity'] = $quantity;
            }
            $totalPrice += ($value['price'] * $value['quantity']);
        }


        return response()->json([$quantity, $totalPrice]);
    }
}
