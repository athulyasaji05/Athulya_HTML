<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class AdminController extends Controller
{
    public function index()
    {
     return view('admin.admindashboard');
    }

    public function view_category()
    {
        $data=category::all();
     return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
     $category=new category();
     $category->category_name=$request->categoryname;
     $category->save();
     return redirect()->back()->with('message',"Category added successfully");
    }
    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function edit_category($id)
    {
        $data=category::find($id);

        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id)
    {
        $data=category::find($id);

        $data->category_name=$request->category;
        $data->save();
        return redirect('/view_category');
    }
}
