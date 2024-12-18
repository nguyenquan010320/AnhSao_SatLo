<?php

namespace App\Http\Controllers;

use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {

        $now = Carbon::now();
        // Lùi xuống 5 phút
        $timeMinus5Minutes = Carbon::now()->subMinutes(30);
//         dd($timeMinus5Minutes->format('H:i:s'),$now->format('H:i:s'));
        $records = Statistical::whereBetween('date', [$timeMinus5Minutes, $now])->get();

        $dcm1 = [];
        $dcm2 = [];
        $dcm3 = [];
        if ($records) {
            foreach ($records as $record) {
                $datas = $record->data ? Json::decode($record->data) : [];
                if ($datas) {
                    $time = Carbon::parse($record->date)->format('H:i');
                    if (isset($datas['dcm1']) && $datas['dcm1']) {
                        $dcm1[] = ['time' => $time, 'height' => $datas['dcm1']];

                    }
                    if (isset($datas['dcm2']) && $datas['dcm2']) {
                        $dcm2[] = ['time' => $time, 'height' => $datas['dcm2']];
                    }
                    if (isset($datas['dcm3']) && $datas['dcm3']) {
                        $dcm3[] = ['time' => $time, 'height' => $datas['dcm3']];
                    }
                }

            }
        }

        // dd($dcm3);
        return view('pages.home', compact('dcm1', 'dcm2', 'dcm3'));
    }


}
