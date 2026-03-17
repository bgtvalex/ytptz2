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
        Schema::create('vstrechi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('data');
            $table->unsignedBigInteger('tip_id');
            $table->foreign('tip_id')->references('id')->on('tips_vstrechi');
            $table->unsignedBigInteger('otvetstvenny_id')->nullable();
            $table->foreign('otvetstvenny_id')->references('id')->on('persons');
            $table->string('theme',100)->nullable();
            $table->string('place',100)->nullable();
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
        Schema::dropIfExists('vstrechi');
    }
};
