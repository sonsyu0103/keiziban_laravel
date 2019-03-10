<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
     //メッセージ検索一覧
     public function indexSearch(Request $request)
     {
        $this->validate($request,[
            'search'=>'required|max:100',
        ]);

         $results=DB::table('sures')
         ->select(['sures.id','sures.sure_name','resus.name','resus.created_at','resus.mess','resus.image'])
         ->join('resus','sures.id','=','resus.sure_id')
         ->where('resus.mess','like','%'.$request->search.'%')
         ->orWhere('sures.sure_name','like','%'.$request->search.'%')
         ->orWhere('resus.name','like','%'.$request->search.'%')
         ->orderBy('sures.id','asc')
         ->get();

         return view('search',[
            'results'=>$results
         ]);
    }

}

