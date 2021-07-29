<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPdbtmRegionsTable extends Migration
{
    public function up()
    {
        Schema::table('pdbtm_regions', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id', 'region_fk_4491765')->references('id')->on('regions');
        });
    }
}
