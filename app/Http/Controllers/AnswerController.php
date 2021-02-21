<?php

namespace App\Http\Controllers;

use App\Enquete;
use App\Enquete_answer;
use App\Enquete_archive;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    function index($hash = ''){
        $enquete = Enquete::where('hash', $hash)->first();
        // dd($enquete);

        if (empty($hash) || empty($enquete)) {
            return redirect('top');
        }

        //期限日取得->Carbonに変換
        $limit = $enquete['limit'];
        $limit = new Carbon($limit);
        $limit->addDay();

        // 期限日と今日の日付比較
        $now = Carbon::now();

        if ($limit->lt($now)) {
            return redirect('top');
        }

        $dateNew = DateTime::createFromFormat('Y-m-d', $enquete->event_day)->format('Y.m.d');
        

        return view('enquete_answer.index', ['enquete' => $enquete, 'event_day' => $dateNew]);
    }


    function thanks(Request $request) {
        $enquete_answer = new Enquete_answer();

        
        $enquete_answer->enquete_id = $request->enquete_id;
        $enquete_answer->sammary = $request->sammary;
        $enquete_answer->reserve_time = $request->event_day." ".$request->reserve_time;
        $enquete_answer->save();

        foreach($request->items as $key => $item) {
            $enquete_archive = new Enquete_archive();

            $enquete_archive->enquete_id = $request->enquete_id;
            $enquete_archive->answer_id = $enquete_answer->id;
            $enquete_archive->item_id = $key;
            $enquete_archive->taste = $item['taste'];
            $enquete_archive->quarlity = $item['quarlity'];
            $enquete_archive->volume = $item['volume'];
            $enquete_archive->comment = $item['comment'];

            $enquete_archive->save();
        }


        return view('enquete_answer.thanks');
    }
}
