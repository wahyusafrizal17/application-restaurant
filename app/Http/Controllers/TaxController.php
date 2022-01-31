<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $data['tax'] = Tax::find(1)->first();
        return view('tax.index',$data);
    }


    public function update(Request $request, $id)
    {
        $tax = Tax::find($id);
        $tax->update($request->all());

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('tax');
    }
}
