<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductGalleryRequest;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductsGallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardProductsController extends Controller
{
    public function index()
    {
        $product = Product::with(['galleries', 'categories'])
                            ->where('users_id',Auth::user()->id)
                            ->get();

        return view('pages.dashboard-products',[
            'product' => $product,
        ]);
    }

    public function detail()
    {
        return view('pages.dashboard-product-details');
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard-products-create',[
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] =  Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product','public'),
        ];

        ProductsGallery::create($gallery);

        return redirect()->route('dashboard-products');
    }

    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'categories'])->findOrFail($id);
        $categories = Category::all();

        return view('pages.dashboard-product-details',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('dashboard-products');
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product','public');

        ProductsGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductsGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }
}
