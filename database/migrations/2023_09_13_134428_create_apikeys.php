<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApikeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apikeys', function (Blueprint $table) {
           $table->id();
            $table->string('stripe_public_key');
            $table->string('stripe_secret_key');            
            $table->enum('stripe_status',['active','deactive'])->default('active')->comment('Active/Deactive');
            $table->string('google_map_key');
            $table->string('email'); 
            $table->string('password');         
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
        Schema::dropIfExists('apikeys');
    }
}
