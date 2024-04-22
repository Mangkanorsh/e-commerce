<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){ // we created a function
        $products = Product::all();
        return view('products.index',['products'=>$products]); // we call the views/products/index.blade.php
    }
    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            // validating data
            'name'=> 'required',
            'qty'=> 'required|numeric',
            'price'=> 'required|decimal:0,2',   //https://laravel.com/docs/11.x/validation#available-validation-rules
            'description'=> 'nullable',
            // 'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $newProduct = Product::create($data); // to save the data to the database we need to use model, so we import App\Models\Product

        return redirect(route('product.index')); // once we have already save the information it will be redirected to index page

    }

    public function edit(Product $product){
        return view('products.edit',['product'=>$product]);

    }

    public function update(Request $request,Product $product){
        $data = $request->validate([
            // validating data
            'name'=> 'required',
            'qty'=> 'required|numeric',
            'price'=> 'required|decimal:0,2',   //https://laravel.com/docs/11.x/validation#available-validation-rules
            'description'=> 'nullable',
            // 'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product->update($data);

        return redirect(route('product.index'))->with('success','Product updated Successfully');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success','Product deleted Successfully');

    }
}
