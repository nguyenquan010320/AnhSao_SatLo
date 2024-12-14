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
        $date = isset($request["date"]) ? $request["date"] : null;
        $timeStart = isset($request["timeStart"]) ? $request["timeStart"] : null;
        $timeEnd = isset($request["timeEnd"]) ? $request["timeEnd"] : null;
        $now = Carbon::now();
        $timeMinus5Minutes = Carbon::now()->subMinutes(30);
        if($date  && $timeStart && $timeEnd){
            $dateStart = $date . ' ' . $timeStart;
            $dateEnd = $date . ' ' . $timeEnd;
            $dateStart = Carbon::createFromFormat('Y-m-d H:i', $dateStart);
            $dateEnd = Carbon::createFromFormat('Y-m-d H:i', $dateEnd);
            $records = Statistical::whereBetween('date', [ $dateStart, $dateEnd])->get();
        }else{
            $records = Statistical::whereBetween('date', [ $timeMinus5Minutes, $now])->get();
        }
        
        $dcm1 = [];
        $dcm2 = [];
        $dcm3 = [];

        if($records){
            foreach($records as $record){
                $datas = Json::decode($record->data);
                $time =  Carbon::parse($record->date)->format('H:i');
                if($datas){
                    if($request['type'] == 'dcm1' && $datas['dcm1']){
                        $dcm1[] = ['time' => $time, 'height' => $datas['dcm1']];
                    }
                    if($request['type'] == 'dcm2' && $datas['dcm2']) {
                        $dcm2[] = ['time' => $time, 'height' => $datas['dcm2']];
                    }
                    if($request['type'] == 'dcm3' && $datas['dcm3']) {
                        $dcm3[] = ['time' => $time, 'height' => $datas['dcm3']];
                    }
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

            if($datas){
                Statistical::create([
                    'data' => $datas,
                    'date' => $timestamp,
                ]);
            }

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
