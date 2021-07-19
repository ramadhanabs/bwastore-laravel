<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries','user'])->where('slug',$id)->firstOrFail();

        return view('pages.product-details',[
            'product' => $product,
        ]);
    }

    public function add(Request $request, $id)
    {
        $uniqueId = random_int(100000, 999999);
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'unique_id' => $uniqueId,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }

}
