<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * ユーザー情報返却
     * ※ profile_picture_pathはデフォル画像を用意してpathを指定
     * 全カラム: id name email email_verified_at password remember_token description profile_picture_path created_at updated_at deleted_at
     * 必要カラム: name, email, description, profile_picture_path
     * 不要カラム: id, email_verified_at, password, remember_token, created_at, updated_at
     */
    public function show($id)
    {
        //
    }

    /**
     * ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * トプ画削除
     * 画像保管場所から画像を削除し、デフォルト画像のpathを返却
     */
    public function deleteImg()
    {
        //
    }

    /**
     * トプ画変更
     * 画像をアップロードし、古い画像データを削除
     */
    public function updateImg()
    {
        //
    }

    /**
     * user_idに紐付く企画のデータを返却
     * ※ソート, フィルターの処理で必要となるデータを考慮
     * ※likes, favorites, secret_managementsテーブルの情報の取得に関して一気に取得するか別で取得するか検討
     */
    public function indexProjects()
    {
        //
    }

    /**
     * 退会処理(Breezeで実装されていないか調査)
     */
    public function withdrawal()
    {
        //
    }

    /**
     * パスワード変更(Breezeで実装されていないか調査)
     */
    public function resetPassword()
    {
        //
    }

    /**
     * フォロー
     */
    public function follow()
    {
        //
    }

    /**
     * フォロー解除
     */
    public function unfollow()
    {
        //
    }


    /**
     * 全フォローユーザーのレコード取得
     */
    public function getFollow()
    {
        //
    }


    /**
     * 全フォロワーのレコードを取得
     */
    public function getFollower()
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