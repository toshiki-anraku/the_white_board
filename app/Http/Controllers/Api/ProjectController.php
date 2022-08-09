<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\MstGenre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * ログインしているユーザが閲覧可能な全企画データを取得
     *
     * @param Request $request user_id
     * @return Json
     */
    public function index(Request $request)
    {
        // パラメータチェック
        if ($request) {
            $err_1 = $request->user_id  ? null : 'user_id, ';

            if ($err_1) {
                return 'パラメータ不足:' . $err_1;
            }
        }

        // 通常企画データ取得
        $project = Project::where('secret_flag', 0)
            ->with([
                'likes',
                'favorites',
                'comments',
                'project_medias',
                'mst_genres'
            ])
            ->get()
            ->toArray();

        // 鍵付き企画データ取得
        $secret_project = Project::where('secret_flag', 1)
            ->with([
                'likes',
                'favorites',
                'secret_managements',
                'comments',
                'project_medias',
                'mst_genres',
            ])
            ->whereHas('secret_managements', function ($q) use ($request) {
                $q->where('user_id', $request->user_id);
            })
            ->get()
            ->toArray();

        // データ結合して、コレクション変換
        $arr = collect([...$project, ...$secret_project]);

        return response()->json(
            [
                'project' => $arr,
                'count' => $arr->count()
            ]
        );
    }

    /**
     * 企画の作成
     *
     * @param Request $request user_id, project_name, mst_genre_id, secret_flag
     * @return void
     */
    public function store(Request $request)
    {
        dd($request->all());
        // パラメータチェック
        if ($request) {
            $err_1 = $request->user_id ? null : 'user_id, ';
            $err_2 = $request->project_name ? null : 'project_name, ';
            $err_3 = $request->mst_genre_id ? null : 'mst_genre_id, ';
            $err_4 = isset($request->secret_flag) ? null : 'secret_flag, ';
            if ($err_1 || $err_2 || $err_3 || $err_4) {
                $result = 'パラメータ不足:' . $err_1 . $err_2 . $err_3 . $err_4;
                return $result;
            }
        }
        // 作成データ配列
        $arr = [];

        // 作成カラム
        $columns = [
            'user_id',
            'project_name',
            'explanation',
            'secret_flag',
            'mst_genre_id'
        ];

        // 入力されたデータがある場合は配列に代入
        foreach ($columns as $value) {
            if (isset($request->$value)) {
                $arr[$value] = $request->$value;
            }
        }
        //レコードの追加
        if ($request->secret_flag == 0) { //通常企画作成

            // 新規企画作成
            Project::create($arr);

            return '企画作成';
        } else { //鍵付き企画作成
            // 新規企画作成
            try {
                $project = Project::create($arr);

                // 作成用secret_managementsデータ配列
                $secret_managements = [$request->user_id];
                if ($request->secret_managements) {
                    foreach ($request->secret_managements as $sm) {
                        $secret_managements[] = $sm['user_id'];
                    }
                }
                // 中間テーブルのレコード作成
                $project->secret_managements()->sync($secret_managements);
            } catch (\Throwable $th) {
                throw $th;
            }
            return "鍵付き企画の作成";
        }
    }

    /**
     * 企画詳細の表示
     *
     * @param Request $request project_id
     * @return Json
     */
    public function show(Request $request)
    {
        // パラメータチェック
        if ($request) {
            $err_1 = $request->project_id  ? null : 'project_id, ';
            if ($err_1) {
                return 'パラメータ不足:' . $err_1;
            }
        }

        $project = Project::where('id', $request->project_id)
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
                'project' => $project,
            ]
        );
    }

    /**
     * 企画の更新
     *
     * @param Request $request project_id , user_id
     * @return void
     */
    public function update(Request $request)
    {
        // パラメータチェック
        if ($request) {
            $err_1 = $request->project_id ? null : 'project_id';
            $err_2 = $request->user_id ? null : 'user_id';
            if ($err_1 || $err_2) {
                $result = 'パラメータ不足:' . $err_1 . $err_2;
                return $result;
            }
        }

        // 更新データ配列
        $arr = [];

        // 更新カラム
        $columns = [
            'project_name',
            'explanation',
            'secret_flag',
            'mst_genre_id'
        ];

        // 入力されたデータがある場合は配列に代入
        foreach ($columns as $value) {
            if (isset($request->$value)) {
                $arr[$value] = $request->$value;
            }
        }

        // レコードの更新
        if ($request->secret_flag == 0 || !$request->secret_flag) { //通常企画更新
            // 新規企画更新
            Project::where('id', $request->project_id)
                ->update($arr);

            return '企画更新';
        } else { //鍵付き企画更新
            // 新規企画更新
            try {
                Project::where('id', $request->project_id)
                    ->update($arr);

                // 更新用secret_managementsデータ配列
                $secret_managements = [$request->user_id];
                if ($request->secret_managements) {
                    foreach ($request->secret_managements as $sm) {
                        $secret_managements[] = $sm['user_id'];
                    }
                }

                // 中間テーブルのレコード更新
                Project::find($request->project_id)
                    ->secret_managements()
                    ->sync($secret_managements);
            } catch (\Throwable $th) {
                throw $th;
            }
            return "鍵付き企画の更新";
        }
    }

    /**
     * 企画の削除
     *
     * @param Request $request project_id
     * @return void
     */
    public function destroy(Request $request)
    {
        // パラメータチェック
        if ($request) {
            $err_1 = $request->project_id  ? null : 'project_id, ';
            if ($err_1) {
                return 'パラメータ不足:' . $err_1;
            }
        }

        Project::destroy($request->project_id);
        return "企画の削除";
    }

    /**
     * ジャンル取得
     *
     * @return Json
     */
    public function getGenre()
    {
        return response()->json([
            'genre' => MstGenre::get()
        ]);
    }
}
