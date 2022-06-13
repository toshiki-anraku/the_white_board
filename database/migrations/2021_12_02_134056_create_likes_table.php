<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;

            class CreateLikesTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("likes", function (Blueprint $table) {
						$table->id();
						$table->integer('user_id')->unsigned();
						$table->integer('project_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("project_id")->references("id")->on("projects");



						// ----------------------------------------------------
						// -- SELECT [likes]--
						// ----------------------------------------------------
						// $query = DB::table("likes")
						// ->leftJoin("users","users.id", "=", "likes.user_id")
						// ->leftJoin("projects","projects.id", "=", "likes.project_id")
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
                    Schema::dropIfExists("likes");
                }
            }