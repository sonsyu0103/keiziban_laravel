<?php

namespace App\Http\Controllers;

use App\Sure;
use App\User;
use Illuminate\Http\Request;

class SureController extends Controller
{
    public function indexSure(Request $request)
    {
        $sures=Sure::orderBy('id','asc')->paginate(50);

        return view('sures',[
            'sures'=>$sures
        ]);
    }

    public function storeSure(Request $request)
    {
       $this->validate($request,[
            'sure_name'=>'required|max:100',
        ]);

        $sure=new Sure;
        $sure->sure_name=$request->sure_name;
        $sure->user_id=\Auth::user()->id;
        $sure->save();

        return redirect('/sures');
    }
}
