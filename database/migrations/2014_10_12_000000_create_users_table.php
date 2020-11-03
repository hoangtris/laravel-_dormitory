<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_role')->default(4);

            $table->string('name');
            $table->string('gender');

            $table->date('date_of_birth');  #ngày sinh
            $table->string('place_of_birth'); #nơi sinh
            
            $table->string('email')->unique();
            $table->string('phone')->unique();

            $table->string('identity_card_number')->unique(); #số CMND
            $table->date('issued_on'); #ngày cấp cấp
            $table->string('issued_at'); #nơi cấp

            $table->integer('province')->nullable(); #tinh thành
            $table->integer('district')->nullable(); #quận huyện
            $table->integer('ward')->nullable(); #phường xã

            $table->string('address');
            $table->string('avatar');

            $table->string('nation')->nullable(); #dân tộc
            $table->string('religious')->nullable(); #tôn giáo
            $table->string('nationality')->nullable(); #quốc tịch

            $table->string('username'); #username 
            
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();

            //$table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
