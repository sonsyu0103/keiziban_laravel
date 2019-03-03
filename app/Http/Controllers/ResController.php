<?php

namespace App\Http\Controllers;

use App\Sure;
use App\User;
use App\Res;
use Illuminate\Http\Request;

class ResController extends Controller
{
    public function indexRes(Request $request)
    {   
        $code=$request->code;
        $ress=Res::whereCode($code)->orderBy('Created_at')->get();
      
        
        return view('ress',[  
            'ress'=>$ress,
            'ress'=>$code
        ]);
    }

    public function createRes(Request $request)
    {
        $res=new Res;
        $res->name=$request->name;
        $res->mess=$request->mess;
        if($request->hasFile('image'))
        {
            if($request->file('image')->isValid())
            {
                $res=$request->file('image')->store('image');
            }
        }   
        $res->code=$request->code;
        $res->id=\Auth::user()->id;
        $res->save();

        return redirect('/ress');

        
 
    
        /*// アップロードしたファイルのバリデーション設定
        $this->validate($request, [
            'pic' => [
                'file',
                'image',
                'mimes:jpeg,png',
                'dimensions:min_width=100,min_height=100,max_width=600,max_height=600',
            ]
        ]);
    
        //アップロードに成功しているか確認
        if ($request->file('pic')->isValid([])) {
            $filename = $request->file('pic')->store($upload_name, 'public');
    
        // DBへファイル名登録処理
        $res =new Res::findOrFail($select_id);
        // $filenameだとパスが含まれてしまう為、basename()で囲う
        $goods->image_name = basename($filename);
        // 更新(差分があればDBに登録)
        $goods->save();
    
        return redirect()->to('admin/home')->with('flashmessage', 'イメージ画像の登録が完了しました。');
        }
    else{
        return redirect()->to('admin/home')->with('flashmessage', 'イメージ画像の登録に失敗しました。')
        }*/
    }

}