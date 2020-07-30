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
        if(Session::has('cart')){
            $listProductCart = Session::get('cart');
            $totalQuantity = 0;
            foreach($listProductCart as $value){
                $totalQuantity += ($value['quantity']*$value['price']);
            }
        }
        
        return view('index', compact(['product', 'totalQuantity']));
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
}
