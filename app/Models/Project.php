<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//projectテーブルから表示用のカラムを引っ張ってくる

class Project extends Model
{
    // private function  makeProject($project_id)
    // {
    //     try{
    //         $selectProjectTable = DB::('the_white_board')
    //         ->table("projects")
    //         ->select(
    //             $id => 'id' as 'project_id',
    //             $user_id => 'user_id' as 'user_id',
    //             $project => 'project_name' as 'project_name',
    //             $explanation =>'explanation' as 'explanation',
    //             $secret_flg => 'secret_flg' as 'secret_flg',
    //             $mst_genre_id => 'mst_genre_id' as 'mst_genre_id',
    //         )
    //         ->where("project_id" , "=" , $project_id)
    //         ->get();
    //         Log::error("失敗でござる。どんまいwwwww",['file' => _FILE_,'line' => _LINE_]);
    //     }
    //     return $selectProjectTable;
    // }
}


