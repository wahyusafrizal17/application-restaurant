<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ReportController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::all();
        return view('report.index', $data);
    }
}
