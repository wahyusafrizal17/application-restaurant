<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['is_active'] = 1;
        Cart::create($input);

        return 'success';

    }

    public function delete(Request $request)
    {
        $model = Cart::where('id', $request->id)->delete();
        return 'success';
    }
}
