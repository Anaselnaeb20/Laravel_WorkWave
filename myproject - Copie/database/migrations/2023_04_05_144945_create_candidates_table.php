<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('date_naissance');
            $table->string('resume')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('offre_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('offre_id')->references('id')->on('offres');
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
        Schema::dropIfExists('candidates');
    }
}
