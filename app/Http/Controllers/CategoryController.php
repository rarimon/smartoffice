<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
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
        $category_info = Category::all();
        $subcategory_info = Subcategory::latest()->paginate(5);
        return view('admin.subcategory.index', [
            'category_info' => $category_info,
            'subcategory_info' => $subcategory_info,
        ]);
    }

    //insert subcategory
    public function subcategory_insert(Request $request)
    {
        // $request->validate([

        //     'subcategory_name' => 'required|unique:subcategories',
        //     'category_id' => 'required',
        // ]);


        if (Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()) {
            return back()->with('warning', 'Subcateogry Name Already Exists !');
        } else {
            Subcategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
            return back()->with('success', 'Subcateogry Added Successfull !');
        }
    }
    //subcategory delete

    public function delete_subcategory($subcategory_id)
    {
        Subcategory::find($subcategory_id)->delete();
        return back()->with('delete', 'Cateogry Delete Successfull !');
    }

    //edit page subcategory
    public function update_subcategory($subcategory_id)
    {
        $subcategory_in = Subcategory::find($subcategory_id);
        $category_in = Category::all();
        return view('admin.subcategory.edit', [
            'subcategory_in' => $subcategory_in,
            'category_in' => $category_in,
        ]);
    }


    //edit page subcategory
    public function edit_subcategory(Request $request)
    {


        Subcategory::find($request->subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/subcategory')->with('update', 'Subcateogry Delete Successfull !');
    }

    //mark delete
    public function category_delete_all(Request $request)
    {
        if ($request->mark_all_del) {
            foreach ($request->mark_all_del as $mark_del) {
                Category::find($mark_del)->delete();
            }
            return back()->with('success_del', 'Mark Delete Succesfull');
        } else {
            return back();
        }
    }
}
