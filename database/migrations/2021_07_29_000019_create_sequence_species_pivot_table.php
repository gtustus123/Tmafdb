<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSequenceSpeciesPivotTable extends Migration
{
    public function up()
    {
        Schema::create('sequence_species', function (Blueprint $table) {
            $table->unsignedBigInteger('species_id');
            $table->foreign('species_id', 'species_id_fk_4491653')->references('id')->on('species')->onDelete('cascade');
            $table->unsignedBigInteger('sequence_id');
            $table->foreign('sequence_id', 'sequence_id_fk_4491653')->references('id')->on('sequences')->onDelete('cascade');
        });
    }
}
