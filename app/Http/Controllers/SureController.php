<?php

namespace App\Http\Controllers;

use App\Sure;
use App\User;
use Illuminate\Http\Request;

class SureController extends Controller
{
    //スレ一覧
    public function indexSure(Request $request)
    {
        $sures=Sure::orderBy('id','asc')->get();

        return view('sures',[
            'sures'=>$sures
        ]);
    }

    //スレ作成
    public function createSure(Request $request)
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
