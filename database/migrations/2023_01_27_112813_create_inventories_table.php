<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_name') ->nullable;
            $table->string('product_vendor') ->nullable;
            $table->string('product_model') ->nullable;
            $table->string('product_type') ->nullable;
            $table->string('product_number') ->nullable;
            $table->string('product_location');
            $table->string('product_floor');
            $table->string('product_office') ->nullable;
            $table->string('product_purchase_date') ->nullable;
            $table->string('ip_address') ->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
