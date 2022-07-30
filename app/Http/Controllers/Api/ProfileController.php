<?php

namespace App\Http\Controllers\Api;

use App\Models\Follower;
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
    public function show(Request $request)
    {
        return "ユーザー情報返却";
    }

    /**
     * ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
     */
    public function update(Request $request)
    {
        return "ユーザー情報更新";
    }

    /**
     * プロフィール画像削除
     * 画像保管場所から画像を削除し、デフォルト画像のpathを返却
     */
    public function deleteImg(Request $request)
    {
        return "プロフィール画像削除";
    }

    /**
     * プロフィール画像更新
     * 画像をアップロードし、古い画像データを削除
     */
    public function updateImg(Request $request)
    {
        return "プロフィール画像更新";
    }

    /**
     * user_idに紐付く企画のデータを返却
     * ※ソート, フィルターの処理で必要となるデータを考慮
     * ※likes, favorites, secret_managementsテーブルの情報の取得に関して一気に取得するか別で取得するか検討
     */
    public function indexProjects(Request $request)
    {
        return "自身の企画いデータを取得";
    }

    /**
     * 退会処理(Breezeで実装されていないか調査)
     */
    public function withdrawal(Request $request)
    {
        return "退会処理";
    }

    /**
     * パスワード変更(Breezeで実装されていないか調査)
     */
    public function resetPassword(Request $request)
    {
        return "パスワード変更";
    }

    /**
     * フォロー on/off
     *
     * followersテーブルにparamと一致するレコードがあるか確認し条件分岐
     * 有り: レコードの削除
     * 無し: レコードの追加
     *
     * @param Request $request {following_id, followed_id}
     * @return void
     */
    public function follow(Request $request)
    {
        $favorite = Follower::where([
            ['following_id', $request->following_id],
            ['followed_id' ,$request->followed_id]
            ])
            ->first();

        // レコード追加
        if(empty($favorite)) {
            $favorite = Follower::create($request->only(['following_id','followed_id']));
            return '追加完了';

        // レコード削除
        } else {
            $favorite->delete();
            return '削除完了';
        }
    }


    /**
     * 全フォローユーザーのレコード取得
     */
    public function getFollow(Request $request)
    {
        return "フォローユーザー取得";
    }


    /**
     * 全フォロワーのレコードを取得
     */
    public function getFollower(Request $request)
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