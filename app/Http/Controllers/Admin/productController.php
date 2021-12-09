<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Image;
use Carbon\Carbon;

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

    //============================ Store Product ====================
    public function storeProduct(Request $request )
    {
        $request -> validate([
            'product_name' => 'required|max:225',
            'product_code' => 'required|max:225',
            'price' => 'required|max:225',
            'product_quantity' => 'required|max:225',
            'category_id' => 'required|max:225',
            'brand_id' => 'required|max:225',
            'short_description' => 'required',
            'long_description' => 'required',
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'Select Category Name',
            'brand_id.required' => 'Select Brand Name',
        ]);

        $image_one = $request->file('image_one');
        $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $img_url1 = 'frontend/img/product/upload/'.$name_gen;
        

        $image_two = $request->file('image_two');
        $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $img_url2 = 'frontend/img/product/upload/'.$name_gen;

        $image_three = $request->file('image_three');
        $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $img_url3 = 'frontend/img/product/upload/'.$name_gen;

        Product::insert([
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image_one' => $img_url1,
            'image_two' => $img_url2,
            'image_three' => $img_url3,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Product Added');
    }


}
