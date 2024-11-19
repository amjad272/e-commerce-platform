<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    //  *****  Store  *****
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:2'
        ]);
        category::create($validate_data);
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

//  *****  Delete  *****
    public function destroy($id)
    {
        category::FindOrFail($id)->delete();

        return redirect()->back()->with('message', 'Category deleted Successfully');
    }

//   ***** Edit  *****
    public function edit($id)
    {
        $edited = category::find($id);
        return view('admin.category.edit', compact('edited'));
    }

//   ***** Update  *****
    public function update(Request $request, $id)
    {
//        accessing the category table in the database by the model
        $category = category::FindOrFail($id);

//        validate the data coming from the form
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:2'
        ]);

//        update the category
      $category->update($validate_data);

      return redirect()->back()->with("message", "Category Updated Successfully");
    }
}
