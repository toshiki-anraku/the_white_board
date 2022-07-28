<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * ユーザー情報返却
     * ※ profile_picture_pathはデフォル画像を用意してpathを指定
     * 全カラム: id name email email_verified_at password remember_token description profile_picture_path created_at updated_at deleted_at
     * 必要カラム: name, email, description, profile_picture_path
     * 不要カラム: id, email_verified_at, password, remember_token, created_at, updated_at
     */
    public function show()
    {
        return "ユーザー情報返却";
    }

    /**
     * ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
     */
    public function update()
    {
        return "ユーザー情報更新";
    }

    /**
     * プロフィール画像削除
     * 画像保管場所から画像を削除し、デフォルト画像のpathを返却
     */
    public function deleteImg()
    {
        return "プロフィール画像削除";
    }

    /**
     * プロフィール画像更新
     * 画像をアップロードし、古い画像データを削除
     */
    public function updateImg()
    {
        return "プロフィール画像更新";
    }

    /**
     * user_idに紐付く企画のデータを返却
     * ※ソート, フィルターの処理で必要となるデータを考慮
     * ※likes, favorites, secret_managementsテーブルの情報の取得に関して一気に取得するか別で取得するか検討
     */
    public function indexProjects($id)
    {
        return "自身の企画いデータを取得";
    }

    /**
     * 退会処理(Breezeで実装されていないか調査)
     */
    public function withdrawal()
    {
        return "退会処理";
    }

    /**
     * パスワード変更(Breezeで実装されていないか調査)
     */
    public function resetPassword()
    {
        return "パスワード変更";
    }

    /**
     * フォロー
     */
    public function follow()
    {
        return "フォロー";
    }

    /**
     * フォロー解除
     */
    public function unfollow()
    {
        return "フォロー解除";
    }


    /**
     * 全フォローユーザーのレコード取得
     */
    public function getFollow()
    {
        return "フォローユーザー取得";
    }


    /**
     * 全フォロワーのレコードを取得
     */
    public function getFollower()
    {
        return "フォロワー取得";
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