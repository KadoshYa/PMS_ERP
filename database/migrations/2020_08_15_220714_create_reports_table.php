<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id')->nullable();  //employee of the person recieving the report
            $table->integer('project_id')->nullable();
            $table->string('report');   //name of report
            $table->string('file');          //a report in the form of a document
            $table->datetime('report_date')->nullable(); //
            $table->boolean('recieved')->default(0);      //is the task recieved by the one doing
            $table->integer('created_by'); //id of the person who created the report   
            
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('reports');
    }
}
