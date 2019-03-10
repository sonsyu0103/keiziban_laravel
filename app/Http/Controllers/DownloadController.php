<?php

namespace App\Http\Controllers;

use App\Resu;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function indexDownload(Request $request)
    {
        $this->validate($request,[
            'keyword'=>'required|integer',
        ]);

        $keyword=$request->keyword;
        $results=Resu::where('sure_id',$request->keyword)
        ->orderBy('Created_at')
        ->get();

        return view('download',[
            'results'=>$results,
            'keyword'=>$keyword,
        ]);
    }

    public function csvDownload(Request $request)
    {
        $response=new StreamedResponse(function() use($request)
        {
            $keyword=$request->keyword;
            $stream=fopen('php://output','w');

            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            fputcsv($stream,['投稿者名','投稿時間','メッセージ']);

            Resu::where('sure_id',$request->keyword)
            ->orderBy('Created_at')
            ->chunk(1000,function($results)use($stream)
            {
                foreach($results as $result)
                {
                    fputcsv($stream,[$result->name,$result->created_at,$result->mess]);
                }
            });
            fclose($stream);
        });
        $response->headers->set('Content-Type','application/octet-stream');
        $response->headers->set('Content-Disposition','attachment; filename="download.csv"');

        return $response;
    }

}
