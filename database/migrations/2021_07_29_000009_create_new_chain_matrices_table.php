<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewChainMatricesTable extends Migration
{
    public function up()
    {
        Schema::create('new_chain_matrices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matrix');
            $table->float('transformxx', 14, 8);
            $table->float('transformxy', 14, 8);
            $table->float('transformxz', 14, 8);
            $table->float('transformxt', 14, 8);
            $table->float('transformyx', 14, 8);
            $table->float('transformyy', 15, 2);
            $table->float('transformyz', 14, 8);
            $table->float('transformyt', 14, 8);
            $table->float('transformzx', 14, 8);
            $table->float('transformzy', 14, 8);
            $table->float('transformzz', 14, 8);
            $table->float('transformzt', 14, 8);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
