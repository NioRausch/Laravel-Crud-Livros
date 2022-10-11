<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 200);
            $table->text('descricao');
            $table->string('autor',200);
            $table->string('editora', 100);
            $table->bigInteger('ano');
            $table->timestamps();
        });
    }

};