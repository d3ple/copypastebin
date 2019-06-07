<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("url");
            $table->text("title");
            $table->text("data");
            $table->text("syntax");
            $table->text("access_type");
            $table->integer("user_id")->default(0);
            $table->dateTime("expiration_time");
            $table->dateTime("updated_at")->useCurrent();
            $table->dateTime("created_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
}
