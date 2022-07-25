<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Like;
use App\Models\Favorite;
use App\Models\Secret_management;

class ProjectController extends Controller
{
    /**
     * projectテーブルから一番新しいカラムを取ってくる
     */
    // public function index()
    // {
    //     $project = Project::first();
    //     return $this->resConversionJson($project);
    // }

    /**
     * usersテーブルから一番新しいカラムを取ってくる
     */
    public function user()
    {
        $user = User::get(['id','name','email','password','profile_picture_path','created_at','updated_at','deleted_at']);
        // var_dump($this->resConversionJson($user));
        return $this->resConversionJson($user);
    }
    /**
     * projectsテーブルからuser_idに紐づくproject_nameを持ってくる
     */
    public function project($user_id)
    {
        $project = Project::where('user_id',$user_id)->get();
        return $this->resConversionJson($project);
    }
     /**
     * likesテーブルから一番新しいカラムを取ってくる
     */
    public function like($project_id,$user_id)
    {
        $like = Like::where('project_id',$project_id)->get();
        return $this->resConversionJson($like);
    }
    /**
     * favoritesテーブルから一番新しいカラムを取ってくる
     */
    public function favorite()
    {
        $favorite = Favorite::first();
        return $this->resConversionJson($favorite);
    }
    /**
     * secret_managementsテーブルから一番新しいカラムを取ってくる
     */
    public function secret_management()
    {
        $secret_management = Secret_management::first();
        return $this->resConversionJson($secret_management);
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


