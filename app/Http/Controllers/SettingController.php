<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::find(1);
        return view('setting.index',$data);
    }


    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        $input = $request->all();

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();    
            $destinationPath = 'assets/img/setting';
            $file->move($destinationPath,$file->getClientOriginalName());

            $input['logo']         = $fileName;
        }
        
        $setting->update($input);

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('setting');
    }
}
