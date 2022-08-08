<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\SecretManagement;
use Illuminate\Support\Facades\DB;

class SecretManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secret_managements')->truncate();
        $arr = [];
        $now = Carbon::now();
        for ($i=1; $i <= 10 ; $i++) {
            $arr[] = [
                'user_id' => $i,
                'project_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        for ($i=5; $i <= 15 ; $i++) {
            $arr[] = [
                'user_id' => $i,
                'project_id' => 2,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        for ($i=16; $i <= 30 ; $i++) {
            $arr[] = [
                'user_id' => $i,
                'project_id' => 3,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        SecretManagement::insert($arr);
    }
}
