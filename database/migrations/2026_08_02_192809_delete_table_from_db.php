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
        // Schema::dropIfExists('versions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('versions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('version');
        //     $table->string('sub_version'); 
        //     $table->string('theme');
        //     $table->text('desc');
        //     $table->string('status'); // в процессе / сделано / отменено / отложено 
        //     $table->timestamps();

        //     $table->softDeletes();
        // });
    }
};
