<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerStoreController extends Controller
{
    public function index(){
        return view('seller.store.create');
    }

    public function manage(){
        $authUser = Auth::user()->id;
        $stores = Store::where("user_id",$authUser)->get();
        return view('seller.store.manage',compact('stores'));
    }

    public function store(Request $request){
        $request->validate([
            "store_name" => "unique:stores|max:100|min:2",
            "slug" => "required|unique:stores",
            "details" => "required"
        ]);

        Store::create([
            "store_name" => $request->store_name,
            "slug" => $request->slug,
            "details" => $request->details,
            "user_id" => Auth::user()->id
        ]);

        return redirect()->back()->with("message", "Store created Successfully");
    }

    public function edit($id)
    {
        $edited = Store::find($id);
        return view('seller.store.edit', compact('edited'));
    }

    public function update(Request $request, $id)
    {
//        accessing the category table in the database by the model
        $store = Store::FindOrFail($id);

//        validate the data coming from the form
        $validate_data = $request->validate([
            'store_name' => 'unique:stores|max:100|min:2',
            'details' => 'required',
            'slug' => 'unique:stores|max:50|min:2'
        ]);

//        update the category
        $store->update($validate_data);

        return redirect()->back()->with("message", "Store Updated Successfully");
    }

    public function destroy($id)
    {
        Store::FindOrFail($id)->delete();

        return redirect()->back()->with('message', 'Store Deleted Successfully');
    }


}
