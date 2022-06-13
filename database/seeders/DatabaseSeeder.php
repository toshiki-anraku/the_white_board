<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            MstGenreSeeder::class,
            ProjectSeeder::class,
            CommentSeeder::class,
            FavoriteSeeder::class,
            FollowerSeeder::class,
            LikeSeeder::class,
            // ProjectMediaSeeder::class,
            SecretManagementSeeder::class,
        ]);
    }
}