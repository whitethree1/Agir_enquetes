<?php

namespace App\Http\Controllers;

use App\Enquete;
use App\Enquete_item;
use Illuminate\Http\Request;

class FormController extends Controller
{
    function index() {
        $enquetes = Enquete::get();
        
        return view('form.index', ['enquetes' => $enquetes]);
    }

    function detail($id) {
        $enquete = Enquete::where('id', $id)->first();
        $enquete_id = $enquete->id;

        $enquete_item = Enquete_item::where('enquete_id', $enquete_id);

        return view('form.detail', ['enquete' => $enquete]);
    }
}
