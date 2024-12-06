<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppDeviceController extends Controller
{
    //
    public function index() {
        
        return view('pages.add-device');
       
    }
}
