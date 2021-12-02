<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateUsersTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("users", function (Blueprint $table) {
						$table->increments('id');
						$table->string('name',255);
						$table->string('email',255);
						$table->timestamps();
						$table->string('password',255);
						$table->string('remember_token',100)->nullable();
						$table->text('description')->nullable();
						$table->text('profile_picture_path')->nullable();
						$table->integer('role');
						$table->softDeletes();



						// ----------------------------------------------------
						// -- SELECT [users]--
						// ----------------------------------------------------
						// $query = DB::table("users")
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
                    Schema::dropIfExists("users");
                }
            }
        