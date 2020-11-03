<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_type');
            $table->integer('capacity');
            $table->float('price');
            $table->integer('duration')->default(30);
            $table->integer('wc');
            $table->string('security');
            $table->string('convenient');
            $table->string('image');
            $table->string('short_description');
            $table->string('long_description');
            $table->string('note');           
            
            $table->timestamps();

            $table->foreign('id_area')->references('id')->on('areas');
            $table->foreign('id_type')->references('id')->on('type_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
