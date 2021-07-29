<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdbtmsTable extends Migration
{
    public function up()
    {
        Schema::create('pdbtms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matrix');
            $table->string('transmembrane');
            $table->float('qvalue', 6, 2);
            $table->string('tmtype');
            $table->float('x', 14, 8);
            $table->float('y', 14, 8);
            $table->float('z', 14, 8);
            $table->float('xx', 14, 8);
            $table->float('xy', 14, 8);
            $table->float('xz', 16, 8);
            $table->float('xt', 14, 8);
            $table->float('yx', 14, 8);
            $table->float('yy', 14, 8);
            $table->float('yz', 14, 8);
            $table->float('yt', 14, 8);
            $table->float('zx', 14, 8);
            $table->float('zy', 14, 8);
            $table->float('zz', 14, 8);
            $table->float('zt', 14, 8);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
