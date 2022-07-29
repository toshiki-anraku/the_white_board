<?php

namespace App\Http\Controllers\Api;


use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    /**
     * お気に入り
     */
    public function favorite(Request $request)
    {
        $favorite = Favorite::get();
        return $this->resConversionJson($favorite);
    }

    /**
     * お気に入り解除
     */
    public function unfavorite(Request $request)
    {
        return "お気に入り解除";
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