<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.index', compact('products', 'categories'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $data = [
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'category_id' => $validatedData['category_id'],
        ];

        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/products/';
            $imageName = strtotime('now') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            $data['gambar'] = $imageName;
        }

        Product::createProduct($data);
        return redirect()->back()->with('success', 'Produk  berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($validatedData['id']);

        $data = [
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'category_id' => $validatedData['category_id'],
        ];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'images/products/';
            $imageName = strtotime('now') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $data['gambar'] = $imageName;

            if ($product->gambar && file_exists($destinationPath . $product->gambar)) {
                unlink($destinationPath . $product->gambar);
            }
        } else {

            $data['gambar'] = $product->gambar;
        }

        Product::updateProduct($validatedData['id'], $data);

        return redirect()->back()->with('success', 'Produk berhasil diupdate.');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        Product::deleteProduct($id);
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function catalogue()
    {
        $products = Product::paginateProducts(12);
        $categories = Category::all();
        return view('home.index', compact('products', 'categories'));
    }

    public function detail($id)
    {
        $product = Product::getById($id);
        $categories = Category::all();
        return view('home.detail', compact('product', 'categories'));
    }

    public function count()
    {
        $products = Product::countProducts();
        $categories = Category::countCategories();
        return view('dashboard', compact('products', 'categories'));
    }
}
