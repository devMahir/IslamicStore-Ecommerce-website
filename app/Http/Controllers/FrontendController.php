<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)->latest()->get();
        $categories = Category::where('status', 1)->latest()->get();
        $lts_p = Product::where('status',1)->latest()->limit(3)->get();
        return view('pages.index', compact('products', 'categories', 'lts_p'));
    }

    /* ======================= Product Details ================ */
    public function productDetail($product_id){
        $product = Product::findOrFail($product_id);
        $category_id = $product->category_id;
        $related_p = Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();
        return view('pages.product_details',compact('product','related_p'));
    }

    // ========================= shop Page ===========================
    public function shopPage(){
        $products = Product::latest()->get();
        $productsp = Product::latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();
        return view('pages.shop',compact('products','categories','productsp'));
    }

    // category wise product
    public function catWiseProduct($cat_id){
        $cat_name = Category::where('id',$cat_id)->get();
        $products = Product::where('category_id',$cat_id)->latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();
        return view('pages.cat-product',compact('products','categories','cat_name'));
    }
}
