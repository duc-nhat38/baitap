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
}
