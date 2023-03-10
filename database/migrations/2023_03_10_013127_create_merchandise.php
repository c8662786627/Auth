<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('merchandise', function (Blueprint $table) {
            $table->id('merchandise_id');
            $table->string('status',1);
            $table->string('name',80);
            $table->string('name_en',80);
            $table->text('introduction');
            $table->text('introduction_en');
            $table->string('photo');
            $table->integer('price');
            $table->integer('remain_count');
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
        //
        Schema::dropIfExists('merchandise');
    }
};
