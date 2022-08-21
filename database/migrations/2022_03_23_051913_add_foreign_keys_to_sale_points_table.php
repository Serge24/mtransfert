<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_points', function (Blueprint $table) {
            $table->foreign(['country_id'], 'sale_points_ibfk_4')->references(['id'])->on('countries')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['country_id'], 'sale_points_ibfk_5')->references(['id'])->on('countries')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['manager'], 'sale_points_ibfk_6')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_points', function (Blueprint $table) {
            $table->dropForeign('sale_points_ibfk_4');
            $table->dropForeign('sale_points_ibfk_5');
            $table->dropForeign('sale_points_ibfk_6');
        });
    }
}
