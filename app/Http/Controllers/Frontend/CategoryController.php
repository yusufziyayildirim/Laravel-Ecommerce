<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $allCategories = Category::all()->where("is_active", true);

        return view("frontend.home.index", ["categories" => $allCategories, "products" => $category->products]);
    }
}
