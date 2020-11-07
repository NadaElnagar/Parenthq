<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataProviderXTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_provider_x', function (Blueprint $table) {
            $table->id();
            $table->double('parent_amount');
            $table->string('currency');
            $table->string('parent_email');
            $table->integer('status_code');
            $table->string('registeration_date');
            $table->string('parent_identification');
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
        Schema::dropIfExists('data_provider_x');
    }
}
