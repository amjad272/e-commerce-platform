<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    public function setting(){
        $products = Product::all();
        $homepagesetting = HomePageSetting::first() ?? new HomePageSetting();
        return view('admin.settings',compact('products','homepagesetting'));
    }

    public function homePageSetting(Request $request){
        $request->validate([
            'discounted_product_id' => 'required|exists:products,id',
            'discount_percent' => 'required|numeric|min:0',
            'discount_heading' => 'required|string|max:255',
            'discount_subheading' => 'required|string|max:255',
            'featured_product_1_id' => 'nullable|exists:products,id',
            'featured_product_2_id' => 'nullable|exists:products,id',
        ]);

        $homepagesetting = HomePageSetting::first() ?? new HomePageSetting();
        $homepagesetting->fill($request->all());
        $homepagesetting->save();

        return redirect()->back()->with('message','Home Page Setting Updated Successfully.');
    }

    public function manage_user(){
        return view('admin.manage.user');
    }

    public function manage_store(){
        return view('admin.manage.store');
    }

    public function cart_history(){
        return view('admin.cart.history');
    }

    public function order_history(){
        return view('admin.order.history');
    }
}
