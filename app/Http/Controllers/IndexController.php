<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        
        $records = DB::table('statisticals')
        ->whereDate('date', Carbon::today())

         // Exact date
        ->get();
        $dcm1 = [];
        $dcm2 = [];
        $dcm3 = [];
        foreach($records as $record){
            $datas = Json::decode($record->data);
            $time =  Carbon::parse($record->date)->format('H:i');
            $dcm1[] = ['time' => $time, 'height' => $datas['dcm1']];
            $dcm2[] = ['time' => $time, 'height' => $datas['dcm2']];
            $dcm3[] = ['time' => $time, 'height' => $datas['dcm3']];
        }
        // dd($dcm3);
        return view('pages.home', compact('dcm1', 'dcm2', 'dcm3'));
    }

    
}
