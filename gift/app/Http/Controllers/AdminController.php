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
     return view('admin.category');
    }

    public function add_category(Request $request)
    {
     $category=new category();
     $category->category_name=$request->category;
     $category=save();
     return redirect()->back()->with('message',"Category added successfully");
    }
}
