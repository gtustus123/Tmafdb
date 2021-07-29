<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegionsTable extends Migration
{
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->unsignedBigInteger('identifier_id');
            $table->foreign('identifier_id', 'identifier_fk_4491756')->references('id')->on('identifiers');
            $table->unsignedBigInteger('localisation_type_id');
            $table->foreign('localisation_type_id', 'localisation_type_fk_4491757')->references('id')->on('localisation_types');
            $table->unsignedBigInteger('region_source_id');
            $table->foreign('region_source_id', 'region_source_fk_4491758')->references('id')->on('region_sources');
        });
    }
}
