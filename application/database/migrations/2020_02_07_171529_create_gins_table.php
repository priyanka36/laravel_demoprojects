<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gin_photo')->nullable();
            $table->foreign('whisky_id')->references('id')->on('whiskies')->onDelete('cascade');
            $table->text('description');
            $table->text('about');
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
        Schema::dropIfExists('gins');
    }
}
