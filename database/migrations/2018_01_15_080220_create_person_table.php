<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_number')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('affiliation');
            $table->string('role');
            $table->string('token');
            $table->string('qr_code')->nullable();
            $table->string('shirt_size')->nullable();
            $table->string('team')->nullable();
            $table->string('room')->nullable();
            $table->boolean('is_register')->default(false);
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
        Schema::dropIfExists('person');
    }
}
