<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:2'
        ]);
        category::create($validate_data);
        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function destroy(category $category, $id)
    {
        $isDeleted = $category->where("id", $id)->delete();

        if ($isDeleted > 0) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $edited = category::find($id);
        return view('admin.category.edit', compact('edited'));
    }
}
