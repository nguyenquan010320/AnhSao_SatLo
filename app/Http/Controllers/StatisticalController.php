<?php

namespace App\Http\Controllers;

use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function list(Request $request) {
        $request = $request->all();
        $now = Carbon::now();
        // Lùi xuống 5 phút
        $timeMinus5Minutes = Carbon::now()->subMinutes(30);
//         dd($timeMinus5Minutes->format('H:i:s'),$now->format('H:i:s'));
        $records = Statistical::whereBetween('date', [ $timeMinus5Minutes, $now])->get();

        $dcm1 = [];
        $dcm2 = [];
        $dcm3 = [];

        if($records){
            foreach($records as $record){
                $datas = Json::decode($record->data);
                $time =  Carbon::parse($record->date)->format('H:i');
                if($request['type'] == 'dcm1'){
                    $dcm1[] = ['time' => $time, 'height' => $datas['dcm1']];
                }
                if($request['type'] == 'dcm2') {
                    $dcm2[] = ['time' => $time, 'height' => $datas['dcm2']];
                }
                if($request['type'] == 'dcm3') {
                    $dcm3[] = ['time' => $time, 'height' => $datas['dcm3']];
                }
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Lưu dữ liệu thành công',
                'data' => [
                    'dcm1' => $dcm1,
                    'dcm2' => $dcm2,
                    'dcm3' => $dcm3
                ],
            ]);
        }


        return response()->json([
            'status' => 'error',
            'message' => 'không có dữ liệu',
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data) {
            $timestamp = Carbon::now();
            $datas = Json::encode($data);

            Statistical::create([
                'data' => $datas,
                'date' => $timestamp,
            ]);
            // Trả về dữ liệu dưới dạng JSON
            return response()->json([
                'status' => 'success',
                'message' => 'Lưu dữ liệu thành công',
            ]);
        }
        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'status' => 'error',
            'message' => 'không có dữ liệu',
        ]);
    }
}
