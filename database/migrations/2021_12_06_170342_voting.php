<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Voting extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('votings', function (Blueprint $table) {
      $table->id();
      $table->int('id_user');
      $table->foreign('id_user')->references('id')->on('users');
      $table->int('id_candidate');
      $table->foreign('id_candidate')->references('id')->on('candidates');
      $table->string('device');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('votings');
  }
}
