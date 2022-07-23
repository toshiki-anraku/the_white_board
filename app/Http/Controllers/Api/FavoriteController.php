<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * お気に入り
     */
    public function favorite()
    {
        // $user = User::get(['id','name','email','password','profile_picture_path','created_at','updated_at','deleted_at']);
        // // var_dump($this->resConversionJson($user));
        // return $this->resConversionJson($user);
    }

    /**
     * お気に入り解除
     */
    public function unfavorite()
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