<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        // if(Session::has('cart')){
        //     $listProduct = Session::get('cart');
        //     $total = $listProduct[0]['total'];
        // }else{
        //     $total = 0;
        // }
        return view('index', compact(['product']));
    }
    public function show(Request $request)
    {
        $id = $request->id;
        $keyProduct = 'product_' . $id;
        if (!$request->session()->has($keyProduct)) {
            Product::where('id', $id)->increment('view_count');
            $request->session()->put($keyProduct, 1);
        }
        $product = Product::find($id);

        return view('show', compact('product'));
    }

    public function cart(Request $request)
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

        $listProductCart = $request->session()->get('cart');

        foreach ($listProductCart as $key => $value) {

            if ($value['id'] == $id) {

                $request->session()->forget("cart.$key");

                return redirect()->route('allCart');
            }
        }
    }
    public function allCart()
    {
        return view('cart');
    }

    public function addCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $product = Product::find($id);
        
        $listProductCart = Session::get('cart');
        foreach ($listProductCart as $value) {

                if ($value['id'] == $product['id']) {
                    $value['quantity'] = $quantity;
                    
                }
               $totalPrice = $value['price']*$value['quantity'];
        }


        return response()->json([$quantity, $totalPrice]);
        
    }

    
}
