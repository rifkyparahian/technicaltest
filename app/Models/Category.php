<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'slug'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public static function getAll()
    {
        return self::all();
    }

    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    public static function createCategory($data)
    {
        return self::create($data);
    }

    public static function updateCategory($id, $data)
    {
        $category = self::getById($id);
        $category->update($data);
        return $category;
    }

    public static function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public static function countCategories()
    {
        return self::count();
    }
}
