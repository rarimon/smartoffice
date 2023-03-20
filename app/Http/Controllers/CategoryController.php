<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{


    //user login check
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function category_page()
    {
        $category_info = Category::latest()->paginate(5);
        return view('admin.category.index', [
            'category_info' => $category_info,
        ]);
    }


    //categor insert
    public function insert_category(Request $request)
    {
        $request->validate([

            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Cateogry Added Successfull !');
    }

    //delete category
    public function delete_category($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('delete', 'Cateogry Delete Successfull !');
    }

    //update category
    public function update_category($category_id)
    {

        $category_name = Category::find($category_id);

        return view('admin.category.update', [
            'category_name' => $category_name,
        ]);
    }


    //update category
    public function edit_category(Request $request)
    {

        $request->validate([

            'category_name' => 'required|unique:categories',
        ]);

        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/category')->with('update', 'Cateogry Delete Successfull !');
    }



    //subcategory page

    public function subcategory_page()
    {

        return view('admin.subcategory.index');
    }
}
