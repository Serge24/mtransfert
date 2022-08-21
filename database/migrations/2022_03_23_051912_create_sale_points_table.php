<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_points', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 150);
            $table->unsignedBigInteger('manager')->index('manager');
            $table->string('contact', 100)->nullable();
            $table->string('code', 15)->nullable();
            $table->bigInteger('country_id')->index('country_id');
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
        Schema::dropIfExists('sale_points');
    }
}
