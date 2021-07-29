<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionSourcesTable extends Migration
{
    public function up()
    {
        Schema::create('region_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
