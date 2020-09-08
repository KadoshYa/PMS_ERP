<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('employee_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->string('task_name')->unique();
            $table->string('slug')->nullable();
            $table->integer('department_id')->nullable();
            $table->longtext('task_detail');
            $table->string('priority')->default('medium');
            $table->string('status')->nullable();
            $table->boolean('recieved')->default(0);
            $table->datetime('due_date');
            $table->string('attachment')->nullable();
            $table->integer('created_by')->nullable();

            $table->softDeletes();          
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
        Schema::dropIfExists('tasks');
    }
}
