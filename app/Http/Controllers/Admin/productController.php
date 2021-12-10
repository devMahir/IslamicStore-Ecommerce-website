<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Intervention\Image\Facades\Image;
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
    public function storeProduct(Request $request)
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
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image_one' => $img_url1,
            'image_two' => $img_url2,
            'image_three' => $img_url3,
            'created_at' => Carbon::now(),
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
        ]);
       return Redirect()->back()->with('success','Product Added');
    }


    //============================ Manage Product ====================
    public function manageProduct(Request $request )
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.manage', compact('products'));
    }

    //============================ Edit Product ====================
    public function editProduct($product_id)
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($product_id);
        return view ('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    //============================ Update Product ====================
    public function updateProduct(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->Update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('manage_products')->with('success','Product Successfully Updated');
    }

    // ============================ Update Image ==================== 
    public function updateImage(Request $request){
        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;


        if ($request->has('image_one') && $request->has('image_two') && $request->has('image_three')) {
            unlink($old_one);
            unlink($old_two);
            unlink($old_three);
            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            $imag_one = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_two' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            $imag_one = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_three' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('manage_products')->with('success','image successfully Updated');
         }
         
        if ($request->has('image_one')) {
            unlink($old_one);
            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('manage_products')->with('success','image successfully Updated');
        }

        if ($request->has('image_two')) {
            unlink($old_two);
            $imag_one = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_two' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('manage_products')->with('success','image successfully Updated');
         }

        if ($request->has('image_three')) {
            unlink($old_three);
            $imag_one = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_three' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('manage_products')->with('success','image successfully Updated');
        }
    }

    // ============================ Delete product ====================
    public function destroy($product_id){
        $image = Product::findOrFail($product_id);
        $img_one = $image->image_one;
        $img_two = $image->image_two;
        $img_three = $image->image_three;
        unlink($img_one);
        unlink($img_two);
        unlink($img_three);

        Product::findOrFail($product_id)->delete();
        return Redirect()->back()->with('delete','successfully Deleted');
    }

    // ============================ Status Active ==================== 
     public function Inactive($product_id){
        Product::findOrFail($product_id)->update(['status' => 0]);
        return Redirect()->back()->with('status','Product inactive');
    }

    
    // ============================ Status Inactive ====================
    public function Active($product_id){
        Product::findOrFail($product_id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Product Activated');
    }
}
