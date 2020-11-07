<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataProviderYTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_provider_y', function (Blueprint $table) {
            $table->id();
            $table->double('balance');
            $table->string('currency');
            $table->string('email');
            $table->integer('status');
            $table->string('y_id');
            $table->string('y_created_at');
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
        Schema::dropIfExists('data_provider_y');
    }
}
