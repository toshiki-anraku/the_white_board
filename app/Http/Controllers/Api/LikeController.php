<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * 良いね
     */
    public function like()
    {
        //
    }

    /**
     * 良いね解除
     */
    public function unlike()
    {
        //
    }

    /**
     * 取得したデータをJson形式に変換
     */
    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}