<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCctopResTable extends Migration
{
    public function up()
    {
        Schema::table('cctop_res', function (Blueprint $table) {
            $table->unsignedBigInteger('identifier_id');
            $table->foreign('identifier_id', 'identifier_fk_4491781')->references('id')->on('identifiers');
        });
    }
}
