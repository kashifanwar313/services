<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('square_foot_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade')->nullable();
            $table->foreignId('story_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('price');
            $table->string('time');
            $table->foreignId('plan_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('type')->nullable();
            $table->foreignId('driveway_sidewalk_patio_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('nu_of_car_id')->nullable()->constrained()->onUpdate('cascade')
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
        Schema::dropIfExists('price_sheets');
    }
}
