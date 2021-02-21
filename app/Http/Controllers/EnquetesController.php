<?php

namespace App\Http\Controllers;

use App\Enquete;
use App\Enquete_answer;
use App\Enquete_archive;
use App\Enquete_item;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

class EnquetesController extends Controller
{
    //アンケート作成関連
    function create() {
        return view('enquetes_creates.index');
    }

    function confirm(Request $request) {
        $th = $request->get('th');
        $event_day = $request->get('event_day');
        $limit = $request->get('limit');
        $item_names = $request->get('item_name');
        $images = $request->file('image');

        $items = []; 

        foreach(array_map(null, $item_names, $images) as $index=>[$item_name, $image]) {
            $item['item_name'] = $item_name;
            $item['image'] = "storage/$th/".strval($index).'.'.pathinfo($image->getClientOriginalName())['extension'];
            $image->storeAS("public/$th", strval($index).'.'.pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION));

            array_push($items, $item);
        }

        return view('enquetes_creates.confirm', ['th' => $th, 'event_day' => $event_day, 'limit' => $limit, 'items' => $items]);
    }
    
    function complete(Request $request) {
        $th = $request->get('th');
        $event_day = $request->get('event_day');
        $limit = $request->get('limit');
        $item_names = $request->get('item_name');
        $images = $request->get('image');

        $items = []; 

        foreach(array_map(null, $item_names, $images) as [$item_name, $image]) {
            $item = new Enquete_item();
            $item->item_name = $item_name;
            $item->image = $image;

            array_push($items, $item);
        }

        $enquete = new Enquete;
        $enquete->th = $th;
        $enquete->event_day = $event_day;
        $enquete->limit = $limit;
        $enquete->hash = hash('sha256', $limit.Carbon::now());
        $qrCode = new QrCode(url('').'/answer/'.$enquete->hash.'/');
        $qrCode->writeFile(storage_path().'/app/public/'.$th.'/qrCode.png');

        $enquete->save();

        $enquete->items()->saveMany($items);
        return redirect('top');
    }


    // アンケート一覧関連
    function archive() {
        $enquetes = Enquete::get();
        
        return view('enquetes_archives.index', ['enquetes' => $enquetes]);
    }

    function detail($id) {
        $enquete = Enquete::where('id', $id)->first();
        // $enquete_id = $enquete->id;
        // $enquete_items = Enquete_item::where('enquete_id', $enquete_id)->get();
        // $enquete_answer = Enquete_answer::where('enquete_id', $enquete_id)->get();
        // $enquete_archive = [];

        // var_dump($enquete_items);
        // dd($enquete_answer);
        // foreach ($enquete_answer as $answer) {
        //     $tmp = Enquete_archive::where('answer_id', $answer->id)->get();
            
        //     array_push($enquete_archive, $tmp);
        // }
        // dd($enquete->answers);
        return view('enquetes_archives.detail', [
            'enquete'         => $enquete,
            // 'enquete_items'   => $enquete_items, 
            // 'enquete_archive' => $enquete_archive
            'enquete_answer'  => $enquete->answers, 
            ]);
    }

    function summary_items($id, $item_id) {
        $enquete_archives = Enquete_archive::where('enquete_id', $id)->where('item_id', $item_id)->get();
        return view('enquetes_archives.item_details', ['archives' => $enquete_archives]);
    }

    function summary_items_by_reservedate($id, Request $request) {
        $start_time = $request->get('start_time');
        $end_time = $request->get('end_time');
        $enquetes_date = $request->get('date');
        $th = $request->get('th');
        
        $reserve_start_time = $enquetes_date." ".$start_time;
        $reserve_end_time = $enquetes_date." ".$end_time;
        
        
        $enquete_archives = [];
        $enquete_answer = Enquete_answer::where('enquete_id', $id)
                                        // ->whereBetween('resesrve_time', [$reserve_start_time, $reserve_end_time])
                                        ->where('reserve_time', ">=", $reserve_start_time)
                                        ->where('reserve_time', "<=", $reserve_end_time)
                                        ->get();
        // $items = Enquete_item::where('enquete_id', $id)
        //                                 ->get();
        
        // dd($sample);
        foreach ($enquete_answer as $answer) {
            $tmp = Enquete_archive::where('answer_id', $answer->id)->get();
            
            array_push($enquete_archives, $tmp);
        }
        // dd($enquete_archives);
        return view('enquetes_archives.item_details', [
            'archives' => $enquete_archives, 
            // 'items' => $items,
            'th' => $th,
            ]);
    }
}
