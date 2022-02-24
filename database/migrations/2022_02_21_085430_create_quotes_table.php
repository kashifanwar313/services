<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('hash_id')->unique();
            $table->integer('quote_status')->nullable();
            $table->integer('numOfFloors')->nullable();
            $table->string('houseSquareFootageVal')->nullable();
            $table->string('houseSquareFootageKnow')->nullable();
            $table->integer('houseSquareFootageDontKnow')->nullable();
            $table->longText('houseWash')->nullable();
            $table->longText('checkedServices')->nullable();
            $table->longText('note')->nullable();
            $table->longText('roof')->nullable();
            $table->longText('driveway')->nullable();
            $table->longText('contact')->nullable();
            $table->longText('plans_id')->nullable();
            $table->longText('signature')->nullable();
            $table->longText('total_estimated_time')->nullable();
            $table->integer('total_amount')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
