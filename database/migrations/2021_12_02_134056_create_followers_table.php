<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateFollowersTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("followers", function (Blueprint $table) {
						$table->integer('id');
						$table->integer('following_id')->unsigned();
						$table->integer('followed_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("following_id")->references("id")->on("users");
						//$table->foreign("followed_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [followers]--
						// ----------------------------------------------------
						// $query = DB::table("followers")
						// ->leftJoin("users","users.id", "=", "followers.following_id")
						// ->leftJoin("users","users.id", "=", "followers.followed_id")
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
                    Schema::dropIfExists("followers");
                }
            }
        