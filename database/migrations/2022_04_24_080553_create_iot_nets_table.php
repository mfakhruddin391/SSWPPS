<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIotNetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iot_nets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iotnet_name');
            $table->string('iotnet_cloud_API');
            $table->string('iotnet_location_address');
            
            

            $table->unsignedBigInteger('iotnet_state_id')->nullable();
            $table->foreign('iotnet_state_id')->references('id')->on('states');

            $table->unsignedBigInteger('iotnet_status')->nullable();
            $table->foreign('iotnet_status')->references('id')->on('status_dictionaries');

            $table->string('iotnet_torrential');
            $table->string('iotnet_waterlvl');

            $table->unsignedBigInteger('createdBy')->nullable();
            $table->foreign('createdBy')->references('id')->on('administrators');

            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->foreign('updatedBy')->nullable()->references('id')->on('administrators');

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
        Schema::dropIfExists('iot_nets');
    }
}
