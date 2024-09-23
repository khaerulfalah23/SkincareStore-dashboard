<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $picture = $request->file('picturePath');

        if ($picture) {
            $data['picturePath'] = $picture->store('assets/product', 'public');
        }

        Product::create($data);
        Session::flash('success', 'Produk berhasil disimpan');

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $picture = $request->file('picturePath');

        if ($picture) {
            $data['picturePath'] = $picture->store('assets/product', 'public');
            Storage::disk('public')->delete($product->picturePath ?? '');
        }

        $product->update($data);
        Session::flash('success', 'Produk berhasil diupdate');

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->picturePath ?? '');
        $product->delete();

        Session::flash('success', 'Produk berhasil dihapus');
        return redirect()->back();
    }
}
