<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_holders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('union_id');
            $table->unsignedBigInteger('area_id');
            $table->text('holding_number');
            $table->text('date');
            $table->text('name');
            $table->text('memo_number');
            $table->float('amount');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('tax_holders');
    }
}
