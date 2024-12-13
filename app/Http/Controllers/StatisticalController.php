<?php

namespace App\Http\Controllers;

use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
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
