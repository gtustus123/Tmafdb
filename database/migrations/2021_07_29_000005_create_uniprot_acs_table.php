<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniprotAcsTable extends Migration
{
    public function up()
    {
        Schema::create('uniprot_acs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->integer('flag');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
