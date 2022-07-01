<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * projectテーブルから一番新しいカラムを取ってくる
     */
    public function index()
    {
        $project = Project::first();
        return $this->resConversionJson($project);
    }
    /**
     * userテーブルから一番新しいカラムを取ってくる
     */
    public function user()
    {
        $user = User::first();
        return $this->resConversionJson($user);
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


