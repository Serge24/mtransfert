<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref', 150);
            $table->double('amount');
            $table->json('currency');
            $table->string('proof_picture', 100)->nullable();
            $table->string('validation_picture', 100)->nullable();
            $table->unsignedBigInteger('payee_id')->index('payee_id');
            $table->unsignedBigInteger('payer_id')->index('payer_id');
            $table->bigInteger('sale_point_id')->nullable()->index('sale_point_id');
            $table->tinyInteger('is_validated')->default(0);
            $table->unsignedBigInteger('validated_by')->nullable()->index('validated_by');
            $table->json('computed_rate')->nullable();
            $table->text('cancellation_reason')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
