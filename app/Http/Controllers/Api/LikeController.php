<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    /**
     * いいね on/off
     *
     * likesテーブルにparamと一致するレコードがあるか確認し条件分岐
     * 有り: レコードの削除
     * 無し: レコードの追加
     *
     * @param Request $request {user_id, project_id}
     * @return void
     */
    public function like(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->user_id ? null : 'user_id, ';
            $err_2 = $request->project_id  ? null : 'project_id, ';
            if($err_1 || $err_2) {
                $result = 'パラメータ不足:'.$err_1.$err_2;
                return $result;
            }
        }

        // レコードがあるか確認
        $like = Like::where([
            ['user_id', $request->user_id],
            ['project_id' ,$request->project_id]
            ])
            ->first();

        // レコード追加
        if(empty($like)) {
            $like = Like::create($request->only(['user_id','project_id']));
            return '追加完了';

        // レコード削除
        } else {
            $like->delete();
            return '削除完了';
        }
    }
}