<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingGuestsTableAndGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->timestamps();
        });

        Schema::create('booking_guests', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("surname", 255);
            $table->string("middlename", 255)->nullable(true);
            $table->foreignId("gender_id")->constrained();
            $table->foreignId("booking_id")->constrained();
            $table->date("birthdate");
            $table->string("phone", 255);
            $table->foreignId("document_type_id")->constrained();
            $table->string("document_number", 255)->unique();
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
        Schema::dropIfExists('genders');
        Schema::dropIfExists('booking_guests');
    }
}
