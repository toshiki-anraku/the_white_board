<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateProjectsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("projects", function (Blueprint $table) {
						$table->integer('id');
						$table->integer('user_id')->unsigned();
						$table->string('project_name',255);
						$table->longText('explanation')->nullable();
						$table->integer('secret_flag');
						$table->integer('mst_genre_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						

                    //*********************************
                    // Foreign KEY [ Uncomment if you want to use!! ]
                    //*********************************
                        //$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("mst_genre_id")->references("id")->on("mst_genres");



						// ----------------------------------------------------
						// -- SELECT [projects]--
						// ----------------------------------------------------
						// $query = DB::table("projects")
						// ->leftJoin("users","users.id", "=", "projects.user_id")
						// ->leftJoin("mst_genres","mst_genres.id", "=", "projects.mst_genre_id")
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
                    Schema::dropIfExists("projects");
                }
            }
        