<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAlignmentsTable extends Migration
{
    public function up()
    {
        Schema::table('alignments', function (Blueprint $table) {
            $table->unsignedBigInteger('seq_1_id');
            $table->foreign('seq_1_id', 'seq_1_fk_4491738')->references('id')->on('sequences');
            $table->unsignedBigInteger('seq_2_id');
            $table->foreign('seq_2_id', 'seq_2_fk_4491739')->references('id')->on('sequences');
        });
    }
}
