<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSequencesTable extends Migration
{
    public function up()
    {
        Schema::create('sequences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('seq');
            $table->string('hash')->unique();
            $table->integer('length');
            $table->integer('flag');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
