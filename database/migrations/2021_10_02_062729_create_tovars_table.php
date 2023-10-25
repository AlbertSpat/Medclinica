<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTovarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tovars', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('phone',200);
            $table->daterog('daterog');
            $table->enum('formatcategories',['Реабилитация после COVID-19','Запись на приём к врачу']);
            $table->enum('speccategories',['Нефролог','и т.д.']);
            $table->enum('categories',['Волков Владимир Викторович','Иванов Иван Иванович']);
            $table->integer('price');
            $table->date('date');
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
        Schema::dropIfExists('tovars');
    }
}
