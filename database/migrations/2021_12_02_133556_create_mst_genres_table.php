<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;

            class CreateMstGenresTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("mst_genres", function (Blueprint $table) {
						$table->id();
						$table->string('genres_name',255);
						$table->timestamps();
						$table->softDeletes();



						// ----------------------------------------------------
						// -- SELECT [mst_genres]--
						// ----------------------------------------------------
						// $query = DB::table("mst_genres")
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
                    Schema::dropIfExists("mst_genres");
                }
            }