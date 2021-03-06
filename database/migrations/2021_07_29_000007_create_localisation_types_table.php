<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalisationTypesTable extends Migration
{
    public function up()
    {
        Schema::create('localisation_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('code');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
