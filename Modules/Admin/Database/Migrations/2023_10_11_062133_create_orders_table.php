<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
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
            $table->integer('user_id');
            $table->decimal('total_amount', 9, 2)->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('payment_type')->nullable();  
            $table->string('cart_no')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('cvv')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('refund_id')->nullable();
            $table->enum('status',['ORDERED','RECEIVED','CANCELLED','ASSIGNED','PROCESSING','SEARCHING','REACHED','PICKEDUP','ARRIVED','COMPLETED'])->default('ORDERED')->comment('ORDERED,RECEIVED,CANCELLED,ASSIGNED,PROCESSING,SEARCHING,REACHED,PICKEDUP,ARRIVED,COMPLETED');          
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
        Schema::dropIfExists('orders');
    }
};
