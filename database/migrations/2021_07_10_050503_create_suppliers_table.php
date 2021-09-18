<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("ids");
            $table->string("name");
            $table->string("photo");
            $table->string("tel")->nullable();
            $table->string("address")->nullable();
            $table->enum("gender",["male","female"]);
            $table->string("note")->nullable();
            $table->enum("status",["active","delete"]);
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
        Schema::dropIfExists('suppliers');
    }
}
