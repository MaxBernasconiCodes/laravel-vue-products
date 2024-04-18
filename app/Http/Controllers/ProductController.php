<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Product/Index', ["products" => $products]);
    }
    public function create()
    {
        return Inertia::render('Product/Create');
    }
    public function store(Request $request)
    {
       Product::create($request->validate([
        'name' => 'required | max:50 ',
        'description' => 'required | max:260 ',
        'price' => ' numeric | required | max:50 ',
        'stock' => ' required | integer | max:50 ',
       ]));

        return redirect(route('products.index'));
    }
}
