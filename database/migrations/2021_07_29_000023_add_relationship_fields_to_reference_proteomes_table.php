<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReferenceProteomesTable extends Migration
{
    public function up()
    {
        Schema::table('reference_proteomes', function (Blueprint $table) {
            $table->unsignedBigInteger('species_id');
            $table->foreign('species_id', 'species_fk_4491662')->references('id')->on('species');
        });
    }
}
