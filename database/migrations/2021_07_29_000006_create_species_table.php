<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('kingdom');
            $table->integer('taxon')->unique();
            $table->string('common_name');
            $table->string('official_name');
            $table->integer('flag');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
