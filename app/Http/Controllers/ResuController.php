<?php

namespace App\Http\Controllers;

use App\User;
use App\Resu;
use App\Sure;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ResuController extends Controller
{
    public function indexResu(Request $request)
    { 
        //sure_idは前回codeというカラムだったので名残でcodeとしています。
        $code=$request->code;

        //掲示板のレス数とresusテーブルのIDはイコールでないためページネーション機能は使っていません。
        $resus=Resu::where('sure_id',$request->code)->orderBy('Created_at')->get();
        $titles=Sure::where('id',$request->code)->get();
        
        return view('resus',[
        'resus'=>$resus, 
        'code'=>$code,
        'titles'=>$titles,
        ]);
    }

    public function storeResu(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'mess'=>'required|max:1000',
            'image'=>'image|max:1024'
        ]);

        $resu=new Resu;
        $resu->name=$request->name;
        $resu->mess=$request->mess;
        if($request->hasFile('image'))
        {
            if($request->file('image')->isValid())
            {
                $filename=$request->image->store('public/images');
                $resu->image=basename($filename);
            }
        }else{
            $resu->image=null;
        }
        $resu->sure_id=$request->code;
        $resu->user_id=\Auth::user()->id;
        $resu->save();

        return redirect()->route('resus',[
            'code'=>$request->code
            ]);

    }
}
