<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUniprotAcsTable extends Migration
{
    public function up()
    {
        Schema::table('uniprot_acs', function (Blueprint $table) {
            $table->unsignedBigInteger('identifier_id');
            $table->foreign('identifier_id', 'identifier_fk_4491749')->references('id')->on('identifiers');
        });
    }
}
