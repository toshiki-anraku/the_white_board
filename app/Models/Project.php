<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//projectテーブルから表示用のカラムを引っ張ってくる

class Project extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'project_name',
        'explanation',
        'secret_flag',
        'mst_genre_id'
    ];

    // likesとの関連定義
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    // favoritesとの関連定義
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    // secret_managementsとの関連定義
    public function secret_managements()
    {
        return $this->belongsToMany(User::class, 'secret_managements')->withTimestamps();
    }

    // commentsとの関連定義
    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments')
            ->withPivot([
                'id',
                'comment',
                'created_at',
                'updated_at'
            ]);
    }

    // project_mediasとの関連定義
    public function project_medias()
    {
        return $this->hasMany(ProjectMedia::class);
    }

    // mst_genresとの関連定義
    public function mst_genres()
    {
        return $this->belongsTo(MstGenre::class);
    }
}
