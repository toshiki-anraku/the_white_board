<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Project;
use App\Models\Follower;
use App\Consts\UserConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        // パラメータチェック
        if($request) {
            $err_1 = $request->user_id  ? null : 'user_id, ';
            if($err_1) {
                return 'パラメータ不足:'.$err_1;
            }
        }

        // ユーザーデータ取得
        $user = User::where('id', $request->user_id)
            ->get(['name', 'email', 'description', 'profile_picture_path']);

        return response()->json(
            [
                'user' => $user,
            ]
        );
    }

    /**
     * ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
     */
    public function update(Request $request)
    {
        // 更新データ配列
        $arr = [];
        // 更新カラム
        $columns = [
            'name',
            'email',
            'description'
        ];

        // 変更有無のチェック
        foreach ($columns as $value) {
            if ($request->$value) {
                $arr[$value] = $request->$value;
            }
        }

        // ユーザーデータ更新
        User::where('id', $request->user_id)
            ->update($arr);

        return '更新完了';
    }

    /**
     * プロフィール画像削除
     * 画像保管場所から画像を削除し、デフォルト画像のpathを返却
     */
    public function deleteImg(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->profile_picture_path  ? null : 'profile_picture_path, ';
            $err_2 = $request->user_id  ? null : 'user_id, ';

            if($err_1 || $err_2) {
                $result = 'パラメータ不足:'.$err_1.$err_2;
                return $result;
            }
        }

        // 削除前のプロフィール画像のパス
        $path = $request->profile_picture_path;

        // 削除前の画像がデフォルトでない場合、ファイルを削除
        if($path == UserConst::DEFAULT_ICON_PATH) {
            return 'デフォルト画像は削除出来ません';
        }

        // pathからファイル名を抽出
        preg_match("/[^\/]+$/", $path, $file);
        // 削除処理
        Storage::disk('public')->delete('icon/' . $file[0]);

        // プロフィールのパスをデフォルトに更新
        User::where('id', $request->user_id)->update([
            'profile_picture_path' => UserConst::DEFAULT_ICON_PATH
        ]);

        return '削除完了';
    }

    /**
     * プロフィール画像更新
     * 画像をアップロードし、古い画像データを削除
     */
    public function updateImg(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->image ? null : 'image, ';
            $err_2 = $request->profile_picture_path  ? null : 'profile_picture_path, ';
            $err_3 = $request->user_id  ? null : 'user_id, ';

            if($err_1 || $err_2 || $err_3) {
                $result = 'パラメータ不足:'.$err_1.$err_2.$err_3;
                return $result;
            }
        }

        // ディレクトリ名
        $dir = 'icon';
        // 変更前のプロフィール画像のパス
        $path = $request->profile_picture_path;
        // 変更前の画像がデフォルトでない場合、ファイルを削除
        if($path != UserConst::DEFAULT_ICON_PATH) {
            // pathからファイル名を抽出
            preg_match("/[^\/]+$/", $path, $file);
            // 削除処理
            Storage::disk('public')
                ->delete($dir . '/' . $file[0]);
        }

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        // sampleディレクトリに画像を保存
        $request->file('image')->storeAs('public/'.$dir,  $file_name);
        // プロフィールのパスを更新
        User::where('id', $request->user_id)->update([
            'profile_picture_path' => 'storage/' . $dir . '/' . $file_name
        ]);

        return '更新完了';
    }

    /**
     * user_idに紐付く企画のデータを返却
     * ※ソート, フィルターの処理で必要となるデータを考慮
     * ※likes, favorites, secret_managements, comments, project_medias, mst_genresテーブルの情報の取得に関して一気に取得するか別で取得するか検討
     */
    public function indexProjects(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->user_id  ? null : 'user_id, ';
            if($err_1) {
                return 'パラメータ不足:'.$err_1;
            }
        }

        $myProject = Project::where('user_id', $request->user_id)
            ->with([
                'likes',
                'favorites',
                'secret_managements',
                'comments',
                'project_medias',
                'mst_genres',
            ])
            ->get()
            ->toArray();

        return response()->json(
            [
                'my_project' => $myProject,
            ]
        );
    }

    /**
     * 退会処理(Breezeで実装されていないか調査)
     */
    public function withdrawal(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->user_id  ? null : 'user_id, ';
            if($err_1) {
                return 'パラメータ不足:'.$err_1;
            }
        }

        User::destroy($request->user_id);
        return "退会完了";
    }

    /**
     * フォロー on/off
     *
     * followersテーブルにparamと一致するレコードがあるか確認し条件分岐
     * 有り: レコードの削除
     * 無し: レコードの追加
     *
     * @param Request $request following_id, followed_id
     * @return void
     */
    public function follow(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->following_id ? null : 'following_id, ';
            $err_2 = $request->followed_id  ? null : 'followed_id, ';
            if($err_1 || $err_2) {
                $result = 'パラメータ不足:'.$err_1.$err_2;
                return $result;
            }
        }

        // レコードがあるか確認
        $follow = Follower::where([
            ['following_id', $request->following_id],
            ['followed_id' ,$request->followed_id]
            ])
            ->first();

        // レコード追加
        if(empty($follow)) {
            $follow = Follower::create($request->only(['following_id','followed_id']));
            return '追加完了';

        // レコード削除
        } else {
            $follow->delete();
            return '削除完了';
        }
    }

    /**
     * 全フォローユーザーのレコード取得
     *
     * @param Request $request following_id
     * @return json
     */
    public function getFollow(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->following_id ? null : 'following_id, ';
            if($err_1) {
                $result = 'パラメータ不足:'.$err_1;
                return $result;
            }
        }

        // パラメータと一致するfollowersレコードを取得
        $follow = Follower::where('following_id', $request->following_id)->get();
        // フォローしているユーザーのデータを取得
        $following = User::whereIn('id', $follow->pluck('followed_id')->toArray())->get();

        return response()->json(
            [
                'following' => $following,
                'count' => $follow->count(),
            ]
        );
    }

    /**
     * 全フォロワーのレコードを取得
     *
     * @param Request $request followed_id
     * @return json
     */
    public function getFollower(Request $request)
    {
        // パラメータチェック
        if($request) {
            $err_1 = $request->followed_id ? null : 'followed_id, ';
            if($err_1) {
                $result = 'パラメータ不足:'.$err_1;
                return $result;
            }
        }

        // パラメータと一致するfollowersレコードを取得
        $follow = Follower::where('followed_id', $request->followed_id)->get();
        // フォローされているユーザーのデータを取得
        $followed = User::whereIn('id', $follow->pluck('following_id')->toArray())->get();

        return response()->json(
            [
                'followed' => $followed,
                'count' => $follow->count(),
            ]
        );
    }
}