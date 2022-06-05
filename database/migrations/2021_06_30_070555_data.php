<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->timestamps();
        });
        Schema::create('atribut', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('status', ['diketahui', 'dicari']);
            $table->timestamps();
        });
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_atribut')
                ->references('id')
                ->on('atribut')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('kriteria');
            $table->timestamps();
        });
        Schema::create('dataset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_data')
                ->references('id')
                ->on('data')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_kriteria')
                ->references('id')
                ->on('kriteria')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('data');
        Schema::dropIfExists('atribut');
        Schema::dropIfExists('kriteria');
        Schema::dropIfExists('dataset');
    }
}
