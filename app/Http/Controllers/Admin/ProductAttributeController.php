<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index(){
        return view('admin.product_attribute.create');
    }

    public function manage(){
        $attributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage',compact('attributes'));
    }

    public function storeattribute(Request $request){
        $validate_data = $request->validate([
            'attribute_value' => 'unique:default_attributes|max:100|min:1',

        ]);
        DefaultAttribute::create($validate_data);
        return redirect()->back()->with('message', 'Attribute Added Successfully');
    }

    public function destroy($id)
    {
        DefaultAttribute::FindOrFail($id)->delete();

        return redirect()->back()->with('message', 'Attribute Deleted Successfully');
    }

//   ***** Edit  *****
    public function edit($id)
    {
        $edited = DefaultAttribute::find($id);
        return view('admin.product_attribute.edit', compact('edited'));
    }

//   ***** Update  *****
    public function update(Request $request, $id)
    {
//        accessing the category table in the database by the model
        $attribute = DefaultAttribute::FindOrFail($id);

//        validate the data coming from the form
        $validate_data = $request->validate([
            'attribute_value' => 'unique:default_attributes|max:100|min:1',
        ]);

//        update the category
        $attribute->update($validate_data);

        return redirect()->back()->with("message", "Attribute Updated Successfully");
    }
}
