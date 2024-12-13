<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $datas = [
            [
                'name' => 'sl1',
                'status' => '1',
            ],
            [
                'name' => 'sl2',
                'status' => '0',
            ],
            [
                'name' => 'sl3',
                'status' => '0',
            ],
        ];

        $statusClass = ['', 'bg-green', 'bg-yellow', 'bg-red'];
        return view('pages.home', compact('datas', 'statusClass'));
    }

    
}
