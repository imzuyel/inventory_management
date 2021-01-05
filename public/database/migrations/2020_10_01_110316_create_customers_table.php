<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();;
            $table->string('nid')->nullable();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('shop_name')->nullable();
            $table->string('photo')->nullable();
            $table->string('account_holder')->nullable();;
            $table->string('account_number')->nullable();;
            $table->string('bank_name')->nullable();;
            $table->string('bank_branch')->nullable();;
            $table->string('city');
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
        Schema::dropIfExists('customers');
    }
}
