<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("name");
            $table->enum("gender",["male","female"]);
            $table->string("tel")->nullable();
            $table->string("photo")->nullable();
            $table->string("department")->nullable();
            $table->date("birthdate")->nullable();
            $table->date("start_date")->nullable();
            $table->string("address")->nullable();
            $table->string("note")->nullable();
            $table->string("code_image")->nullable();
            $table->enum("status", ["active", "stop", "f_stop"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
