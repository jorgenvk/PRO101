<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKommentarerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kommentarer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('navn');
            $table->string('epost');
            $table->text('kommentar');
            $table->integer('bedrift_id');
            $table->timestamps();
        });

        Schema::table('kommentarer', function ($table) {
          $table->foreign('bedrift_id')->references('id')->on('Bedrifter')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kommentars');
    }
}
