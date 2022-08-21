<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->string('locale', 30)->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->nullable()->default('ACTIVE');
            $table->enum('role_level', ['0', '1', '2', '3'])->nullable()->default('0');
            $table->string('no_account', 150);
            $table->bigInteger('country_id')->nullable()->index('country_id');
            $table->string('image', 100)->nullable();
            $table->string('login', 150);
            $table->string('password', 150);
            $table->bigInteger('sale_point_id')->nullable()->index('sale_point_id');
            $table->tinyInteger('is_temp_user')->default(0);
            $table->string('momo_api_key', 150)->nullable();
            $table->string('remember_token', 150)->nullable();
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
        Schema::dropIfExists('users');
    }
}
