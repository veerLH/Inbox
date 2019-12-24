<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletestatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completestatuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inbox_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('status')->nullable();
            $table->text('content')->nullable();
            $table->text('recontent')->nullable();
            $table->text('feedback')->nullable();
            $table->Integer('agreestatus');
            $table->string('filelink')->nullable();
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
        Schema::dropIfExists('completestatuses');
    }
}
