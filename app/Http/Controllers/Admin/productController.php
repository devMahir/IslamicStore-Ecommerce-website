<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //============================ Add Product ====================
    public function addProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add', compact('categories', 'brands'));
    }
}
