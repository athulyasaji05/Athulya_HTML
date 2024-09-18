<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
{
    $product = Product::all();
    $user = Auth::user();

    $count = 0; // Default to 0 if no user is authenticated
    if ($user) {
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    }

    return view('home.index', compact('product', 'count'));
}

public function login_home()
{
    $product = Product::all();
    $user = Auth::user();

    $count = 0; // Default to 0 if no user is authenticated
    if ($user) {
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    }

    return view('home.index', compact('product', 'count'));
}

public function product_details($id)
{
    $data = Product::find($id);
    
    $count = 0; // Default to 0 if no user is authenticated
    $user = Auth::user();
    if ($user) {
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    }

    return view('home.product_details', compact('data', 'count'));
}


public function add_cart($id)
{
    $product_id = $id;
    
    $user = Auth::user();
    if (!$user) {
        return redirect()->back()->with('error', 'You need to log in first.');
    }

    $user_id = $user->id;
    
    $data = new Cart;
    $data->user_id = $user_id;
    $data->product_id = $product_id;
    $data->save();

    return redirect()->back()->with('success', 'Product added to cart successfully.');
}

public function mycart()
{
    if(Auth::id())
    {
        $user=Auth::user();
        $userid=$user->id;
        $count=Cart::where('user_id',$userid)->count();
        $cart=Cart::where('user_id',$userid)->get();
    }
    return view('home.mycart',compact('count','cart'));
}
public function removeFromCart($id)
{
    $cartItem = Cart::find($id); // Find the cart item by its ID
    if ($cartItem) {
        $cartItem->delete(); // Remove the cart item
        return redirect()->back();
    }
    return redirect()->back();
}

public function confirm_order(request $request)
{
    $name=$request->name;
    $address=$request->address;
    $phone=$request->phone;
    $userid=Auth::user()->id;
    $cart=Cart::where('user_id',$userid)->get();

    foreach($cart as $carts)
    {
      $order=new Order;
      $order->name=$name;
      $order->rec_address=$address;
      $order->phone=$phone;
      $order->user_id=$userid;
      $order->product_id=$carts->product_id;
      $order->save();
     

    }

    $cart_remove=Cart::where('user_id',$userid)->get();
    foreach($cart_remove as $remove)
    {
        $data=Cart::find($remove->id);
        $data->delete();
    }
    return redirect()->back();
    
    

}


}
