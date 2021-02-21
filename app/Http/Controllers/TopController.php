<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;

class TopController extends Controller
{
    function index(){
        return view('top.index');
    }
}
