<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('employee_id')->nullable();
            $table->string('slug')->nullable();
            $table->text('description');
            $table->integer('owner_id');
            $table->string('attachment')->nullable();
            $table->string('report')->nullable();
            $table->string('status')->nullable()->default('ongoing');
            $table->dateTime('dueDate');

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
        Schema::dropIfExists('projects');
    }
}
