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
        Schema::create('product_variation', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('product_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('size_id')->default('0');    
            $table->integer('color_id')->default('0');
            $table->integer('in_stock')->default('0');  
            $table->integer('used_stock')->default('0');   
            $table->decimal('variation_price', 9, 2)->nullable();        
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
        Schema::dropIfExists('product_variation');
    }
};
