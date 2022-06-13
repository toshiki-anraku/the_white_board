<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;

            class CreateCommentsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("comments", function (Blueprint $table) {
						$table->id();
						$table->integer('user_id')->unsigned();
						$table->integer('project_id')->unsigned();
						$table->text('comment');
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("project_id")->references("id")->on("projects");



						// ----------------------------------------------------
						// -- SELECT [comments]--
						// ----------------------------------------------------
						// $query = DB::table("comments")
						// ->leftJoin("users","users.id", "=", "comments.user_id")
						// ->leftJoin("projects","projects.id", "=", "comments.project_id")
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
                    Schema::dropIfExists("comments");
                }
            }