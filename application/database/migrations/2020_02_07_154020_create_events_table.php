<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventname');
            $table->string('address');
            $table->text('description');
            $table->date('date');
            $table->string('bg_photo')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('active_status')->default(true);
            $table->integer('added_by_user_id')->unsigned();
            $table->foreign('added_by_user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->integer('updated_by_user_id')->unsigned()->nullable();
            $table->foreign('updated_by_user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
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
        Schema::dropIfExists('events');
    }
}
