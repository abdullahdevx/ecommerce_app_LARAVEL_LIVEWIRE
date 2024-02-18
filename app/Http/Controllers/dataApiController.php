<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\orderItem;
use App\Models\shoppingCart;
use App\Models\Product;

class dataApiController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
         return response()->json($products, 200);
    }    

    public function addToCart(Request $request, $id)
    {
        if($request->user())
        {
             //product will be added to Cart
             $data = [
                'user_id' => $request->user()->id,
                'product_id' => $id,               
            ];
            shoppingCart::updateorCreate($data);       
            return response()->json(['message' => 'Product added to cart successfully']);          
        }
        else
        {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }

    public function getUserCartItems(Request $request)
    {
        if($request->user())
        {
        $items = shoppingCart::with('product')->where('user_id', $request->user()->id)->get();
        // $items = shoppingCart::all();
        // foreach($items as $item)
        // {
        //    $totalPrice += $item->product->price * $item->quantity;
        // }
        $totalPrice = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $formattedItems = $items->map(function ($item) {
            return [
                'product_id' => $item->id,
                'product_name' => $item->product->title,
                'product_price' => $item->product->price,
                'quantity' => $item->quantity,
                // Add other fields as needed
            ];
        });
        return response()->json(['items' => $formattedItems, 'total_price' => $totalPrice], 200);
        // return response()->json($items, 200);
        }
        else
        {
            return response()->json(['status', 'Unauthenticated'], 401);
        }
    }

    public function increaseQuantity(Request $request, $productID)
    {
        $product = shoppingCart::whereId($productID)->first();
        $product->quantity++;
        $product->save();
        return response()->json(['message' => 'Quantity Updated']);
    }

    public function decreaseQuantity(Request $request, $productID)
    {
        $product = shoppingCart::whereId($productID)->first();
        if($product->quantity > 1)
        {
            $product->quantity--;
            $product->save();
        }
        return response()->json(['message' => 'Quantity Updated']);
    }

    public function removeProduct(Request $request, $id)
    {
        $product = shoppingCart::whereId($id)->first();
        if(!$product)
        {
            return response()->json(['message' => 'Product Not Found!'], 404);
        }
        $product->delete();
        return response()->json(['success' => 'Product Removed From Cart']);
        }

    public function getSearchProducts(Request $request)
    {
        $request->validate([
            // Adjust validation rules
            'query' => 'required|string',
        ]);
    
        //storing the query key data coming from frontend in $query variable
        $query = $request->input('query');

        $products = Product::where('title', 'like', '%' . $query . '%' )->get();
        return response()->json($products, 200);
    }
}