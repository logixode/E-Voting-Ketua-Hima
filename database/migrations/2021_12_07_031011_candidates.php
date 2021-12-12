<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('candidates', function (Blueprint $table) {
        $table->id();
        $table->integer('no');
        $table->string('name');
        $table->string('class');
        $table->string('profile_picture')->nullable();
        $table->text('visi');
        $table->text('misi');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('candidates');
    }
}
