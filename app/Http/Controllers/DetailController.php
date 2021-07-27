<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Comment;

use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries','user'])->where('slug',$id)->firstOrFail();
        $comment = Comment::where('foreignKey_product_id',$product->id)->with('user')->get();

        return view('pages.product-details',[
            'product' => $product,
            'comment' => $comment,
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

    public function comment(Request $request)
    {
        $data = $request->all();

        Comment::create($data);

        $product = Product::with(['galleries', 'user'])->findOrFail(request()->foreignKey_product_id);
        return redirect()->route('details',$product->slug)->with('success','Komentar Success !!');
    }

}
