<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\orderItem;
use App\Models\shoppingCart;
use App\Models\Product;

class adminApiController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return response()->json(['products' => $products], 200);
    }

    public function removeProduct(Request $request, $id)
    {
        $product = Product::find($id)->get();
        $product->delete();
        return response()->json('Product Removed!', 200);
    }

    public function addProduct(Request $request)
    {   
        $request->validate([
            'title' => 'required|max:57',
            'description' => 'required|max:500',
            'image' => 'required|image',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');
           // Create a new product
           $product = new Product([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);
        $product->save();
        return response()->json(['message' => 'Product added successfully', 'product' => $product], 201);
    }

    public function updateProduct(Request $request, Product $id)
    {
        $request->validate([
            'title' => 'required|max:57',
            'description' => 'required|max:500',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->save();
        return response()->json(['message' => 'Updated Successfully'], 201);


    }


















}
