<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubcategoryController extends Controller
{
    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:subcategories|max:100|min:2',
            'category_id' => 'required|exists:categories,id'
        ]);
        Subcategory::create($validate_data);
        return redirect()->back()->with('message', 'Sub-Category Added Successfully');
    }

    public function destroy($id)
    {
        Subcategory::FindOrFail($id)->delete();

        return redirect()->back()->with('message', 'Sub-Category deleted Successfully');
    }

//   ***** Edit  *****
    public function edit($id)
    {
        $edited = Subcategory::find($id);
        return view('admin.sub_category.edit', compact('edited'));
    }

//   ***** Update  *****
    public function update(Request $request, $id)
    {
//        accessing the category table in the database by the model
        $subcategory = Subcategory::FindOrFail($id);

//        validate the data coming from the form
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:subcategories|max:100|min:2'
        ]);

//        update the category
        $subcategory->update($validate_data);

        return redirect()->back()->with("message", "Sub-Category Updated Successfully");
    }
}
