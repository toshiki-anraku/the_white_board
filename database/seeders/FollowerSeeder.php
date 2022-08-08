<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Follower;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followers')->truncate();
        $j = 50;
        $arr = [];
        $now = Carbon::now();
        for ($i=1; $i <= 50 ; $i++) {
            $arr[] = [
                'following_id' => $i,
                'followed_id' => $j,
                'created_at' => $now,
                'updated_at' => $now
            ];
            $j--;
        }
        Follower::insert($arr);
    }
}
