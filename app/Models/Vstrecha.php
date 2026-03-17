<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vstrecha extends Model
{
    use HasFactory;

    protected $table = 'vstrechi';
}

/*Schema::create('vstrechi', function (Blueprint $table) {
    $table->id()->autoIncrement();
    $table->date('data');
    $table->unsignedBigInteger('tip_id');
    $table->foreign('tip_id')->references('id')->on('tips_vstrechi');
    $table->unsignedBigInteger('otvetstvenny_id')->nullable();
    $table->foreign('otvetstvenny_id')->references('id')->on('persons');
    $table->string('theme',100)->nullable();
    $table->string('place',100)->nullable();
    $table->timestamps();
});*/