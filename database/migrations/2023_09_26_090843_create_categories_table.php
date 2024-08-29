<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
                           // define foreign key
            $table->foreignId('master_category_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 
            $table->string('category_name');
   
            $table->text('description')->nullable();    
            $table->string('image',550)->nullable();   
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
        Schema::dropIfExists('categories');
    }
}
