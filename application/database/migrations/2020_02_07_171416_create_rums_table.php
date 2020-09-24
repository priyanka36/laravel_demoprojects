<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rum_photo')->nullable();
            $table->foreign('whisky_id')->references('id')->on('whiskies')->onDelete('cascade');
            $table->text('description');
            $table->text('about');
            $table->text('price');
            $table->softDeletes();
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
        Schema::dropIfExists('rums');
    }
}
