<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Secret_management;

class ProjectController extends Controller
{
    // /**
    //  * projectテーブルから一番新しいカラムを取ってくる
    //  */
    // // public function index()
    // // {
    // //     $project = Project::first();
    // //     return $this->resConversionJson($project);
    // // }

    // /**
    //  * usersテーブルから一番新しいカラムを取ってくる
    //  */
    // public function user()
    // {
    //     $user = User::get(['id','name','email','password','profile_picture_path','created_at','updated_at','deleted_at']);
    //     // var_dump($this->resConversionJson($user));
    //     return $this->resConversionJson($user);
    // }
    // /**
    //  * projectsテーブルからuser_idに紐づくproject_nameを持ってくる
    //  */
    // public function project($user_id)
    // {
    //     $project = Project::where('user_id',$user_id)->get();
    //     return $this->resConversionJson($project);
    // }

    // /**
    //  * secret_managementsテーブルから一番新しいカラムを取ってくる
    //  */
    // public function secret_management()
    // {
    // //     $secret_management = Secret_management::with('project:project_name')
    // //     ->get('project_id');
    // //     return $this->resConversionJson($secret_management);
    // //}
    // $secret_management = SecretManagements::get();

    //     $secret_management->select(DB::raw(
    //             secret_managements.project_id,
    //             projects.project_name
    //         ))
    //         ->join('projects', 'secret_managements.project_id', '=', 'projects.project_id');
    //}

/**
     * ログインしているユーザが閲覧可能な全企画データを取得
     */
    public function index(Request $request)
    {
        // projectテーブルと一緒に下記テーブルのデータも取得
        // SecretManagement、Like、Favorite
        // Secretマネジメントテーブルに自身が含まれていない企画は除外
        // Like、Favoriteの数をCount
        // 処理の結果、残ったデータを返却
        return $request->id;
    }

    /**
     * 企画の作成
     */
    public function store(Request $request)
    {
        if(true) { //通常企画作成
            return "企画の作成";
        } else { //鍵付き企画作成
            return "鍵付き企画の作成";
        }
    }

    /**
     * 企画詳細の表示
     */
    public function show(Request $request, $id)
    {
        return "企画詳細の表示";
    }

    /**
     * 企画の更新
     * ※鍵付き投稿を見ることが出来るユーザーの変更にも対応
     * パターン1.通常更新
     * パターン2.鍵付き変更後の更新
     * パターン3.鍵付き解除後の更新
     * パターン4.権限ありユーザーの権限変更後の更新
     */
    public function update(Request $request)
    {
        return "企画の更新";
    }

    /**
     * 企画の削除
     */
    public function destroy(Request $request)
    {
        return "企画の削除";
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


