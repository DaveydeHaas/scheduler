<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('group_id')->nullable();
            $table->string('task-name')->nullable();
            $table->longText('description')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('has_end_Date');
            $table->timestamp('start_time')->nullable(); 
            $table->timestamp('end_time')->nullable();
            $table->boolean('all_day');

            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('user_id')->on('task_groups')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
