<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nom');
            $table->string('adresse');
            $table->string('email');
            $table->string('nomProd');
            $table->string('filePath')->nullable();
            $table->string('matiere');
            $table->string('niveau');
            $table->boolean('status')->default(0);
            $table->integer('etape')->default(1);
            $table->string('type');
            $table->string('guide')->nullable();
            $table->string('lien');
            $table->string('rapport')->nullable();
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
        Schema::dropIfExists('demandes');
    }
}