<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->truncate();
        $j = 50;
        $arr = [];
        $now = Carbon::now();
        for ($i=1; $i <= 50 ; $i++) {
            $arr[] = [
                'user_id' => $i,
                'project_id' => $j,
                'created_at' => $now,
                'updated_at' => $now
            ];
            $j--;
        }
        Like::insert($arr);
    }
}
