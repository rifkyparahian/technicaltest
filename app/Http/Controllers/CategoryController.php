<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $category = new Category;
        $category->nama = $request->input('name');
        $category->slug = Str::slug($request->input('name'), '-'); // set the slug based on the name
        $category->save();

        return redirect()->route('categories.index')->with([
            'success' => 'Kategori berhasil ditambahkan',
            'alert-type' => 'success'
        ]);
    }

    public function update(Request $request)
    {
        $data = array(
            'nama' => $request->input('name'),
            'slug' => $request->input('slug')
        );
        $id = $request->input('id');
        $category = Category::updateCategory($id, $data);

        return redirect()->back()->with('success', 'Kategori berhasil diupdate.');
    }



    public function delete(Request $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);

        if ($category->products->count() > 0) {
            return redirect()->back()->with('error', 'Kategori tidak dapat dihapus karena masih terdapat produk yang menggunakan kategori ini.');
        }

        $category->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }


    //create function get all category
    public function getCategory()
    {
        $categories = Category::getAll();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required', 'slug' => 'required',
        ]);

        $input = $request->all();

        Category::create($input);

        return redirect('/categories')->with('message', 'Data Berhasil ditambahkan');
    }
}
