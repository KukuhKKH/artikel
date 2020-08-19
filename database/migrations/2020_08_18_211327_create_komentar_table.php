<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('artikel_id');
            $table->text('komentar');
            $table->string('nama');
            $table->string('email');
            $table->string('website')->nullable();
            $table->timestamps();
            $table->foreign('artikel_id')->on('artikel')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
