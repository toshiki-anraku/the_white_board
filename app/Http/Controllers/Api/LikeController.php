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