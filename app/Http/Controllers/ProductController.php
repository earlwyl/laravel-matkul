<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $message = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
        ];

        $validatedData = $request->validate([
            'id' => 'required|numeric|unique:products',
            'name_product' => 'required|unique:products|',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $message);

        $product = new Product();
        $product->name_product = $request->name_product;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/view-product')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name_product = $request->name_product;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->update();
        return redirect('/view-product')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/view-product')->with('success', 'Product deleted successfully.');
    }

    public function excel()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function pdf()
    {
        $products = Product::all();
        return view('product.pdf', ['products' => $products]);
    }

    public function chart()
    {
        $dataLabel = Product::orderBy('name_product', 'asc')->pluck('name_product')->toArray();
        $dataStock = Product::orderBy('name_product', 'asc')->pluck('stock')->toArray();

        return view('product.chart', compact('dataLabel', 'dataStock'));
    }

    // public function chart()
    // {
    //     $dataLabel = Produk::orderBy('nama_produk', 'asc')->pluck('nama_produk')->toArray();
    //     $dataStok = Produk::orderBy('nama_produk', 'asc')->pluck('stok')->toArray();

    //     return view('produk.chart', compact('dataLabel', 'dataStok'));
    // }
}
