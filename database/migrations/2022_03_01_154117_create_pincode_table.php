<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePincodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pincode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pincode');
            $table->string('office');
            $table->string('office_type');
            $table->string('delivery_status');
            $table->string('division');
            $table->string('region');
            $table->string('circle');
            $table->string('taluk');
            $table->string('district');
            $table->string('state');
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
        Schema::dropIfExists('pincode');
    }
}
