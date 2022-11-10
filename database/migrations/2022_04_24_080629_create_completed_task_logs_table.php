<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedTaskLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_task_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('admin_name');
            $table->string('technician_name');
            $table->string('iotnet_location_address');
            $table->string('task_completed_report');
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
        Schema::dropIfExists('completed_task_logs');
    }
}
