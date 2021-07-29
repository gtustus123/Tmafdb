<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceProteomeSequencePivotTable extends Migration
{
    public function up()
    {
        Schema::create('reference_proteome_sequence', function (Blueprint $table) {
            $table->unsignedBigInteger('reference_proteome_id');
            $table->foreign('reference_proteome_id', 'reference_proteome_id_fk_4491663')->references('id')->on('reference_proteomes')->onDelete('cascade');
            $table->unsignedBigInteger('sequence_id');
            $table->foreign('sequence_id', 'sequence_id_fk_4491663')->references('id')->on('sequences')->onDelete('cascade');
        });
    }
}
