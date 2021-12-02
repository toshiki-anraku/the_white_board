<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateProjectMediasTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("project_medias", function (Blueprint $table) {
						$table->integer('id');
						$table->integer('project_id')->unsigned();
						$table->string('media_type',255);
						$table->string('media_path',255);
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("project_id")->references("id")->on("projects");



						// ----------------------------------------------------
						// -- SELECT [project_medias]--
						// ----------------------------------------------------
						// $query = DB::table("project_medias")
						// ->leftJoin("projects","projects.id", "=", "project_medias.project_id")
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
                    Schema::dropIfExists("project_medias");
                }
            }
        