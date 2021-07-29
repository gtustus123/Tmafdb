<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIdentifiersTable extends Migration
{
    public function up()
    {
        Schema::table('identifiers', function (Blueprint $table) {
            $table->unsignedBigInteger('database_id');
            $table->foreign('database_id', 'database_fk_4491605')->references('id')->on('databases');
            $table->unsignedBigInteger('sequence_id');
            $table->foreign('sequence_id', 'sequence_fk_4491606')->references('id')->on('sequences');
        });
    }
}
