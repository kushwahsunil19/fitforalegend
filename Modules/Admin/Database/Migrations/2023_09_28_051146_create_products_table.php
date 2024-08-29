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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->integer('master_category_id'); 
            $table->integer('category_id');          
            $table->integer('sub_category_id'); 
            $table->integer('brand_id'); 
            $table->string('product_name');   
            $table->string('slug');           
            $table->decimal('current_price', 9, 2)->nullable(); 
            $table->decimal('previous_price',9,2)->nullable(); 
            $table->string('in_stock')->nullable(); 
            $table->string('tax')->nullable(); 
            $table->string('sku')->nullable(); 
            $table->string('video_link')->nullable(); 
            $table->string('short_description')->nullable(); 
            $table->text('description')->nullable(); 
            $table->text('specification_name')->nullable(); 
            $table->text('specification_description')->nullable();
            $table->text('attribute_id')->nullable(); 
            $table->text('attribute_price')->nullable();
            $table->text('color_id')->nullable();
            $table->text('color_images')->nullable(); 
            $table->string('image',550)->nullable(); 
            $table->text('images')->nullable(); 
            $table->string('meta_title')->nullable(); 
            $table->string('meta_keyword')->nullable(); 
            $table->string('meta_description')->nullable(); 
            $table->string('user_avg_rating')->default('0'); 
            $table->enum('status',['Active','Deactive'])->default('Active')->comment('Active/Deactive');
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
        Schema::dropIfExists('products');
    }
};
