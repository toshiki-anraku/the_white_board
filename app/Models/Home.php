<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Home extends Model
// {
//     protected $table = 'the_white_board';
//     protected $dates = ['created_at','updated_at'];
//     protected $fillable = ['id','version','min_version'];

//     // use HasFactory;
// }


class Ver extends Model
{
    protected $table = 'ver';
    protected $dates =  ['created_at', 'updated_at'];
    protected $fillable = ['id', 'version', 'min_version'];
}
