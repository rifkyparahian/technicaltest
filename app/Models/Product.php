<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'category_id', 'gambar'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function getAll()
    {
        return self::all();
    }

    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    public static function createProduct($data)
    {
        return self::create($data);
    }

    public static function updateProduct($id, $data)
    {
        $category = self::getById($id);
        $category->update($data);
        return $category;
    }

    public static function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
    public static function paginateProducts($perPage)
    {
        return self::with('category')->paginate($perPage);
    }

    public static function countProducts()
    {
        return self::count();
    }
}
