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
            $table->float('price',12,0);
            $table->integer('duration')->default(30);
            $table->string('image');
            $table->mediumText('short_description');
            $table->longText('long_description');
            $table->longText('note');           
            
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
