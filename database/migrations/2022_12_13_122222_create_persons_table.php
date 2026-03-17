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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('fio',100)->unique();
            $table->date('data_rozhd')->nullable();
            $table->string('mesto_rozhd',100)->nullable();
            $table->unsignedBigInteger('pol_id')->nullable();
            $table->foreign('pol_id')->references('id')->on('pols');
            $table->string('telefon',100)->nullable();
            $table->string('socials',100)->nullable();
            $table->string('comments',255)->nullable();
            $table->boolean('active')->default(1); // boolean === tinyInt
            $table->boolean('critical')->nullable();
            $table->boolean('is_leader')->default(0); // boolean === tinyInt
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
        Schema::dropIfExists('persons');
    }
};
