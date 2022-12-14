<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {

            $table->id();

            $table->string('name_ar');
            $table->string('name_he');

            $table->string('slug')->unique();

            $table->string('price');

            $table->string('description_ar');
            $table->string('description_he');

            $table->unsignedBigInteger('section_id');

            $table->foreign('section_id')
                  ->on('sections')
                  ->references('id')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('meals');
    }
}
