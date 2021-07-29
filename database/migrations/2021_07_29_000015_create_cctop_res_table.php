<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCctopResTable extends Migration
{
    public function up()
    {
        Schema::create('cctop_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('reliability', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
