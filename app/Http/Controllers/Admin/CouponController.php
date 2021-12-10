<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
       $coupons = Coupon::latest()->get();
       return view('admin.coupon.index',compact('coupons'));
    }

    //============================ Store Coupon ====================
    public function Store(Request $request){
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            /*'discount' => $request->discount, */
            'created_at' => Carbon::now(),
        ]);
 
        return Redirect()->back()->with('success','Coupon added');
    }

    //============================ Edit Coupon ====================
    public function couponEdit($coupon_id){
        $coupon = Coupon::findOrFail($coupon_id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    //============================ Update Coupon ====================
    public function update(Request $request){
        $coupon_id = $request->id;
        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->route('admin.coupon')->with('success','Coupon Updated');
    }

    //============================ Delete Coupon ====================
    public function couponDelete($coupon_id){
        Coupon::findOrFail($coupon_id)->delete();
        return Redirect()->back()->with('delete','Coupon Deleted');
    }

    //============================ Inactive Coupon ====================
    public function Inactive($coupon_id){
        Coupon::find($coupon_id)->update(['status' => 0]);
        return Redirect()->back()->with('status','Coupon inactive');
    }

    //============================ Active Coupon ====================
    public function Active($coupon_id){
        Coupon::find($coupon_id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Coupon Activated');
    }
}
