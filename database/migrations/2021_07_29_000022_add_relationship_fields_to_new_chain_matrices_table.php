<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNewChainMatricesTable extends Migration
{
    public function up()
    {
        Schema::table('new_chain_matrices', function (Blueprint $table) {
            $table->unsignedBigInteger('identifier_id');
            $table->foreign('identifier_id', 'identifier_fk_4492374')->references('id')->on('identifiers');
        });
    }
}
