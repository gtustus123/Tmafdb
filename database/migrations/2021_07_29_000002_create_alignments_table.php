<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('alignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('alignment');
            $table->integer('identity');
            $table->integer('pair');
            $table->integer('gap_1');
            $table->integer('gap_2');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
