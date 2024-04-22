<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/product', [ProductController::class,'index'])->name('product.index');
    // Route::get(...): This part uses the Route facade (provided by Laravel) to define a route. The get method specifies that this route handles requests using the HTTP GET method.
    // '/product': This defines the URI (Uniform Resource Identifier) for the route. In this case, the route will be triggered when a user makes a GET request to the URL /product.
    // ProductController::class: This refers to the ProductController class, likely located somewhere in your app/Http/Controllers directory. This class presumably contains methods for handling product-related functionalities in your application.
    // 'index': This is the name of a method within the ProductController class. When this route is accessed (a GET request to /product), the index method of the ProductController will be called to handle the request.
    // ->name('product.index'): This part is optional and assigns a name to the route. This name, product.index in this case, can be used to generate URLs for this specific route from other parts of your application or your views.

Route::get('product/create', [ProductController::class,'create'])->name('product.create');
    // This is for creating new product form

Route::post('product/', [ProductController::class,'store'])->name('product.store');
    // Once the form is submitted this route will handle it

Route::get('product/{product}/edit', [ProductController::class,'edit'])->name('product.edit');

Route::put('product/{product}/update', [ProductController::class,'update'])->name('product.update');
Route::delete('product/{product}/destroy', [ProductController::class,'destroy'])->name('product.destroy');



