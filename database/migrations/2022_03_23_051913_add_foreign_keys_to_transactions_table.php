<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign(['sale_point_id'], 'transactions_ibfk_10')->references(['id'])->on('sale_points')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['payer_id'], 'transactions_ibfk_5')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['payee_id'], 'transactions_ibfk_6')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['validated_by'], 'transactions_ibfk_8')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_ibfk_10');
            $table->dropForeign('transactions_ibfk_5');
            $table->dropForeign('transactions_ibfk_6');
            $table->dropForeign('transactions_ibfk_8');
        });
    }
}
