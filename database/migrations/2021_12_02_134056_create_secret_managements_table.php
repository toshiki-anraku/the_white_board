<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;

            class CreateSecretManagementsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("secret_managements", function (Blueprint $table) {
						$table->id();
						$table->integer('user_id')->unsigned();
						$table->integer('project_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("project_id")->references("id")->on("projects");



						// ----------------------------------------------------
						// -- SELECT [secret_managements]--
						// ----------------------------------------------------
						// $query = DB::table("secret_managements")
						// ->leftJoin("users","users.id", "=", "secret_managements.user_id")
						// ->leftJoin("projects","projects.id", "=", "secret_managements.project_id")
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
                    Schema::dropIfExists("secret_managements");
                }
            }