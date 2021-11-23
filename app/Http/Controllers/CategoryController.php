<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCat()
    {
        $categories = Category::all();
        $latest = Category::latest()->paginate(5);
        $trash = Category::onlyTrashed()->latest()->get();
        return view('admin.category.index', compact('latest', 'categories', 'trash'));
    }

    public function addCat(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',

            ],
            [
                'category_name.required' => 'Please Input Category Name',
                'category_name.max' => 'Category Less Then 255Chars',
            ]
        );

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('storesuccess', 'Category Inserted Successfull');
    }

    public function editCat($id)
    {
        $edit = Category::find($id);
        return view('admin.category.edit', compact('edit'));
    }

    public function updateCat(Request $request, $id)
    {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id  //it is for getting current user
        ]);
        return redirect()->route('all.category')->with('storesuccess', 'Category Updated Successful');
    }

    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('storesuccess', 'Category Soft Deleted Successfully');
    }

    public function restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('storesuccess', 'Category Restored Successfully');
    }

    public function parDelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('storesuccess', 'Category Permanently Successfully');
    }

}

