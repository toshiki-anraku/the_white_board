<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateFavoritesTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("favorites", function (Blueprint $table) {
						$table->integer('id');
						$table->integer('user_id')->unsigned();
						$table->integer('project_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("project_id")->references("id")->on("projects");



						// ----------------------------------------------------
						// -- SELECT [favorites]--
						// ----------------------------------------------------
						// $query = DB::table("favorites")
						// ->leftJoin("users","users.id", "=", "favorites.user_id")
						// ->leftJoin("projects","projects.id", "=", "favorites.project_id")
						// ->get();
						// dd($query); //For checking



                    });
                }
    
                /**
                 * Reverse the migrations.
                 *
                 * @return void
                 */
                public function down()
                {
                    Schema::dropIfExists("favorites");
                }
            }
        