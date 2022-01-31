<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        $data['orders']   = Order::all();
        $data['total']    = Order::where('created_at', 'LIKE', '%'. date('Y-m-d') .'%')->sum('total');
        $data['carts']    = Cart::where('created_at', 'LIKE', '%'. date('Y-m-d') .'%')->sum('qty');

        return view('welcome', $data);
    }
}
