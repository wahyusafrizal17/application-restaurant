<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Card;
use PDF;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            $data['products'] = Product::orderBy('id', 'ASC')->where('name_product', 'LIKE', '%' . $request->search . '%')->get();
        }else{
            $data['products'] = Product::orderBy('id', 'ASC')->paginate(12);
        }
        $data['tax'] = Tax::find(1);
        $data['category'] = Category::all();
        $data['carts'] = Cart::where('is_active', 1)->get();
        $data['card'] = Card::pluck('name_card', 'id');

        return view('order.index', $data);
    }

    public function detail(Request $request)
    {
        $data = Product::where('id', $request->id)->first();
        return $data;
    }

    public function store(Request $request)
    {
        $carts = Cart::where('is_active', 1)->get();
        foreach($carts as $cart){
            $ar[] =  $cart->id;
            $c = serialize($ar);
        }

        $input = $request->all();
        $input['invoice'] = 'INV'.date('hmhis');
        $input['cashier_id'] = \Auth::user()->id;
        $input['cart_id'] = $c;

        $data = Order::create($input);

        foreach($carts as $row){
            $model = Cart::where('id', $row->id)->first();
            $model->is_active = 0;
            $model->save();
        }

        return $data;
    }
    
    public function cetak($inv)
    {
        $data['tax'] = Tax::find(1);
        $data['order'] = Order::where('invoice', $inv)->first();
        return view('order.cetak', $data);
    }

    public function print($inv)
    {
        $data['tax'] = Tax::find(1);
        $data['setting'] = Setting::find(1);
        $data['order'] = Order::where('invoice', $inv)->first();
        $customPaper = array(0,0,350,250.80);
 
    	$pdf = PDF::loadview('order.print',$data)->setPaper($customPaper, 'landscape');
    	return $pdf->stream();
    }
}
