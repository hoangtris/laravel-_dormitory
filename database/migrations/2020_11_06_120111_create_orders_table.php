<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('payment_method');         #phương thức thanh toán
            $table->float('total', 9, 0);             #tổng tiền 
            $table->integer('status')->default(1);    #tinh trang : 1 - chưa thanh toán 
                                                      #             2 - đã thanh toán
            $table->mediumText('note');               #ghi chu
            $table->timestamps();                     #ngày tạo

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
