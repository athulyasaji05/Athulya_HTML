<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Order;

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
        $data =Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        return redirect('/view_category');
    }
    public function add_product()
    {
        $category=Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function  upload_product(Request $request)
    {
        $data= new Product;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect()->back();

    }
    public function view_product()
    {
        $product=Product::all();
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {
       $data= Product::find($id);
       $data->delete();
       return redirect()->back();

    }
    public function update_product($id)
    {
        $data = Product::find($id);
        $category = category::all();
        return view('admin.update_page', compact('data','category'));
    }
    
    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
    
        $image = $request->file('image');
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
    
        $data->save();
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
      $search=$request->search;
      $product=Product::where('title','LIKE','%'.$search.'%')->
      orwhere('category','LIKE','%'.$search.'%')->get();
      return view('admin.view_product',compact('product'));
    }
    
    public function view_order()
    {
        $data=Order::all();

        return view('admin.order',compact('data'));
    }

    public function on_the_way($id)
        {
            $data=Order::find($id);
            $data->status='On the way';
            $data->save();
            return redirect('/view_orders');
        }

        public function delivered($id)
        {
            $data=Order::find($id);
            $data->status='Delivered';
            $data->save();
            return redirect('/view_orders');
        }
    

}
