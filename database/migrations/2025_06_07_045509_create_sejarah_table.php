<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSejarahTable extends Migration
{
    public function up()
    {
        Schema::create('sejarah', function (Blueprint $table) {
            $table->id();
            $table->longText('konten');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sejarah');
    }
}
